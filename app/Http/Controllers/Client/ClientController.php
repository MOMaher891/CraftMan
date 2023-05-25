<?php

namespace App\Http\Controllers\Client;
use App\Models\User;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Events\Notifications;
use App\Models\Client;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class ClientController extends Controller
{
    public function index(){
        $jobs = Job::all();
        return view('client.home',compact('jobs'));
    }

    public function adminList($job_id){
        $admins = User::with('job')->where('job_id',$job_id)->paginate(5);
        return view('client.adminlist',compact('admins'));
    }

    public function get_special_admin($admin_id){
        $user =  User::with('job')->find($admin_id);
        return view('client.admin',compact('user'));
    }


    public function orderNotify(Request $request){
        $client = Client::where('id',$request->clientID)->first();
        Order::create([
            'client_id'=>$request->clientID,
            'user_id'=>$request->admin,
            'created_at'=>Carbon::now()
        ]);
        event(new Notifications($client->name));
    }

    public function orders(){
        $orders = Order::with('user')->where('client_id',Auth::guard('client')->user()->id)->paginate(10);
        return view('client.orders',compact('orders'));
    }

    public function about(){
        return view('client.about');
    }

    public function contact_us(){
        return view('client.contact-us');
    }
}
