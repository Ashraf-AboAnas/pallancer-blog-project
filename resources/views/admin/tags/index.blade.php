

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

                <h4 class="card-title">All Tags</h4>

                <div class=" col-md-8 offset-md-2">
                    {{-- <div class="d-flex">

                       <div class="ml-auto">
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" disabeld="block">ADD New Abuot US</button> -->
                         <a href=""  class="btn btn-outline-success mt-2"  data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle"></i></a>
                       </div> --}}




              <div class="card-body">

                @include('admin._alert')
                @if (session('status'))
                       <div class="alert alert-success" role="alert">
                        {{ session('status') }}

                       </div>
               @endif

              </div> <!-- <div class=" col-md-8 offset-md-2">-->
                <div class="table-responsive">
                  <table class="table">
                    <a href=""  class="btn btn-outline-success mt-2"  data-toggle="modal"
                    data-target="#exampleModal"><i class="fas fa-plus-circle"></i></a>

                    <thead class=" text-primary">
                      <th> # </th>
                      <th>Tag Name </th>
                      {{-- <th>Tag Name </th> --}}

                      <th class=""> Options </th>
                      </thead>

                      @foreach ($tags as  $key =>$tags)

                    <tbody>
                      <tr>
                        <td>  {{ $key+1  }}   </td>
                        <td >  {{$tags->name}} <span class="badge badge-primary ml-2">{{$tags->posts->count()}}</span> </td>
                        {{-- <td>  {{$tags->name}} </td> --}}


                        <td class="">
                          <div class="d-flex">
                             <button type="submit" class="btn btn-outline-warning mr-1 " data-tags_id="{{$tags->id}}" data-name="{{$tags->name}}"  data-toggle="modal" data-target="#tags_edit">
                                            <i class="far fa-edit"></i>
                              </button>


                                 <form method="post" action ="{{route('tags.destroy',[$tags->id] )}}">
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
   </div>
</div>



<!--************ poup Add New categories ************* */-->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add New Tags</h5>

      <form action="" method="post">

         @include('admin.tags._forms')

       </form>
<!-- ************ end poup ******************* -->


<!--************poup Update categories ************* */-->
<div class="modal fade" id="tags_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Update Tags</h5>

 <form action="{{route('tags.update','test')}}" method="post">
      @method('put')

      @include('admin.tags._forms')

</form>
<!-- ************ end ******************* -->

@endsection

@section('scripts')
{{-- <script src="{{asset('js/app.js')}}"></script> --}}
<script>

    $('#tags_edit').on('show.bs.modal', function (event) {
     // console.log('model opend');
      var button = $(event.relatedTarget) // Button that triggered the modal

      var tag_idpoup = button.data('tags_id')
      var tag_name_arpoup = button.data('name')


      var modal = $(this)

      modal.find('.modal-body #tags_id').val(tag_idpoup)
      modal.find('.modal-body #name').val(tag_name_arpoup)


    })

    </script>


@endsection
