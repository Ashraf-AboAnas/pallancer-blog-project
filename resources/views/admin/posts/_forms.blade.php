

    @csrf

 <div class="form-group">
   <label for="title">Pos Ttitle Name </label>
   <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title',$posts->title)}}">
   @error('title')
  <p class="text-danger">{{ $message }}</p>
   @enderror

 </div>



  <div class="form-group">
       <label for="category_id">Catgory Name</label>
      <select name="category_id" class="form-control @error('category_id') is-invalid @enderror ">
        <option value="">Select Category</option>
         @foreach (App\Models\Catrgories::all() as $cat)
         <option @if ($cat->id == old('category_id',$posts->category_id )) selected @endif value="{{$cat->id}}">{{$cat->name_an}}</option>
          @endforeach
     </select>
         @error('category_id')
           <p class="text-danger">{{ $message }}</p>
           @enderror
   </div>



       <div class="form-group">
                      <label for="description" >Description:</label>
                      <textarea  name="description"class="form-control  @error('description') is-invalid @enderror" id="description" >{{old('description',$posts->description)}}</textarea>
                      @error('description')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
      </div>

      <div class="form-group">
                      <label for="content" >Content:</label>
                      <textarea  name="content"class="form-control  @error('content') is-invalid @enderror" id="content">{{old('content',$posts->content)}}</textarea>
                      @error('content')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
      </div>



      <div class="form-group">
            @if($posts->image)
          <img src="{{asset('images/'. $posts->image) }}" height="90px">
             @endif
          <label for="image">Import  Image <i style= color:blue;>click here</i> </label>
          <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
          @error('image')
           <p class="text-danger">{{ $message }}</p>
          @enderror
      </div>

        @if(!($tags->count()<=0))

      <div class="form-group">
          <label for="tagsselect"> Select Tage Name</label>
          <select name="tags[]" class="form-control select2  " id="tags" multiple>
         {{-- ($tag->id  old('tags',$posts->tags->pluck('id')->toArray() )) --}}
             @foreach (App\Models\Tags::all() as $tag)
              <option   value="{{$tag->id}}"
                @if ($posts->hasTag($tag->id)) selected

                 @endif

                 >{{$tag->name}}</option>
                 @endforeach
          </select>

             @endif

             @error('tagsselect')
             <p class="text-danger">{{ $message }}</p>
              @enderror
        </div>




      <br>


      <div class="footer_float">
               <button type="submit" class="btn btn-primary">Save changes</button>
               <a href="{{route('posts.index')}}" class="btn btn-secondary" >Cancle</a>
      </div>


