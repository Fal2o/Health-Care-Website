



@extends('layouts.masterUser')

@section('title')
    HealthCare Project
@endsection




@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>แก้ไขข้อมูลร่างกายที่คุณเพิ่มล่าสุด</h3>
            
                <div class="card-body">
                    <form action="{{ route('exercise.update', $exercise->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="time">เวลาที่ออกกำลังกาย:</label>
                            <input type="number" class="form-control" id="time" name="time" value="{{ $exercise->time }}" required>
                        </div>


                        <div class="form-group">
                            <label for="calories">แคลอลี่:</label>
                            <input type="number" class="form-control" id="calories" name="calories" value="{{ $exercise->calories }}" required>
                        </div>


                        <div class="form-group">
                            <label for="type">ประเภทการออกกำลังกาย:</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="Weight Training" {{ $exercise->type == 'Weight Training' ? 'selected' : '' }}>Weight Training</option>
                                <option value="Stretching" {{ $exercise->type == 'Stretching' ? 'selected' : '' }}>Stretching</option>
                                <option value="Cardio" {{ $exercise->type == 'Cardio' ? 'selected' : '' }}>Cardio</option>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
                    </form>
                </div>
            </div>
            </div>
           
        </div>
    </div>
@endsection



