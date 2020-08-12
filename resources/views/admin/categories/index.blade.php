

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
                <h4 class="card-title">All Categories</h4>
                    <div class="d-flex">

                    <div class="ml-auto">
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" disabeld="block">ADD New Abuot US</button> -->
                         <a href=""  class="btn btn-outline-success mt-2 "  data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle"></i></a>
                          </div>
                             </div>
                                 @include('admin._alert')

                      </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th> # </th>
                      <th> Categories Name_ar </th>
                      <th>Categories Name_en </th>

                      <th class=""> Options </th>
                      </thead>

                      @foreach ($categories as  $key =>$categories)

                    <tbody>
                      <tr>
                         <td>  {{ $key+1  }}  </td>
                        <td>  {{$categories->name_ar}}    </td>
                        <td> {{$categories->name_an }}</td>

                        <td class="">
                          <div class="d-flex">
  <button type="submit" class="btn btn-outline-warning mr-1 " data-cat_id="{{$categories->id}}" data-name_ar="{{$categories->name_ar}}" data-name_an="{{$categories->name_an }}" data-toggle="modal" data-target="#cat_edit">
                                            <i class="far fa-edit"></i>
                  </button>


                                 <form method="post" action ="{{route('categories.destroy',[$categories->id] )}}">
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



<!--************ poup Add New categories ************* */-->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add New categories</h5>

      <form action="" method="post">

         @include('admin.categories._forms')

       </form>
<!-- ************ end poup ******************* -->


<!--************poup Update categories ************* */-->
<div class="modal fade" id="cat_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Update categories</h5>

 <form action="{{route('categories.update','test')}}" method="post">
      @method('put')

      @include('admin.categories._forms')


</form>
<!-- ************ end ******************* -->

@endsection
@section('scripts')
<script>

    $('#cat_edit').on('show.bs.modal', function (event) {
     // console.log('model opend');
      var button = $(event.relatedTarget) // Button that triggered the modal

      var cat_idpoup = button.data('cat_id')
      var cat_name_arpoup = button.data('name_ar')
      var cat_name_anpoup = button.data('name_an')

      var modal = $(this)

      modal.find('.modal-body #categories_id').val(cat_idpoup)
      modal.find('.modal-body #name_ar').val(cat_name_arpoup)
      modal.find('.modal-body #name_an').val(cat_name_anpoup)

    })

    </script>
@endsection
