<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{

    public function index()
    {

        $trending_category = Category::where('status', 'active')->get();
        $product = Product::where('trending', '1')->take(6)->get();
        return view('website.index', compact('product', 'trending_category'));
    }

    public function indexcategory()
    {
        $category = Category::all();
        return view('website.indexcategory', compact('category'));
    }

    public function categoryproduct($slug)
    {

        //$ss=Product::where('trending','1')->take(6)->get();


        if (Category::where('slug', $slug)->exists()) {

            $category = Category::where('slug', $slug)->first();

            $products = Product::where('cate_id', $category->id)->where('status', '0')->get();
            return view('website.categoryproducts', compact('category', 'products'));
        } else {
            return redirect('front')->with('status', 'Slug doesnot exists');
        }
        //return view('website.categoryproducts',compact('ss'));
    }

    public function productview($cate_slug, $prod_slug)
    {

        if (Category::where('slug', $cate_slug)->exists()) {

            if (Product::where('slug', $prod_slug)->exists()) {
                $product = Product::where('slug', $prod_slug)->first();
                $rating = Rating::where('prod_id', $product->id)->get();
                $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');

                $user_rating = Rating::where('prod_id', $product->id)->where('user_id', Auth::id())->first();
                $reviews = Review::where('prod_id', $product->id)->get();
                if ($rating->count() > 0) {
                    $rating_value = $rating_sum / $rating->count();
                } else {
                    $rating_value = 0;
                }


                return view('website.product.view', compact('product', 'rating', 'rating_value', 'user_rating', 'reviews'));

            } else {
                return redirect('front')->with('status', 'link doesnot exists');
            }

        } else {
            return redirect('front')->with('status', 'link doesnot exists');
        }

    }


    public function productlistAjax()
    {
        $products = Product::select('title')->where('status', '0')->get();
        $data = [];

        foreach ($products as $item) {
            $data[] = $item['title'];
        }

        return $data;

    }

    public  function searchproduct(Request $request){
        $searched_product=$request->product_title;
        if($searched_product !=""){
            $product=Product::where("title","LIKE","%$searched_product%")->first();
            if($product){
                return redirect('category/'.$product->Category->slug.'/'.$product->slug);
            }
            else{
                return redirect()->back()->with("status","No Product matched your search");
            }

        }
        else{
            return redirect()->back();
        }


    }
}
