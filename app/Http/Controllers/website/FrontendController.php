<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function index(){

        $trending_category=Category::where('status','active')->get();
        $product=Product::where('trending','1')->take(6)->get();
        return view('website.index',compact('product','trending_category'));
    }
    public function indexcategory(){
        $category=Category::all();
        return view('website.indexcategory',compact('category'));
 }

    public  function categoryproduct($slug){

        //$ss=Product::where('trending','1')->take(6)->get();


        if(Category::where('slug',$slug)->exists()){

           $category = Category::where('slug',$slug)->first();

            $products= Product::where('cate_id',$category->id)->where('status','0')->get();
            return view('website.categoryproducts',compact('category','products'));
        }
        else{
            return redirect('front')->with('status','Slug doesnot exists');
        }
        //return view('website.categoryproducts',compact('ss'));
  }

  public function productview($cate_slug,$prod_slug){

      if(Category::where('slug',$cate_slug)->exists()){

          if(Product::where('slug',$prod_slug)->exists()){
                $product=Product::where('slug',$prod_slug)->first();
                return view('website.product.view',compact('product'));

          }

          else{
              return redirect('front')->with('status','link doesnot exists');
          }

      }
      else{
          return redirect('front')->with('status','link doesnot exists');
      }

  }
}
