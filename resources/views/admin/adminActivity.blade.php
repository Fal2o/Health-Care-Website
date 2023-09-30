@extends('layouts.masterAdmin')


@section('title')
HealthCare Project
@endsection

@section('navbar')
Table List
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Table List</h4>
         
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>Activity Name</th>
                <th>Action</th>
              </thead>
              <tbody>
                <tr><td>Foods</td><td><a href="/admin/activity/food" class="btn btn-primary">VIEW</a></td></tr>
                <tr><td>recommandations</td><td><a href="/admin/activity/recommandations" class="btn btn-primary">VIEW</a></td></tr>
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
