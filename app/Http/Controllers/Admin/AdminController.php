<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\Notification2;
class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function orders(){
        // Order::with(['client','user'])->get();
        $orders = Order::with('client')->where('user_id',Auth::user()->id)->paginate(6);
        return view('admin.orders',compact('orders'));
    }

    public function client($client_id){
        $client = Client::find($client_id);

        return view('admin.client',compact('client'));
    }

    public function completeOrder(Request $request){
        Order::find($request->order_id)->update([
            'complete'=>1
        ]);

        event(new Notification2('Order Complete'));
    }
    
    public function rejectOrder(Request $request){
        Order::find($request->order_id)->update([
            'complete'=>2
        ]);
        event(new Notification2('Order Reject'));
    }
}
