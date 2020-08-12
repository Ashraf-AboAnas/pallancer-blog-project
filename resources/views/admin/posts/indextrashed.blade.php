

@extends('layouts.master')

@section('title')

Categories|blog ...
@endsection


@section('content')



<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">All POsts Trashed</h4>
                    <div class="d-flex">


                             </div>
                                 {{-- @include('admin._alert')
                                   @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                   {{ session('status') }}
                                </div>
                                  @endif --}}
                      </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th> # </th>
                      <th> Image </th>

                      <th> Title </th>
                      <th> Description </th>
                      <th> Content </th>
                      <th class=""> Options </th>
                      </thead>

                      @foreach ($posts as  $key =>$posts)

                    <tbody>
                      <tr>
                        <td>  {{ $key+1  }}  </td>
                        <td> <img src="{{asset('images/'. $posts->image) }}" height="70px"> </td>

                        <td>  {{$posts->title}}      </td>
                        <td> {{$posts->description }}</td>
                        <td>  {{$posts->content }}    </td>
                        <td class="">
                          <div class="d-flex">
                          <a href="{{route('restore',$posts->id)}}" class="btn btn-outline-primary mr-1 "> Restore</i>
                             </a>


                                 <form method="post" action ="{{route('posts.destroy',[$posts->id])}}">
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
                  {{--{{ $posts->links() }} --}}
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



@endsection

