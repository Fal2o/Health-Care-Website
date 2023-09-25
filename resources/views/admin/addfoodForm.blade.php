@extends('layouts.master')


@section('title')
    Dashboard | admin
@endsection



@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="col-md-12">
                    <div class="card-header">
                        <h3>Add food</h3>
                        
                    </div>
                    <div class="card-body">
                        <form action="save_addfood" method="POST" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" id="" name="food_name">
                                <div  class="form-text">Add food items that are not yet in the table.</div>
                                @error('food_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                           
                            <div class="mb-3">
                                <label class="form-label">Calorie</label>
                                <input type="text" class="form-control" id="" name="calorie">
                                @error('calorie')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            
                            <div class="mb-3">
                                <label class="form-label">Food image</label>
                                <input type="file" class="form-control" id="" name="img_food">
                                @error('img_food')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                              </div>
                                                                                   
                              <div class="mb-3">
                                <label class="form-text" ><a href="{{ route('show_foodtable') }}">show foodtable</a></label>
                              </div>
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <a href="food" class="btn btn-secondary">Back</a>
                              
    
                        </form>
                    </div>                  
            </div>
        </div>
            @if(isset($allfood))
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                <thead class=" text-primary">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Calorie</th>
                                </thead>
                                <tbody>
                                    @foreach ($allfood as $food)
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
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                        
            @endif
        
    </div>
    
</div>

@endsection


@section('scripts')

@endsection
