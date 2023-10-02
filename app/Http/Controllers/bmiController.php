<?php


namespace App\Http\Controllers;


use App\Models\bmi;
use App\Models\bmi_recommend;
use App\Models\recommend;
use App\Models\recommend_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class bmiController extends Controller
{
public function index()
{
$bmi = bmi::all();
$user = Auth::user();


return view('bmi', ['$bmi' => $bmi, 'user' => $user]);
}
public function calculateBMI(Request $request)
{
// รับค่าน้ำหนักและส่วนสูงจากผู้ใช้
$weight = $request->input('weight');
$height = $request->input('height');


// คำนวณ BMI
$bmi = $weight / (($height / 100) * ($height / 100));


// กำหนดเกณฑ์ของ BMI
if ($bmi < 18.50) {
$status = 'น้ำหนักน้อย / ผอม ';
} elseif ($bmi >= 18.50 && $bmi <= 22.90) {
$status = 'ปกติ (สุขภาพดี) ';
} elseif ($bmi >= 23 && $bmi <= 24.90) {
$status = 'ท้วม / โรคอ้วนระดับ 1';
} elseif ($bmi >= 25 && $bmi <= 29.90) {
$status = 'อ้วน / โรคอ้วนระดับ 2';
} else {
$status = 'อ้วนมาก / โรคอ้วนระดับ 3';
}


// ส่งผลลัพธ์กลับไปยังหน้า View
return view('bmi', ['bmi' => $bmi, 'status' => $status, 'weight' => $weight, 'height' => $height]);
}


public function savebmi(Request $request)
{


// บันทึกข้อมูลลงในตาราง bmi ในฐานข้อมูล
$user = Auth::user();
$bmis = new bmi();
$bmis->weight = $request->input('weight');
$bmis->height = $request->input('height');
$bmis->bmi = $request->input('bmi');
$bmis->user_id = $user->id; // เชื่อมความสัมพันธ์กับผู้ใช้
$bmis->save();


// หลังจากบันทึกข้อมูลเสร็จสิ้น คุ redirect ไปยังหน้าbmi
return redirect('recommend');
}




public function recommend()
{
$user = Auth::user();
$recommends = recommend::all();
$bmis = bmi::all();


return view('recommend', compact(
'bmis',
'user',
'recommends'
));
}
public function recommendpro($id)
{
$user = Auth::user();
$recommend_types = recommend_type::all();
$bmi = bmi::find($id);
return view('recommendpro', compact('bmi', 'user', 'recommend_types'));
}
public function updaterecommend(Request $request)
{
if ($request->type == null || $request->bmi_id == null) {
// ถ้าไม่มีการติ๊กเลือกcheckbox
return redirect("/recommendpro/$request->bmi_id");
}
$bmi_id = $request->bmi_id;
$bmi = bmi::find($bmi_id);


$type = "";
if ($bmi->bmi < 18.5) {
$type = 'ผอม';
} elseif ($bmi->bmi >= 18.5 && $bmi->bmi <= 22.9) {
$type = 'สุขภาพดี';
} elseif ($bmi->bmi >= 23 && $bmi->bmi <= 24.9) {
$type = 'ท้วม';
} elseif ($bmi->bmi >= 25 && $bmi->bmi <= 29.9) {
$type = 'อ้วน';
} else {
$type = 'อ้วนมาก';
}


$bmi_recommends = bmi_recommend::where("bmi_id", "=", $bmi_id)->get();
$recommends = recommend::where("rec_name", "=", $type)->orderBy('id','desc')->get();
if (!count($bmi_recommends)) {
// ถ้าไม่มีข้อมูลให้บันทึกเด้อจ้าเอื้อย
foreach ($recommends as $type) {
foreach ($request->type as $user_select_type) {
if ($user_select_type == $type->rec_type_id) {
$newbmi_recommends = new bmi_recommend();
$newbmi_recommends->bmi_id = $request->bmi_id;
$newbmi_recommends->recommend_id = $type->id;
$newbmi_recommends->save();
}
}
}
} else {
//อะไรที่มีอยู่ดรอปทิ้งแล้วเพิ่มค่าใหม่
foreach ($bmi_recommends as $obj) {
// ลบข้อมูลที่มีอยู่
$delete_rec_id = bmi_recommend::where("recommend_id", "=", $obj->recommend_id)->get()[0];
$delete_rec_id->delete();
}
foreach ($recommends as $type) {
foreach ($request->type as $user_select_type) {
if ($user_select_type == $type->rec_type_id) {
$newbmi_recommends = new bmi_recommend();
$newbmi_recommends->bmi_id = $request->bmi_id;
$newbmi_recommends->recommend_id = $type->id;
$newbmi_recommends->save();
}
}
}
}
return redirect("/recommendpro/$request->bmi_id");
}


public function deletebmi($id)
{
// ลบข้อมูลbmi(Soft Delete)
$bmi = bmi::find($id);
if ($bmi) {
$bmi->delete();
}




return redirect('/recommend');
}
}



