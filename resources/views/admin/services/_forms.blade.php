<!-- Modal -->

  
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>                                 
      
        @csrf
       
      <div class="modal-body">
              
          <div class="form-group">

            <label for="service_name">services name</label>
            <input type="text" name="service_name" class="title form-control @error('service_name') is-invalid @enderror " id="service_name" value="" >
                @error('service_name')
                 <p class="text-danger">{{ $message }}</p>
                 @enderror
          </div>
          <input type="hidden" name="service_id" id="service_id" value="" >
          
          <div class="form-group">
                      <label for="service_description" > Services Description:</label>
                      <textarea  name="service_description"class="form-control  @error('service_description') is-invalid @enderror" id="services_description"></textarea>
                      @error('service_description')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
           </div>



                      <div class="modal-footer">
                      <a href="{{route('services.index')}}" class="btn btn-secondary" >Cancle</a>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        
                      </div>
                </div>
              </div>
            </div>
          </div> 
       
