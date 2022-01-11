<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoruController extends Controller
{
    //
    public function index(){

        $Category=Category::all();
     return view('admin.category.index',compact('Category'));
    }

    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $request){


        $y=new Category();
        $y->fill($request->all());
        if($request->hasFile('photo')){

            $name=$request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('public/storage',$name);

        }
        $y->status=$request->input('status')==TRUE ? '1':'0';
        $y->save();

        $y->update(['photo' => $name]);
       return redirect('category')->with('status',"Category store Successfully");
    }


    public function edit($id){

    $Category=Category::find($id);
    return view('admin.category.edit',compact('Category'));
    }
    public function update(Request $request,$id){
        $y=Category::find($id);

        $y->fill($request->all());
        if($request->hasFile('photo')){

            $name=$request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('public/storage',$name);

        }
        $y->status=$request->input('status')==TRUE ? '1':'0';
        $y->save();

        $y->update(['photo' => $name]);
        return redirect('category')->with('status',"Category update Successfully");

    }

    public function destroy($id){
        $x=Category::find($id)->delete();
        return redirect('category')->with('status',"Category destroy Successfully");

    }
}
