

    


@extends('layouts.masterUser')

@section('title')
    HealthCare Project
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-hheader">
                <h3>แก้ไขเวลาเข้านอนและเวลาตื่นนอนล่าสุด</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('sleep.update', $sleep->id) }}">
                    @csrf
                    @method('PUT')
                    เวลาที่เข้านอน :<label for="start" class="form-label" >Start Time:</label>
                    <input type="time" name="start" required class="form-control"><br>
            
            
                    เวลาที่ตื่นนอน :<label for="end" class="form-label" >End Time:</label>
                    <input type="time" name="end" required class="form-control"><br>
            
            
                    <button type="submit" class="btn btn-primary">บันทึก</button>
            
            
                   
            
            
                </form>
            </div>
        </div>
    </div>
</div>
   
   
@endsection







