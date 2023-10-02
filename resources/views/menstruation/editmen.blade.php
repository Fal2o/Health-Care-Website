
    




    


@extends('layouts.masterUser')

@section('title')
    HealthCare Project
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>แก้ไขวันที่เป็นประจำเดือนและสิ้นสุดประจำเดือนล่าสุด</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('men.update', $men->id) }}">
                    @csrf
                    @method('PUT')
                   <label for="start"  class="form-label" > วันที่เริ่มเป็นประจำเดือน :</label>
                    <input type="date" name="start" class="form form-control"><br>
               
                    <label for="end" class="form-label" >วันที่สิ้นสุดการเป็นประจำเดือน :</label>
                    <input type="date" name="end" class="form form-control" required><br>
               
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                   
            
            
                </form>
            </div>
        </div>
    </div>
</div>
   
   
@endsection








