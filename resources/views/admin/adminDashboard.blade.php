@extends('layouts.master')


@section('title')
    Dashboard | admin
@endsection



@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">User Table</h4>
         
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Action</th>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                      <a href="/admin/detial" class="btn btn-info">DETIAL</a>
                      {{-- <a href="/admin/edit/{{ $user->id }}" class="btn btn-success">EDIT</a> --}}
                      <a href="/admin/delete/{{ $user->id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">DELETE</a>
                    </td>
                    
                  </tr>  
                @endforeach
              </tbody>
            </table>
          </div>
          <a href="/admin/history" class="btn btn-restore">History</a>
        </div>
      </div>
    </div>
   
</div>
@endsection


@section('scripts')

@endsection
