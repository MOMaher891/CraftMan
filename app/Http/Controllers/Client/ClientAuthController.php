<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\validationRequests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientAuthController extends Controller
{
    public function login(){
        return view('client.auth.login');
    }

    public function signup(){
        return view('client.auth.register');
    }

    public function create(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'password-confirm'=>'same:password|required',
            'phone'=>'required|numeric|min:11|max:11',
        ]);

        $client = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        if($client){
            return redirect()->route('client.login')->with('success','Your Account Created');
        }
        return $request;
    }

    public function check(LoginRequest $request){

        $request->validated();
        // return $request;
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
            // Authentication successful

        }else{
            return redirect()->route('client.login')->with('authentication_failed','Email or password invalid');
        }
            // Authentication failed

    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect(route('client.login'));
    }
}
