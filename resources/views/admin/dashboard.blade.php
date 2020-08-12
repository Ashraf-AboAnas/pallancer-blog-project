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

                <h4 class="card-title"> Site stats</h4>
              </div>
              @include('admin._alert')
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th># Users </th>
                      <th># Categories </th>
                      <th ># Pots</th>

                      </thead>
                    <tbody>
                      <tr style="color:green;">
                        <td> <label class="py-3 px-4 badge btn-primary" ><b style="color: black; ">{{$user_count}} users</b></label></td>
                        <td> <label class="py-3 px-4 badge btn-info" ><b style="color: black; ">{{$cat_count}}  categories  </b></label></td>
                        <td> <label class="py-3 px-4 badge btn-danger" ><b style="color: black; ">{{$posts_count}} posts </b></label></td>


                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
           {{-- <div class="card-header">
            <h5 class="card-category">Users</h5>
            <h4 class="card-title">#of  user </br>{{$user_count}} users</h4>
           </div> --}}
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

@section('scripts')

@endsection
