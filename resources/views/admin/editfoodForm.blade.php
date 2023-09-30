@extends('layouts.masterAdmin')

@section('title')
HealthCare Project
@endsection

@section('navbar')
Table List |  Edit Food
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="col-md-12">
                    <div class="card-header">
                        <h3>Edit food</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/admin/activity/edit/update_addfood/'.$food->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                @if (isset($food->food_name))
                                    <input type="text" class="form-control" id="food_name" name="food_name"  value="{{ $food->food_name }}">
                                @endif
                                <div class="form-text">Edit food items that are not yet in the table.</div>
                                @error('food_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Calorie</label>
                                @if (isset($food->calorie))
                                    <input type="text" class="form-control" id="calorie" name="calorie" pattern="[0-9]+" value="{{ $food->calorie }}">
                                @endif
                                
                                @error('calorie')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Food image</label>
                                <input type="file" class="form-control" id="img_food" name="img_food" value="{{ $food->img_food }}"><br>              
                                
                                @error('img_food')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <img src="{{asset($food->img_food)}}" alt="" height="400px" width="400px">
                            </div>
                            <input type="hidden" name="old_img" value="{{ $food->img_food }}">

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/admin/activity/food" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection
