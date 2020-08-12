

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
                <h4 class="card-title"> Services</h4>
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
                      <th> Services Name </th>
                      <th>Services Description </th>
                      <th> status</th>
                      <th class=""> Options </th>
                      </thead>

                      @foreach ($services as  $key =>$services)

                    <tbody>
                      <tr>
                         <td>  {{ $key+1  }}  </td>
                        <td>  {{$services->service_name}}    </td>
                        <td> {{$services->service_description }}</td>

                        <td>  {{$services->status=='false'?'Not Active':'Active' }}  </td>

                        <td class="">
                          <div class="d-flex">
                  <button type="submit" class="btn btn-outline-warning mr-1 " data-myservicesid="{{$services->id}}" data-mytitle="{{$services->service_name}}" data-description="{{$services->service_description }}" data-toggle="modal" data-target="#edit">
                                            <i class="far fa-edit"></i>
                  </button>
                             <!-- <a href="{{route('services.edit',[$services->id])}}" class="btn btn-outline-warning mr-1 "  data-toggle="modal" data-target="#edit"><i class="far fa-edit"></i>
                             </a> -->


                                 <form method="post" action ="{{route('services.destroy',[$services->id])}}">
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



<!--************ poup Add New services ************* */-->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add New services</h5>

      <form action="{{route('services.store')}}" method="post">

         @include('admin.services._forms')

       </form>
<!-- ************ end poup ******************* -->


<!--************poup Update services ************* */-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Update services</h5>

 <form action="{{route('services.update','test')}}" method="post">
      @method('put')

      @include('admin.services._forms')

</form>
<!-- ************ end ******************* -->

@endsection

@section('scripts')



<script>

    $('#edit').on('show.bs.modal', function (event) {
     // console.log('model opend');
      var button = $(event.relatedTarget) // Button that triggered the modal

      var serviceidpoup = button.data('myservicesid')
      var service_namepoup = button.data('mytitle')
      var descriptionpoup = button.data('description')

      var modal = $(this)

      modal.find('.modal-body #service_id').val(serviceidpoup)
      modal.find('.modal-body #service_name').val(service_namepoup)
      modal.find('.modal-body #services_description').val(descriptionpoup)

    })

    </script>

    @endsection
