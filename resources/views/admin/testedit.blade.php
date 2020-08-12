
@extends('layouts.master')

@section('title')

Edit About Us|blog ...
@endsection



@section('content')

   <div class=" col-md-8 offset-md-2">
              
   <form action="" method="post">
   @method('put')
        @csrf
       

                <h1 style="color:blue;" class="h3 mt-2 text-gray-800" align="center">About Us Update</h1>
                
            
            
            
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="  form-control @error('title') is-invalid @enderror" name="title"  id="title" value=">
            @error('title')
             <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
            
            <div class="form-group">
                <label for="subtitle">Sub-Title</label>
                <input type="text" class=" form-control @error('subtitle') is-invalid @enderror" name="subtitle"  id="subtitle"  value=" >
                   @error('subtitle')
                 <p class="text-danger">{{ $message }}</p>
                 @enderror
        </div>
        
        <div class="form-group">
                      <label for="description" >Description:</label>
                      <textarea  name="description"class="form-control" id="description"></textarea>
           </div>

            <div class="modal-footer">

            <a href="{{route('abouts.index')}}"  class="btn btn-secondary">Cancel</a>      
                <button type="submit" class="btn btn-primary">Save changes</button>

            </div>

  </form>
  </div>
  <br> <br> <br>  
@endsection