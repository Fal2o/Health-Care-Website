@extends('layouts.masterAdmin')


@section('title')
HealthCare Project
@endsection


@section('navbar')
User Profile |  Edit
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Role User</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{'/admin/edit_update/'.$user->id}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control"7 value="{{$user->name}}" name="name" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Role</label>
                                <select name="user_type" id="" class="form-control">
                                    <option value="admin" {{ $user->user_type === 'admin' ? 'selected' : '' }}>admin</option>
                                    <option value="user" {{$user->user_type === 'user' ? 'selected' : '' }}> user</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="/admin" class="btn btn-secondary">Cancel</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

@endsection

{{-- {{$user}} --}}
