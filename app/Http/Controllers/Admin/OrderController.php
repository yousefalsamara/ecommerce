<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $order=Order::where('status','0')->get();

        return view('admin.order.index',compact('order'));

    }
    public function show($id){
     $orders=Order::where('id',$id)->first();
        return view('admin.order.show',compact('orders'));
    }

    public function updateorder (Request $request, $id){

        $orders=Order::find($id);
        $orders->status=$request->input('order_status');
        $orders->update();
        return redirect('order')->with('status',"Order Update Successfully");



}

    public function orderhistory(){
        $order=Order::where('status','1')->get();

        return view('admin.order.history',compact('order'));
    }
    //
}
