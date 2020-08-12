
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

  @csrf

<div class="modal-body">

    <div class="form-group">

      <label for="name_ar">tag name</label>
      <input type="text" name="name" class="title form-control @error('name') is-invalid @enderror " id="name" value="" >
          @error('name')
           <p class="text-danger">{{ $message }}</p>
           @enderror
    </div>
    <input type="hidden" name="tags_id" id="tags_id" value="" >



             <div class="modal-footer">
                <a href="{{route('tags.index')}}" class="btn btn-secondary" >Cancle</a>
              <button type="submit" class="btn btn-primary">Save changes</button>
           </div>

        </div>
      </div>
   </div>
</div>

