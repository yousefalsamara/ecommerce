<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function addproduct(Request $request){

        $product_id=$request->input('product_id');
        $product_qty=$request->input('product_qty');

       if(Auth::check()){
           $prod_check=Product::where('id',$product_id)->first();
           if($prod_check) {

               if (Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()) {

                   return response()->json(['status' => $prod_check->title . "Already Added to Cart"]);

               } else {


                   $cartItem = new Cart();
                   $cartItem->prod_id = $product_id;
                   $cartItem->user_id = Auth::id();
                   $cartItem->prod_qty = $product_qty;
                   $cartItem->save();

                   return response()->json(['status' => $prod_check->title . "Add to Cart"]);

               }
           }
       }
        else{
          return response()->json(['status' =>"Login to Continue"]);
          }
    }

    public function viewcart(){

     $cartitem=Cart::where('user_id',Auth::id())->get();
        return view('website.viewcart',compact('cartitem'));

    }
    public function deleteproduct(Request $request){
        if(Auth::check()){
            $prod_id=$request->input('prod_id');
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $cartitem=Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartitem->delete();
                return response()->json(['status' =>"products delete in cart  Successfully"]);
            }
        }
        else{
            return response()->json(['status' =>"Login to Continue"]);
        }
    }

    public function updatecart(Request $request){
        $prod_id=$request->input('prod_id');
        $product_qty=$request->input('prod_qty');

        if(Auth::check()){
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $cart=Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cart->prod_qty=$product_qty;
                $cart->update();
                return response()->json(['status' =>"update quantity"]);

        }}

    }
}
