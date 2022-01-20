<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    protected function index(){
        $order=Order::where('user_id',Auth::id())->get();

         return view('website.orders.index',compact('order'));
    }
    protected function show($id){

    $orders=Order::where('id',$id)->where('user_id',Auth::id())->first();
    return view('website.orders.show',compact('orders'));


    }
}
