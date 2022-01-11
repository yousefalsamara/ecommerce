<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product=Product::all();

        return view('admin.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category=Category::all();
        return view( 'admin.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $y=new Product();
        $y->fill($request->all());
        if($request->hasFile('image')){

            $name=$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/storage',$name);

        }
        $y->status=$request->input('status')==TRUE ? '1':'0';
        $y->trending=$request->input('trending')==TRUE ? '1':'0';
        $y->save();

        $y->update(['image' => $name]);
        return redirect('product')->with('status',"Product store Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $p=Product::find($id);
        $category=Category::all();
        return view( 'admin.product.edit',compact('p','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $y=Product::find($id);

        $y->fill($request->all());
        if($request->hasFile('image')){

            $name=$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/storage',$name);

        }
        $y->status=$request->input('status')==TRUE ? '1':'0';
        $y->trending=$request->input('trending')==TRUE ? '1':'0';
        $y->save();

        $y->update(['image' => $name]);
        return redirect('product')->with('status',"Product update Successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $x=Product::find($id)->delete();
        return redirect('product')->with('status',"product destroy Successfully");
        //
    }
}
