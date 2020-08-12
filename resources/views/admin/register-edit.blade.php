
@extends('layouts.master')

@section('title')

Edit USer |blog ...
@endsection



@section('content')

   <div class=" col-md-8 offset-md-2">

   <form action="{{route('userupdate',[$user->id] )}}" method="post">
   @method('put')
        @csrf


                <h1 style="color:blue;" class="h3 mt-2 text-gray-800" align="center">User Update</h1>




        <div class="form-group">
            <label for="name">User Name</label>
            <input type="text" class="  form-control @error('name') is-invalid @enderror" name="name"  id="name" value="{{old('name',$user->name)}}" >
            @error('name')
             <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="text" class=" form-control @error('email') is-invalid @enderror" name="email"  id="email"  value="{{old('email',$user->email)}}" >
                   @error('email')
                 <p class="text-danger">{{ $message }}</p>
                 @enderror
        </div>

        <div class="form-group">
                <label for="phone">Phone #</label>
                <input type="text" class=" form-control  @error('phone') is-invalid @enderror" name="phone"  id="phone" value="{{old('phone',$user->phone)}}" >
                @error('phone')
                 <p class="text-danger">{{ $message }}</p>
                 @enderror
        </div>



        <div class="form-group">
            <label for="usertype">usertype</label>

                <select name="usertype" class="form-control @error('usertype') is-invalid @enderror ">
                    <option value="admin" >--SELECT USER--</option>
                <option value="admin" >admin</option>
                <option  value="user">user</option>
                <option  value="writer" >writer</option>
              </select>
              @error('usertype')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>

            <div class="modal-footer">

            <a href="{{route('userslogin')}}"  class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Save changes</button>

            </div>

  </form>
  </div>
  <br> <br> <br>
@endsection
