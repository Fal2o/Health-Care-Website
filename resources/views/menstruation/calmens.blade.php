@extends('layouts.masterUser')

@section('title')
    HealthCare Project
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>ประจำเดือนครั้งถัดไปจะมาในวันที่</h3>
            </div>
            <div class="card-body">
               <h4>{{$new_date}}</h4></label>
                <button id='showmen' class="btn btn-primary">แสดงข้อมูลการเป็นประจำเดือน</button>
                <script>
                    document.getElementById('showmen').addEventListener('click', function() {
                        window.location.href = "{{ route('men.index') }}";
                    });
                </script>
            </div>
        </div>
    </div>
</div>
   
   
@endsection








