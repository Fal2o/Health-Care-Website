<!DOCTYPE html>
<html lang="en">


<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BMI</title>




<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">




<link rel="stylesheet" href="{{ asset('CSS/style.css') }}">




</head>
<style>
.buttongreen{
justify-content: center; width:100%; background: #00403A!important; border: 1px solid #00403A!important; color: #fff!important; cursor: pointer;"}
.buttonblue{
justify-content: center; width:100%; background: #070D59 !important; border: 1px solid #070D59!important; color: #fff!important; cursor: pointer;"}


</style>
<body>


<nav>
<ul>
<li><a href="{{ route('homepage') }}">หน้าแรก</a></li>
<li><a href="{{ route('healthrecord') }}">บันทึกสุขภาพ</a></li>
<li><a href="{{ route('bmi') }}">คำนวณBMI</a></li>
<li><a href="{{ route('recommend') }}">คำแนะนำ</a></li>
</ul>
</nav>


<header>
<h1>คำนวณหาค่าดัชนีมวลกาย (BMI)</h1>


</header>




<div class="container">
<div class="row form-control">
<form method="POST" action="/bmi">
@csrf
<label>น้ำหนัก(กิโลกรัม):</label>
<input type="text" id="weight" name="weight" required
value="{{ isset($weight) ? $weight : '' }}">


<label>ส่วนสูง(เซนติเมตร):</label>
<input type="text" id="height" name="height" required
value="{{ isset($height) ? $height : '' }}">


<button type="submit" class="buttonblue" >คำนวน</button>








</form>
@if (isset($bmi) && isset($status))
<form method="POST" action="/bmi/save">


@csrf
<p>ค่าที่ได้ :</strong> <input disabled="disabled" id="bmi" name="bmi" size="25"
type="text" value="{{ $bmi }}"></p>
<p>คุณอยู่ในเกณฑ์ :</strong> <input disabled="disabled" id="status" name="status" size="25"
type="text" value="{{ $status }}"></p>


{{-- แบบฟอร์มบันทึก BMI จะใช้ <input type="hidden"> เพื่อส่งค่าน้ำหนัก (weight), ส่วนสูง (height), และ BMI ไปยังฟังก์ชัน savebmi --}}
<input type="hidden" id="weight" name="weight" value="{{ $weight }}">
<input type="hidden" id="height" name="height" value="{{ $height }}">
<input type="hidden" id="bmi" name="bmi" value="{{ $bmi }}">
<input type="hidden" id="status" name="status" value="{{ $status }}">
<button type="submit" >บันทึก</button>
<div style="height: 10px"></div>
<button type="button" class="buttonblue"
onclick="clearInput()">เคลียร์ข้อมูล
</button>
</form>
@endif




</div>


</div>




<script>
function clearInput() {
document.getElementById('bmi').value = '';
document.getElementById('status').value = '';
}
</script>
</body>
</html>



