@extends('layouts.master')


@section('title')
    Dashboard | admin
@endsection



@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Activity Table</h4>
         
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>Activity Name</th>
                <th>Action</th>
              </thead>
              <tbody>
                <tr><td>Food</td><td><a href="/admin/activity/food" class="btn btn-primary">VIEW</a></td></tr>
                <tr><td>Exercise</td><td><a href="/admin/activity/exercise" class="btn btn-primary">VIEW</a></td></tr>
              </tbody>
            </table>
          </div>
          
        </div>
      </div>
    </div>
   
</div>
@endsection


@section('scripts')

@endsection
