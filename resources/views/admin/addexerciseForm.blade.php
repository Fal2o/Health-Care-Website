@extends('layouts.masterAdmin')


@section('title')
HealthCare Project
@endsection



@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="col-md-12">
                    <div class="card-header">
                        <h3>Add Exercise Type</h3>
                        
                    </div>
                    <div class="card-body">
                        <form action="save_addexercise" method="POST" >
                            @csrf
                           
                            <div class="mb-3">
                                <label class="form-label">Exercise Type</label>
                                <input type="text" class="form-control" id="" name="exercise_type" pattern="[A-Za-z]{+}">
                                <div  class="form-text">Add exerciser type that are not yet in the table.</div>
                                @error('exercise_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                           
                            <div class="mb-3">
                                <label class="form-label">Calorie</label>
                                <input type="text" class="form-control" id="" name="calorie" pattern="[0-9]{+}">
                                @error('calorie')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                                                                                   
                            <div class="mb-3">
                                <label class="form-text" ><a href="{{ route('show_exercisetable') }}">show exercisetable</a></label>
                            </div>
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <a href="food" class="btn btn-secondary">Back</a>
                              
    
                        </form>
                    </div>                  
            </div>
        </div>
            @if(isset($allexercise))
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
                                    @foreach ($allexercise as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->exercis_type}}</td>
                                        <td>{{$item->calorie}}</td>                                  
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
