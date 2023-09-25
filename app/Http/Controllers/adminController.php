<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.adminDashboard',compact('users'));
    }

    public function edit(Request $request,$id){
        $user = User::findOrFail($id);
        return view('admin.adminEdit',compact('user'));
    }

    public function delete(Request $request,$id){

        user::destroy($id);
        return redirect('/admin');
        
    }

    public function detial(){
        return view('admin.adminDetial');
        
    }
    
    public function history(){
        $trashUsers = User::onlyTrashed()->get();
        return view('admin.adminRestore',compact('trashUsers'));
    }

    public function restore($id){
        user::withTrashed()->find($id)->restore();
        return redirect('/admin');
    }

    public function forcedelete($id){
        user::withTrashed()->find($id)->forceDelete();
        return redirect('/admin');
    }
}
