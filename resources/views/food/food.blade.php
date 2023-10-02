@extends('layouts.masterUser')

@section('title')
    HealthCare Project
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ตารางบันทึกรายการอาหารประจำวัน</h4>
                @if (session('success'))
                    <div class="alert alert-success">
                      {{session('success')}}
                    </div>
                @endif
            </div>
            <div class="card-body">
                <input type="date" name="date" class="form-control" required>
                <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                            <th>ID</th>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Calorie</th>
                            <th>Action</th>
                      </thead>
                      <tbody>
                        @foreach ($foods as $food)
                          <tr>
                            <td>{{$food->id}}</td>
                            <td><img src="{{asset($food->img_food)}}" alt="" width="100" height="100"></td>
                            <td>{{$food->food_name}}</td>
                            <td>{{$food->calorie}}</td>
                            <td>
                              <a href="/food/select/{{$food->id}}" class="btn btn-success" >add meal</a>                            
                            </td>                                                    
                          </tr>                            
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <a href="">เมนูอื่นที่ไม่มีในระบบ</a>
            </div>
        </div>
      
    </div>
  
</div>
@endsection