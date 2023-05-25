<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\validationRequests;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }



    public function signup()
    {
        $jobs = Job::all();
        return view('auth.register',compact('jobs'));
    }




    public function create(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'password-confirm' => 'same:password|required',
            'lat' => 'required',
            'long' => 'required',
            'phone'=>'required|numeric|min:11',
        ]);

        /**
         * Get Country & City & Region from lat and long numbers
         */
        $apiKey = 'UZ9U7TZG0ADA9VGZTJMSZIYPBWZNVQ4Y';
        $params['format'] = 'json';
        $params['lat'] = $request->lat;
        $params['lng'] = $request->long;
        $query = '';
        foreach ($params as $key => $value) {
            $query .= '&' . $key . '=' . rawurlencode($value);
        }
        $result = file_get_contents('https://api.geodatasource.com/city?key=' . $apiKey . $query);
        $location = json_decode($result);


        if($request->file('image')){
            $image=$this->uploadImage($request->image,$this->userPath);


            if($request->role == 1){
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'birth_date' => $request->birth_date,
                    'lat'=>$request->lat,
                    'long'=>$request->long,
                    'job_id'=>$request->job_id,
                    'phone'=>$request->phone,
                    'image'=>$image
                ]);
            }
            else{
                $client = Client::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'birth_date' => $request->birth_date,
                    'lat'=>$request->lat,
                    'long'=>$request->long,
                    'phone'=>$request->phone,
                    'image'=>$image
                ]);

            }
        }
        return redirect()->route('login')->with('success', 'Your Account Created');
    }

    public function check(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful
            return redirect()->route('admin.home');
        }

        elseif(Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('client.home');
        }

        else {
            return redirect()->route('login')->with('authentication_failed', 'Email or password invalid');
        }
        // Authentication failed

    }

    public function admin_logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }

    public function client_logout()
    {
        Auth::guard('client')->logout();
        return redirect(route('client.home'));
    }


    public function getjobs()
    {
        $jobs = Job::all();
        return $jobs;
    }
}
