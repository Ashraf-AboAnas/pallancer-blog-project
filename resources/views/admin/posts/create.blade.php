

@extends('layouts.master')


@section('stylesheets')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection


@section('title')

Create New Post|blog ...
@endsection


@section('content')



<div class="content">
        <div class="row">
          <div class="col-md-12">
              <div class="card">
                    <div class="card-header">

                        <h4 class="card-title">Add New POst</h4>

                    </div>
                          @include('admin._alert')
                                    @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                    @endif

                        <div class="card-body">


                                <form action="{{route('posts.store')}}"method="post" enctype="multipart/form-data">
                                    @include('admin.posts._forms',[
                                    'posts'=> new App\Models\Posts(),
                                    'tags'=>App\Models\Tags::all()


                                ])
                                </form>







                    </div>
                </div>
        </div>
</div>



 @endsection


 @section('scripts')

 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

     <script>
    $(document).ready(function() {
        $('.select2').select2();
    });

     </script>


@endsection
