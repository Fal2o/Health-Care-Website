<?php

namespace App\Http\Controllers;

use App\Models\food;
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
        return redirect('/admin/history');
    }

    public function activity(){
        return view('admin.adminActivity');
    }

    public function foodTable(){
        $foods = food::all();
        return view('admin.table.foodTable',compact('foods'));
    }

    public function exerciseTable(){
        return view('admin.table.exerciseTable');
    }

    public function addfood(){
        
        return view('admin.addfoodForm');
    }

    public function show_foodtable(){
        $allfood = food::all();
        return view('admin.addfoodForm',compact('allfood'));
    }

    public function save_foodtable(Request $request){
        $request -> validate(
            [
                'food_name' => 'required|unique:food|max:255',
                'calorie' => 'required',
                'img_food' => 'required|unique:food|max:2550'
            ],
            [
                'food_name.required' => "Please enter name",
                'food_name.unique' => "This name is already exits",
                'calorie.required' => "Please enter calorie",
                'img_food.required' => "Please enter image",
                'img_food.unique' => "This image is already exits"
            ]);

        //เข้ารหัสรูปภาพ
        $save_img = $request->file('img_food');
        //สร้างชื่อรูปภาพ
        $img_namegen = hexdec(uniqid());
        //ดึงนามสกุลไฟล์ภาพ
        $img_ext = strtolower($save_img ->getClientOriginalExtension());
        $img_name = $img_namegen.'.'.$img_ext;
        //keep file 
        $upload_location = 'image/foodimg/';
        $full_imgpath = $upload_location.$img_name;
        //เก็บใน public 
        $save_img->move($upload_location,$img_name);

        // บันทึกลงดาต้า
        $new_food = new food();
        $new_food -> food_name = $request->food_name;
        $new_food -> calorie = $request->calorie;
        $new_food -> img_food = $full_imgpath;
        $new_food->save();

        return redirect('/admin/activity/addfood')->with('success',"Saved!");
    }
}
