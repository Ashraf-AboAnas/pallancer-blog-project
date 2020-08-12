

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

                      <th> </th>
                      <th> # </th>
                      <th> Name </th>
                      <th>phone # </th>
                      <th> Emial</th>
                      <th> Role</th>
                      <th class=""> Options </th>
                      </thead>
                      @foreach ($user as  $key =>$user)

                    <tbody>
                      <tr>


                       <td>

                            @if(!(($user->usertype==='admin')||($user->usertype==='writer')))
                               <i onclick="event.preventDefault();
                                 document.getElementById('form-makewriter-{{$user->id}}').submit()"
                                 class="fas fa-check  cursor-pointer" style="color:rgb(76, 158, 60);">
                               </i>
                                <form style="display:none"  id="{{'form-makewriter-'.$user->id}}" method="post"

                                    action ="{{route('user.makewriter',$user->id)}}">
                                    @csrf
                                    @method('put')

                               </form>

                            @endif

                            @if(!(($user->usertype==='user')||($user->usertype==='admin')))
                               <i onclick="event.preventDefault();
                                document.getElementById('form-makeuser-{{$user->id}}').submit()"
                                class="fas fa-times  cursor-pointer"  style="color:rgb(201, 84, 84);">
                               </i>
                                <form style="display:none"  id="{{'form-makeuser-'.$user->id}}" method="post"

                                    action ="{{route('user.makeuser',$user->id)}}">
                                    @csrf
                                    @method('put')

                                </form>
                            @endif

                      </td>

                         <td>  {{ $key+1  }}  </td>
                        <td>  {{$user->name}}    </td>
                        <td> {{$user->phone }}</td>
                        <td> {{$user->email }} </td>
                        <td>

                            @if($user->usertype=='admin')
                            <div style="color: green"> {{$user->usertype}}</div>
                          @else
                         <p>{{$user->usertype}}</p></th>
                        @endif





                        </td>
                        <td>
                          <div class="d-flex">

                             <a href="{{route('useredit',[$user->id])}}" class="btn btn-outline-warning mr-1"><i class="far fa-edit"></i>
                             </a>

                                 <form method="post" action ="{{route('userdelete',[$user->id])}}">
                                   @method('delete')
                                   @csrf
                                    <button type="submit" class="btn btn-outline-danger mr-1 cofirmDelete">
                                     <i class="fas fa-trash-alt"></i>
                                    </button>

                                   </form>
                                  {{-- /**************************/* --}}

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




<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
  <div class="form-group">

    <label for="name">User Name</label>
    <input type="text" class="name form-control" id="name" value="" >
  </div>
  <div class="form-group">
    <label for="phone">Phone #</label>
    <input type="text" class="phone form-control" id="phone" value="" >
  </div>
  <div class="form-group">
    <label for="email">Email Address</label>
    <input type="text" class="email form-control" id="email"  value="" >
  </div>
  <div class="form-group">
  <select class="form-control form-control">
  <option>Superadmin</option>
  <option >admin</option>
  <option>user</option>
</select>
</div>

</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

@endsection
