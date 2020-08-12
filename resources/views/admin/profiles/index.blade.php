

@extends('layouts.master')

@section('title')

Dashboard |blog ...
@endsection


@section('content')


<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Users Table</h4>

                @include('admin._alert')
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">



                      <th> Name </th>
                      <th>phone # </th>
                      <th> Emial</th>
                      <th> Grade</th>
                      <th class=""> Options </th>
                      </thead>


                    <tbody>
                      <tr>
                        <td> {{$user->name }}</td>
                        <td> {{$user->phone }}</td>
                        <td> {{$user->email }} </td>
                        <td>
                         <p>{{$user->usertype}}</p></th>
                        </td>
                        <td>
                          <div class="d-flex">


                            <a href="{{route('profiles.create')}}" class="btn btn-outline-success mr-1 " ><i class="fas fa-plus-circle" ></i></a>
                            <a href="{{route('posts.create')}}" class="btn btn-outline-info  " > <i class="far fa-eye"></i></a>

                                  {{-- /**************************/* --}}

                          </div>

                           </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>





@endsection
