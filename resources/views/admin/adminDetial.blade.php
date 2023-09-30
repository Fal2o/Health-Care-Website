@extends('layouts.masterAdmin')


@section('title')
HealthCare Project
@endsection

@section('navbar')
User Profile |  Detial
@endsection


@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">Profile Detial</h5>
          </div>
          <div class="card-body">
            <form method="POST" action="{{'/admin/detial/update_datil/'.$user->id}}">
            @csrf
              <div class="row">
                <div class="col-md-5 pr-1">
                  <div class="form-group">
                    <label>ID (Disabled)</label>
                    <input type="text" class="form-control" disabled=""  value="{{$user->id}}" name="id">
                  </div>
                </div>
                <div class="col-md-3 px-1">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" placeholder="Username" value="{{$user->name}}" name='name'>
                  </div>
                </div>
                <div class="col-md-4 pl-1">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" placeholder="Email"  value="{{$user->email}}" name="email">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 pr-1">
                  <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" placeholder="Company" value="Mike" value="{{$user->fname}}" name="fname">
                  </div>
                </div>
                <div class="col-md-6 pl-1">
                  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="Last Name" value="Andrew" value="{{$user->lname}}" name="lname">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" placeholder="City" value="Mike">
                  </div>
                </div>
                <div class="col-md-4 px-1">
                  <div class="form-group">
                    <label>Country</label>
                    <input type="text" class="form-control" placeholder="Country" value="Andrew">
                  </div>
                </div>
                <div class="col-md-4 pl-1">
                  <div class="form-group">
                    <label>Postal Code</label>
                    <input type="number" class="form-control" placeholder="ZIP Code">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>About Me</label>
                    <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="Mike">Do you have a map? I just keep on getting lost in your eyes.  </textarea>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Change</button>
              <a href="/admin" class="btn btn-back">Cancel</a>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-user">
          <div class="image">
            <img src="/assets/img/bg5.jpg" alt="...">
          </div>
          <div class="card-body">
            <div class="author">
              <a href="#">
                <img class="avatar border-gray" src="https://scontent.fbkk4-1.fna.fbcdn.net/v/t1.15752-9/371058443_844727326833714_4184936192538809012_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=ae9488&_nc_eui2=AeHl5J0dtiqXNBbbuK947G0KpiO__OWVcg2mI7_85ZVyDS8DHX54tVq74h1SdfG-Ge0s4NVq-ZDWpJjV5iVDk669&_nc_ohc=2IHt8awUe00AX-CBKnT&_nc_ht=scontent.fbkk4-1.fna&oh=03_AdRLIHTeNoSLIpH8EE65fpxIMuWcm8k4Eq_q5kKiru9pVw&oe=653DDCA7" alt="...">
                <h5 class="title">{{$user->name}}</h5>
              </a>
              <p class="description">
                {{$user->name}}
              </p>
            </div>
            <p class="description text-center">
              "On a scale of 1 to 10, <br>
              you are a 9 <br>
              and I'm the 1 you need."
            </p>
          </div>
          <hr>
          <div class="button-container">
            <button href="" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-facebook-f"></i>
            </button>
            <button href="" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-twitter"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-google-plus-g"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection


@section('scripts')

@endsection
