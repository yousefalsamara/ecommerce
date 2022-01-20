<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboradController extends Controller
{
    public function users(){
        $users=User::all();
        return view('admin.users.index',compact('users'));

    }
    public function showuser($id){
        $user=User::find($id);
        return view('admin.users.show',compact('user'));


    }
    //
}
