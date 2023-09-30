

@extends('layouts.masterUser')

@section('title')
    HealthCare Project
@endsection




@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>เพิ่มข้อมูลการออกกำลังกายของคุณ</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('exercise.insert') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">วันที่ออกกำลังกาย:</label>
                        <input type="date"class="form-control"  id="date" name="date" required>
                    </div>
                   
                    <div class="mb-3">
                        <label class="form-label">เวลาที่ออกกำลังกาย:</label>
                        <input type="number" class="form-control" id="time" name="time" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">แคลอลี่:</label>
                        <input type="number"class="form-control"  id="calories" name="calories" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ประเภทการออกกำลังกาย:</label>
                        <select id="type" class="form-control"name="type" required >
                            <option value="Weight Training">Weight Training</option>
                            <option value="Stretching">Stretching</option>
                            <option value="Cardio">Cardio</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection



