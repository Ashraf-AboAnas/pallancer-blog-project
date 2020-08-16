<!-- Modal -->


<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        @csrf

      <div class="modal-body">

          <div class="form-group">

            <label for="name_ar">categoy name_Ar</label>
            <input type="text" name="name_ar" class="title form-control @error('name_ar') is-invalid @enderror " id="name_ar" value="" >
                @error('name_ar')
                 <p class="text-danger">{{ $message }}</p>
                 @enderror
          </div>
          <input type="hidden" name="categories_id" id="categories_id" value="" >
          <div class="form-group">
          <label for="name_an">categoy name_En </label>
            <input type="text" name="name_an" class="title form-control @error('name_an') is-invalid @enderror " id="name_an" value="" >
                @error('name_an')
                 <p class="text-danger">{{ $message }}</p>
                 @enderror
          </div>

                <div class="footer_float">
                <a href="{{route('categories.index')}}" class="btn btn-secondary" >Cancle</a>
                  <button type="submit" class="btn btn-primary">Save changes</button>

                  </div>
                </div>
              </div>
            </div>
          </div>

