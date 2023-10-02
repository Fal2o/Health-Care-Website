@extends('layouts.masterUser')

@section('title')
    HealthCare Project
@endsection




@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>เพิ่มข้อมูลร่างกายของคุณ</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('body.showinsert') }}">
                    @csrf
                    <div class="mb-3">
                      <label  class="form-label">ส่วนสูง:</label>
                      <input type="number" class="form-control" id="height" name="height" required>
                    </div>
                    
                    <div class="mb-3">
                        <label  class="form-label">น้ำหนัก:</label>
                        <input type="number" class="form-control" id="weight" name="weight"  required>
                    </div>

                    <div class="mb-"3>
                        <label  class="form-label">รอบเอว:</label>
                        <input type="number" class="form-control" id="waist" name="waist"  required>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">รอบอก:</label>
                        <input type="number" class="form-control" id="chest" name="chest"  required>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">สะโพก:</label>
                        <input type="number" class="form-control" id="hips" name="hips"  required>
                    </div>
                 
                    <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
                  </form>
                </form>
            </div>
        </div>
    </div>
</div>
   
   
@endsection



