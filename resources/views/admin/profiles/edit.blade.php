

@extends('layouts.master')


@section('title')

Create New Post|blog ...
@endsection


@section('content')



{{-- ********************************************************************** --}}
<div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">

          <div class="card-header">
            @include('admin._alert')
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
           </div>
            @endif

            <h5 class="title">Edit User</h5>
          </div>

          <div class="card-body">

            <form action="{{route('userprofileupdate',[$user->id] )}}" method="post">
                @method('put')
                     @csrf
              <div class="row">
                <div class="col-md-3 pr-1">
                  <div class="form-group">
                    <label for="name">Name </label>
                    <input type="text" class="  form-control @error('name') is-invalid @enderror" name="name"  id="name" value="{{old('name',$user->name)}}" >
                    @error('name')
                     <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                <div class="col-md-3 px-1">
                  <div class="form-group">
                    <label for="phone">#phone </label>
                    <input type="text" class=" form-control  @error('phone') is-invalid @enderror" name="phone"  id="phone" value="{{old('phone',$user->phone)}}" >                    @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                <div class="col-md-2 px-1">
                  <div class="form-group">
                    <label>#Type (disabled)</label>
                    <input type="text" class="form-control" placeholder="usertype" disabled="" name="usertype" value="{{$user->usertype}}">
                  </div>
                </div>
                <div class="col-md-4 pl-1">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address </label>
                    <input type="text" class=" form-control @error('email') is-invalid @enderror" name="email"  id="email"  value="{{old('email',$user->email)}}" >
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="footer_float">
                         <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
<br><br><br>
           <div> <hr style="border: 1px solid #f96332;"></div>

              <form action=" {{route('profiles.update', $user->id )}}" method="post" enctype="multipart/form-data">
                <h5 class="title">Edit Profile</h5>
                @include('admin.profiles._forms')
              </form>


          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-user">
          <div class="image">
            <img src="{{asset('assets/img/bg5.jpg')}}" alt="...">
          </div>
          <div class="card-body">
            <div class="author">
              <a href="#">
                @if($profiles->image)
                <img class="avatar border-gray" src="{{asset('images/'. $profiles->image) }}" alt="...">
                @else <img  class="avatar border-gray" src="{{asset('assets/img/userprofileimg.jpg')}}"alt="...">
                   @endif
                <h5 class="title">{{$user->name }}</h5>
              </a>
              <p class="description text-center">
                {{ $user->usertype}}
              </p> <br>
            @if($profiles->about)
            <p class="description text-center">
                {{ $profiles->country}} /  {{ $profiles->city}}
             </p> <br>

              <p class="description text-center">
                     {{ $user->phone}}
              </p> <br>

              <p class="description text-center">
                {{ $profiles->about}}
         </p> <br>

            @else
            <p class="description text-center">
                "Lamborghini Mercy <br>
                Your chick she so thirsty <br>
                I'm in that two seat Lambo"
              </p>
               @endif

          </div>
          <hr>
          <div class="button-container">
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-facebook-f"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
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




