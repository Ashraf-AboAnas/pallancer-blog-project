

@extends('layouts.master')

@section('title')

About Us|blog ...
@endsection


@section('content')



<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> About Us</h4>
                    <div class="d-flex">

                    <div class="ml-auto">
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" disabeld="block">ADD New Abuot US</button> -->
                         <a href=""  class="btn btn-outline-success mt-2 "  data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle"></i></a>
                          </div>
                             </div>
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
                      <th> # </th>
                      <th> Title </th>
                      <th>Sub-Title </th>
                      <th> Descriptions</th>
                      <th class=""> Options </th>
                      </thead>

                      @foreach ($abouts as  $key =>$abouts)

                    <tbody>
                      <tr>
                         <td>  {{ $key+1  }}  </td>
                        <td>  {{$abouts->title}}    </td>
                        <td> {{$abouts->subtitle }}</td>
                        <td>  {{$abouts->description }}  </td>

                        <td class="">
                          <div class="d-flex">

                             <a href="{{route('abouts.edit',[$abouts->id])}}" class="btn btn-outline-warning mr-1"><i class="far fa-edit"></i>
                             </a>

                                 <form method="post" action ="{{route('abouts.destroy',[$abouts->id])}}">
                                   @method('delete')
                                   @csrf
                                    <button type="submit" class="btn btn-outline-danger mr-1 cofirmDelete">
                                     <i class="fas fa-trash-alt"></i>
                                    </button>

                                   </form>

                          </div>

                           </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-plain">

              <div class="card-body">
                <div class="table-responsive">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



<!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add New About US</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('abouts.store')}}" method="post">

        @csrf
      <div class="modal-body">

          <div class="form-group">

            <label for="title">Title</label>
            <input type="text" name="title" class="title form-control @error('title') is-invalid @enderror " id="title" value="" >
                @error('title')
                 <p class="text-danger">{{ $message }}</p>
                 @enderror
          </div>
          <div class="form-group">
            <label for="subtitle">Sub-Title</label>
            <input type="text" name="subtitle" class="phone form-control @error('subtitle') is-invalid @enderror" id="subtitle" value="" >
            @error('subtitle')
                 <p class="text-danger">{{ $message }}</p>
                 @enderror
          </div>

          <div class="form-group">
                      <label for="description" >Description:</label>
                      <textarea  name="description"class="form-control  @error('subtitle') is-invalid @enderror" id="description"></textarea>
                      @error('description')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
           </div>



                <div class="modal-footer">
                <a href="{{route('abouts.index')}}" class="btn btn-secondary" >Cancle</a>
                  <button type="submit" class="btn btn-primary">Save changes</button>

                  </div>
                </div>
              </div>
            </div>
          </div>
          </form>
@endsection
