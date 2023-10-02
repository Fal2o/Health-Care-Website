
@extends('layouts.masterUser')


@section('title')
    HealthCare Project
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>บันทึกรอบการเป็นประจำเดือน</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('men.store') }}">
        @csrf
       
        <label for="start" class="form-label">วันที่เริ่มเป็นประจำเดือน :</label>
        <input type="date" name="start" required class="form form-control"><br>
   
        <label for="end" class="form-label" >วันที่สิ้นสุดการเป็นประจำเดือน :</label>
        <input type="date" name="end" required class="form form-control"><br>
   
        <button type="submit"  class="btn btn-primary">Submit</button>
    </form>
    <button id='goToshowmen' class="btn btn-primary">ข้อมูลการเป็นประจำเดือน</button>
    <script>
        document.getElementById('goToshowmen').addEventListener('click', function() {
            window.location.href = "{{ route('men.index') }}";
        });
    </script>

            </div>
        </div>
    </div>
</div>
   
@endsection













