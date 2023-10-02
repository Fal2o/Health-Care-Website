<?php

namespace App\Http\Controllers;

use App\Models\exerciserecord;
use App\Models\food;
use App\Models\User;
use App\Models\recommend;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class adminController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.adminUserprofile',compact('users'));
    }

    public function edit(Request $request,$id){
        $user = User::findOrFail($id);
        return view('admin.adminEdit',compact('user'));
    }

    public function edit_update(Request $request,$id){
        $user = User::findOrFail($id);
        $user -> user_type = $request -> user_type;
        $user->save();
        return redirect('admin')->with('status-edit', 'User Role is Changed!');
    } 
    

    public function delete(Request $request,$id){

        user::destroy($id);
        return redirect('/admin')->with('status-delete', 'User is Deleted!');
        
    }

    public function detial($id){
        $user = User::findOrFail($id);
        return view('admin.adminDetial',compact('user'));
        
    }
    public function update_datil(Request $request ,$id){

        // ดึงข้อมูลใหม่จากแบบฟอร์ม
            $newName = $request->input('name');
            $newEmail = $request->input('email');
            $newFname = $request->input('fname');
            $newLname = $request->input('lname');
        // ดึงข้อมูลเดิมของผู้ใช้  
        
            $user = user::find($id);          
            $userOldData = [
                'name' => $user->name,
                'email' => $user->email,
                'fname' => $user->fname,
                'lname' => $user->lname,
                // เพิ่มฟิลด์อื่น ๆ ตามต้องการ
            ];
            
            if ($newName != $userOldData['name'] || $newEmail != $userOldData['email'] || $newFname != $userOldData['fname'] || $newLname != $userOldData['lname']) {
                // มีการแก้ไขข้อมูล
                $user_edit = user::find($id);
                $user_edit -> name = $request->name;
                $user_edit -> email = $request->email;
                $user_edit -> fname = $request->fname;
                $user_edit -> lname = $request->lname;
                $user_edit -> save();
                
                return redirect('/admin')->with('message_change', 'The information has been edited.');
            } else {
                // ไม่มีการแก้ไขข้อมูล
                return redirect('/admin')->with('message_unchange', 'The information has not been edited.');
            }

    }
    
    public function history(){
        $trashUsers = User::onlyTrashed()->get();
        return view('admin.adminRestore',compact('trashUsers'));
    }

    public function restore($id){
        user::withTrashed()->find($id)->restore();
        return redirect('/admin')->with('status-restore', 'User is Restored!');
    }

    public function forcedelete($id){
        user::withTrashed()->find($id)->forceDelete();
        return redirect('/admin/history')->with('status-forcedelete','User is Permanently Deleted');
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
    
    public function recommandations(){
        $recommends = recommend::all();
        return view('admin.table.recommandationTable',compact('recommends'));
    }

    public function addfood(){
        
        return view('admin.addfoodForm')->with('success_save','Food Have Been Saved!');
    }

    public function show_foodtable(){
        $allfood = food::all();
        return view('admin.addfoodForm',compact('allfood'));
    }

    public function show_exercisetable(){
        $allexercise = exerciserecord::all();
        return view('admin.addexerciseForm',compact('allexercise'));
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

        return redirect('/admin/activity/food')->with('success_save','Food Have Been Saved!'); ;
    }

    public function update_food(Request $request, $id){

        $request -> validate(
            [
                'food_name' => 'required|max:255',
                'calorie' => 'required',
                'img_food' => 'unique:food|max:2550'
            ],
            [
                'food_name.required' => "Please enter name",
                'calorie.required' => "Please enter calorie",
                'img_food.unique' => "This image is already exits"
            ]);
        
        $update_img = $request->file('img_food');
        if($update_img){
            //อัพเดตภาพและชื่อ
            $img_namegen = hexdec(uniqid());
            //ดึงนามสกุลไฟล์ภาพ
            $img_ext = strtolower($update_img ->getClientOriginalExtension());
            $img_name = $img_namegen.'.'.$img_ext;
            //อัพโหลดและอัพเดพข้อมูล 
            $upload_location = 'image/foodimg/';
            $full_imgpath = $upload_location.$img_name;

            

            // บันทึกลงดาต้า
            $new_food = food::find($id);
            $new_food -> food_name = $request->food_name;
            $new_food -> calorie = $request->calorie;
            $new_food -> img_food = $full_imgpath;
            $new_food->save();

            //ลบภาพเก่าและอัพภาพใหม่
            $old_img = $request->old_img;
            unlink($old_img);
            //อัพภาพใหม่ในโฟลเดอร์
            $update_img->move($upload_location,$img_name);

            return redirect('admin/activity/food')->with('success_update','Food Picture Have Been Edited!!'); 
        }else{
            //ไม่มีการอัพโหลดภาพ
            $new_food = food::find($id);
            $new_food -> food_name = $request->food_name;
            $new_food -> calorie = $request->calorie;
            $new_food->save();
            return redirect('admin/activity/food')->with('success_update','Food Name&Calorie Have Been Edited!!'); 
        }
        
        
    }

    public function editfood($id){
        $food = food::find($id);
        return view('admin.editfoodForm',compact('food'));
        
    }

    public function food_delete($id){
        //ลบภาพ
        $img_food = food::find($id)->img_food;
        unlink($img_food);
        food::find($id)->forceDelete();
        return redirect('/admin/activity/food')->with('success','Food Is Deleted!');
        
    }

    public function addexercise(){
        return view('admin.addexerciseForm');
    }

    public function save_addexercise(Request $request){

        $request -> validate(
            [
                'exercise_type' => 'required|unique:exerciserecords|max:255',
                'calorie' => 'required',
            ],
            [
                'exercise_type.required' => "Please enter name",
                'exercise_type.unique' => "This name is already exits",
                'calorie.required' => "Please enter calorie",
                
            ]);

        $new_exercisetype = new exerciserecord(); 
        $new_exercisetype -> exercise_type = $request->exercise_type;
        $new_exercisetype -> calories = $request->calorie;
        $new_exercisetype->save();
    }
    
}