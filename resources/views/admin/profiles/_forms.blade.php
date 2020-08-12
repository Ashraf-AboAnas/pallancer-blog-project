
@csrf
@method('put')
<div class="row">
  <div class="col-md-6 pr-1">
    <div class="form-group">
      <label>Facebook Address</label>
      <input type="text" class="form-control  @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{old('facebook',$profiles->facebook)}}">
      @error('facebook')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
  </div>
  <div class="col-md-6 pl-1">
    <div class="form-group">
      <label>Twitter Address </label>
      <input type="text" class="form-control  @error('twitter') is-invalid @enderror" id="twitter" name="twitter" value="{{old('twitter',$profiles->twitter)}}">
      @error('twitter')
        <p class="text-danger">{{ $message }}</p>
     @enderror
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-10">
     <div class="form-group">

            @if($profiles->image)
                <img src="{{asset('images/'. $profiles->image) }}" height="90px">
            @else <img src="{{asset('assets/img/userprofileimg.jpg')}}"height="90px"alt="...">
            @endif
        <label for="image">Import Your Image <i style= color:blue;>click here</i> </label>
        <input type="file" class=" form-control @error('image') is-invalid @enderror" id="image" name="image">
        @error('image')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
    </div>
        <div class="col-md-2">
           <div class="form-group">
             <i style="color:#f96332;font-size: 2em ;" class="now-ui-icons media-1_album mt-3 " data-toggle="modal" data-target="#exampleModal"></i>
           </div>

      </div>


</div>
<div class="row">
  <div class="col-md-6 ">
    <div class="form-group">
      <label for="city">City</label>
      <input type="text" class="form-control  @error('city') is-invalid @enderror" placeholder="City" name="city" value="{{old('city',$profiles->city)}}">
      @error('city')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="country">Country</label>
      <input type="text" class="form-control  @error('country') is-invalid @enderror" placeholder="Country"  name="country"value="{{old('country',$profiles->country)}}">
      @error('country')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
  </div>

</div>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
        <label for="about" >About YOu :</label>
        <textarea  name="about"class ="form-control  @error('about') is-invalid @enderror" id="about"> {{old('about',$profiles->about)}}</textarea>
        @error('about')
          <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
  </div>
</div>

{{-- <div class="modal-footer" style="border-top: 0">
    <a href="{{route('profiles.edit',Auth::user()->id)}}" class="btn btn-secondary" >Cancle</a>
           <button type="submit" class="btn btn-primary">Save changes</button>
</div> --}}
<div class="footer_float">
    <button type="submit" class="btn btn-primary">Save changes</button>
    <a href="{{route('profiles.edit',Auth::user()->id)}}" class="btn btn-secondary" >Cancle</a>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Profile Image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @if($profiles->image)
            <img src="{{asset('images/'. $profiles->image)  }}" >
            @else <img src="{{asset('assets/img/userprofileimg.jpg')}}"alt="...">
            @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>
{{--
    @csrf
    {{-- <input type="hidden"  id="user_id" name="user_id"value = "{{Auth::user()->id}}"> --}}

    {{-- <div class="form-group">
        <label for="facebook">facebook address </label>
         <input type="text" class="form-control  @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{old('facebook',$profiles->facebook)}}">
          @error('facebook')
         <p class="text-danger">{{ $message }}</p>
         @enderror

  </div>
<div class="form-group">
    <label for="twitter">twitter address </label>
     <input type="text" class="form-control  @error('twitter') is-invalid @enderror" id="twitter" name="twitter" value="{{old('twitter',$profiles->twitter)}}">
      @error('twitter')
     <p class="text-danger">{{ $message }}</p>
     @enderror
</div>


      <div class="form-group">
                      <label for="about" >About YOu :</label>
                      <textarea  name="about"class ="form-control  @error('about') is-invalid @enderror" id="about"> {{old('about',$profiles->about)}}</textarea>
                      @error('about')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
      </div>



      <div class="form-group">
            @if($profiles->image)
          <img src="{{asset('images/'. $profiles->image) }}" height="90px">
             @endif
          <label for="image">Import Your Image <i style= color:blue;>click here</i> </label>
          <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
          @error('image')
           <p class="text-danger">{{ $message }}</p>
          @enderror
      </div>



      <br>


      <div class="modal-footer">
        <a href="{{route('profiles.edit',Auth::user()->id)}}" class="btn btn-secondary" >Cancle</a>
               <button type="submit" class="btn btn-primary">Save changes</button>
      </div>

</div> --}}
