@extends('layouts.masterAdmin')


@section('title')
    Dashboard | admin
@endsection



@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Recommandation Table</h4>
         
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
                {{-- @foreach ($foods as $food)
                  <tr>
                    <td>{{$food->id}}</td>
                    <td><img src="{{asset($food->img_food)}}" alt="" width="100" height="100"></td>
                    <td>{{$food->food_name}}</td>
                    <td>{{$food->calorie}}</td>
                    <td><a href="/admin/activity/edit/{{$food->id}}" class="btn btn-primary" >EDIT</a></td>
                    
                  </tr>  
                @endforeach --}}
              </tbody>
            </table>
          </div>
          <a href="addfood" class="btn btn btn-primary" >Add food</a>
        </div>
      </div>
    </div>
   
</div>
@endsection


@section('scripts')

@endsection
