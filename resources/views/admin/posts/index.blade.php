

@extends('layouts.master')

@section('title')

Categories|blog ...
@endsection

@section('stylesheets')
<link href="{{asset('assets/css/dataTables.min.css') }}" rel="stylesheet" />
@endsection


@section('content')


<div class="content">
        <div class="row">
          <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                 <h4 class="card-title">All POsts</h4>
               </div>




                    <div class="d-flex">
                       <div class="ml-auto">
                         <a href="{{route('posts.create')}}"  class="btn btn-outline-success mt-2 mr-2 " ><i class="fas fa-plus-circle"></i></a>
                        </div>

                    </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table  id="datatable" class="table">
                    <thead class=" text-primary">
                      <th> # </th>
                      <th> Image </th>
                      <th> Category Name </th>
                      <th> Title </th>
                      <th> Description </th>
                      {{-- <th> Content </th> --}}
                      <th class=""> Options </th>
                      </thead>

                      @foreach ($posts as  $key =>$posts)

                      <tbody>
                        <tr>
                          <td>  {{ $key+1  }}  </td>
                          <td> <img src="{{asset('images/'. $posts->image) }}" height="70px"> </td>
                          <td>  {{ $posts->cat_name  }}  </td>
                          <td>  {{$posts->title}}      </td>
                          <td> {{$posts->description }}</td>
                          {{-- <td>  {{$posts->content }}    </td> --}}
                          <td class="">
                            <div class="d-flex">

                               <a href="{{route('postsedit',$posts->id)}}" class="btn btn-outline-warning mr-1 "><i class="far fa-edit"></i>
                               </a>



                                 <form method="post" action ="{{route('posts.destroy',[$posts->id])}}">
                                   @method('delete')
                                   @csrf
                                    <button type="submit" class="btn btn-outline-danger mr-1 cofirmDelete">
                                  {{ $posts->trashed()?'Delete':'Trashed' }}   <i class="fas fa-trash-alt"></i>
                                    </button>

                                   </form>

                            </div>

                          </td>
                      </tr>
                      @endforeach
                    </div>
                  </tbody>
                  {{--{{ $posts->links() }} --}}
                  </table>
                </div>
            </div>
        </div>
   </div>
</div>




@endsection



@section('scripts')
<script src="{{asset('assets/js/dataTables.min.js')}}"></script>
     <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        });
    </script>


@endsection
