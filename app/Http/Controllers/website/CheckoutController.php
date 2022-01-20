<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class CheckoutController extends Controller
{
    //
    public function index()
    {

        $old_items = Cart::where('user_id', Auth::id())->get();
        foreach ($old_items as $item) {
            if (!Product::where('id', $item->prod_id)->where('qty', '>=', $item->prod_qty)->exists()) {
                $removeitem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeitem->delete();
            }

        }
        $cartitems = Cart::where('user_id', Auth::id())->get();

        return view('website.checkout.index', compact('cartitems'));
    }

    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id=Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->country = $request->input('country');
        $order->state = $request->input('state');
        $order->pincode = $request->input('pincode');


        $total=0;
        $cartitems_total=Cart::where('user_id',Auth::id())->get();
        foreach ($cartitems_total as $prod){
            $total +=$prod->Products->selling_price *$prod->prod_qty;

            //$total += $item->products->selling_price * $item->prod_qty
        }
        $order->total_price=$total;

        $order->tracking_no = 'sharma' . rand(1111, 9999);
        $order->save();

        $cartitem = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitem as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->selling_price,


            ]);
            $prod=Product::where('id',$item->prod_id)->first();
            $prod->qty=$prod->qty - $item->prod_qty;;
            $prod->update();


        }
        if (Auth::user()->address1 == NULL) {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            // $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->country = $request->input('country');
            $user->state = $request->input('state');
            $user->pincode = $request->input('pincode');
            $user->update();
        }
        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitem);
        return redirect('front')->with('status',"order placed Successfully");
    }
}
