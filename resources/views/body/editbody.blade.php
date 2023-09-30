
@extends('layouts.masterUser')

@section('title')
    HealthCare Project
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-hheader">
                <h3>แก้ไขข้อมูล</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('body.update', $body->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label  class="form-label">ส่วนสูง:</label>
                      <input type="number" class="form-control" id="height" name="height" value="{{$body->height}}">
                    </div>
                    
                    <div class="mb-3">
                        <label  class="form-label">น้ำหนัก:</label>
                        <input type="number" class="form-control" id="weight" name="weight"  value="{{$body->weight}}">
                    </div>

                    <div class="mb-"3>
                        <label  class="form-label">รอบเอว:</label>
                        <input type="number" class="form-control" id="waist" name="waist"  value="{{$body->waist}}">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">รอบอก:</label>
                        <input type="number" class="form-control" id="chest" name="chest"  value="{{$body->chest}}">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">สะโพก:</label>
                        <input type="number" class="form-control" id="hips" name="hips"  value="{{$body->hips}}">
                    </div>
                 
                    <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
                  </form>
                </form>
            </div>
        </div>
    </div>
</div>
   
   
@endsection



