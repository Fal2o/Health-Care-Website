@extends('layouts.master')


@section('title')
    Dashboard | admin
@endsection



@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Food Table </h4>
         
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Calorie</th>
              </thead>
              <tbody>
                @foreach ($foods as $food)
                  <tr>
                    <td>{{$food->id}}</td>
                    <td>{{$food->food_name}}</td>
                    <td>{{$food->calorie}}</td>
                    <td></td>
                    
                  </tr>  
                @endforeach
                
                
              </tbody>
            </table>
          </div>
          <a href="addfood" class="btn btn-success" >Add food</a>
        </div>
      </div>
    </div>
   
</div>
@endsection


@section('scripts')

@endsection
