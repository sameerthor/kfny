<div class="kfnythemes_modal">
<div class="modal fade" id="addVenue" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-class">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Venue</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal_main_body">
        <form id="venueForm">
          <div class="modal-body">
            @csrf
            @method('post')
            <div class="examAlertMsg"></div>
            <div class="row">

              <div class="col-lg-12 col-md-12">
                <div class="form-group">
                  <label class="mb-1">Venue Name<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="venue_name" id="venue_name" data-rule-required="true">
                  <span class="text-danger error venue_name-error"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary save-venue" data-url="{{route('venue.store')}}">SUBMIT</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

</div>
