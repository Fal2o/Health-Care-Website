
@extends('layouts.masterUser')


@section('title')
    HealthCare Project
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>บันทึกข้อมูลการนอน</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('sleep.store') }}">
                    @csrf   
                    <div class="mb-3">
                        วันที่ :<label  class="form-label">Date:</label>
                      <input type="date" name="date" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        เวลาที่เข้านอน :<label for="start">Start Time:</label>
                        <input type="time" name="start" class="form-control"  required><br>
                    </div>

                    <div class="mb-"3>
                        เวลาที่ตื่นนอน :<label for="end">End Time:</label>
                    <input type="time" name="end" class="form-control"  required><br>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <button id='goToshowsleep' class="btn btn-primary" >ข้อมูลการนอน</button>
                <script>
                    document.getElementById('goToshowsleep').addEventListener('click', function() {
                        window.location.href = "{{ route('sleep.index') }}";
                    });
                </script>

            </div>
        </div>
    </div>
</div>
   
@endsection










