<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){

        $wishlist=Wishlist::where('user_id',Auth::id())->get();
        return view('website.wishlist',compact('wishlist'));
    }

    public function add(Request $request){
        if(Auth::check()){
            $prod_id=$request->input('product_id');
            if(Product::find($prod_id)){
                $wish=new Wishlist();
                $wish->prod_id=$prod_id;
                $wish->user_id=Auth::id();
                $wish->save();
                return response()->json(['status'=>"Product Add to WishList"]);

            }
            else{
                return response()->json(['status'=>"Product does not exist"]);
            }

        }
        else{
            return response()->json(['status'=>"Login to Continue"]);

        }
    }

    public function delete(Request $request){

        if(Auth::check()){
            $prod_id=$request->input('prod_id');
            if(Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $wishitem=Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $wishitem->delete();
                return response()->json(['status' =>"item Remove from WishList  Successfully"]);
            }
        }
        else{
            return response()->json(['status' =>"Login to Continue"]);
        }

    }
}
