@extends('layouts.masterAdmin')


@section('title')
HealthCare Project
@endsection

@section('navbar')
User Profile
@endsection



@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">User Table</h4>
            @if (session('status-delete'))
              <div class="alert alert-warning" role="alert">
                {{session('status-delete')}}
              </div>
            @elseif (session('status-edit'))
                <div class="alert alert-success">
                  {{session('status-edit')}}
                </div>
              @elseif (session('status-restore'))
                <div class="alert alert-info">
                  {{session('status-restore')}}
                </div>
              @elseif (session('message_change'))
                <div class="alert alert-primary">
                  {{session('message_change')}}
                </div>
              @elseif (session('message_unchange'))
                <div class="alert alert-primary">
                  {{session('message_unchange')}}
                </div>
            @endif
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>Name</th>
                <th>Type</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Action</th>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td>{{$user->name}}</td>
                    <td>@if ($user->user_type == 0 or $user->user_type == 'user')
                      
                      @endif{{$user->user_type}}
                    </td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                      <a href="/admin/detial/{{ $user->id }}" class="btn btn-info">DETIAL</a>
                      <a href="/admin/edit/{{ $user->id }}" class="btn btn-success">EDIT</a>
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
