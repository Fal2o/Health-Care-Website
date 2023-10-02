@extends('layouts.masterAdmin')


@section('title')
    Dashboard | admin
@endsection

@section('navbar')
Table List |  Foods
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Food Table</h4>
            @if (session('success'))
              <div class="alert alert-danger">
                {{session('success')}}
              </div>
            @elseif (session('success_update'))
            <div class="alert alert-primary">
              {{session('success_update')}}
            </div>
            @elseif (session('success_save'))
            <div class="alert alert-primary">
              {{session('success_save')}}
            </div>
            @endif
        </div>
        <div class="card-body">
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
                      <a href="/admin/activity/food_edit/{{$food->id}}" class="btn btn-primary" >EDIT</a>
                      <a href="/admin/activity/food_delete/{{$food->id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this delicious food?')" class="btn btn-danger">DELETE</a>
                    </td>
                   
                    
                  </tr>  
                @endforeach
                
                
              </tbody>
            </table>
          </div>
          <a href="addfood" class="btn btn btn-primary" >Add food</a>
          <a href="/admin/activity" class="btn" >Back</a>
        </div>
      </div>
    </div>
   
</div>
@endsection


@section('scripts')

@endsection
