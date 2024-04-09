<div class="kfnythemes_modal">
  <div class="modal fade" id="addArbitrator" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header header-class">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Arbitrator</h1>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal_main_body">
          <form id="arbitratorForm">
            <div class="modal-body">
              @csrf
              @method('post')
              <div class="examAlertMsg"></div>
              <div class="row">

                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Name<span class="text-danger ">*</span></label>
                    <input type="text" class="form-control " name="name" id="name" data-rule-required="true">
                    <span class="text-danger error name-error"></span>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Email</label>
                    <input type="email" class="form-control " name="email" id="email">
                    <span class="text-danger error email-error"></span>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Phone #</label>
                    <input type="text" class="form-control " name="phone_number" id="phone_number">
                    <span class="text-danger error phone_number-error"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary save-arbitrator" data-url="{{route('arbitrator.store')}}">SUBMIT</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

</div>