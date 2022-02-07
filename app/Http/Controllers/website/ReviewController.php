<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function add($product_slug){
        $product=Product::where('slug',$product_slug)->where('status','0')->first();


        if($product){


            $product_id=$product->id;
            $review=Review::where('user_id',Auth::id())->where('prod_id',$product_id)->first();
            if($review){
                return view('website.reviews.edit',compact('review'));
            }
            else {
                $varified_purchase = Order::where('orders.user_id', Auth::id())
                    ->join('order_items', 'orders.id', 'order_items.order_id')
                    ->where('order_items.prod_id', $product_id)->get();
                return view('website.reviews.index', compact('product', 'varified_purchase'));
            }
        }
        else
        {

            return redirect()->back()->with('status',"the link you followed was broken");
        }



    }

    public  function  create(Request $request){
        $product_id=$request->input('product_id');
        $product=Product::where('id',$product_id)->where('status','0')->first();

        if($product){
            $uesr_review=$request->input('user_review');
            $new_review=Review::create([
                'user_id'=>Auth::id(),
                'prod_id'=>$product_id,
                'user_review'=>$uesr_review

            ]);

            $category_slug = $product->Category->slug;
            $prod_slug= $product->slug;
            if($new_review){
                return redirect('category/'.$category_slug.'/'.$prod_slug)->with('status',"thank you for writing a review");
            }

        }
        else{
            return redirect()->back()->with('status',"the link you followed was broken");
        }

    }


    public function edit($product_slug){
        $product=Product::where('slug',$product_slug)->where('status','0')->first();
        if($product){
            $product_id=$product->id;
            $review=Review::where('user_id',Auth::id())->where('prod_id',$product_id)->first();
            if($review){

                return view('website.reviews.edit',compact('review'));

            }
            else
            {

                return redirect()->back()->with('status',"the link you followed was broken");
            }

        }
        else
        {

            return redirect()->back()->with('status',"the link you followed was broken");
        }

    }


    public  function update(Request $request){

      $user_review=$request->input('user_review');
      if($user_review !=''){
          $review_id=$request->input('review_id');
          $review=Review::where('id',$review_id)->where('user_id',Auth::id())->first();
          if($review){
              $review->user_review=$request->input('user_review');
              $review->update();
              return redirect('category/'.$review->product->category->slug.'/'.$review->product->slug)->with('status',"Review Updated Successfully");
          }
          else
          {

              return redirect()->back()->with('status',"the link you followed was broken");
          }


      }

      else
      {

          return redirect()->back()->with('status',"you cannot submit an empty review");
      }
    }
}
