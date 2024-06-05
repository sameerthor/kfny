<div class="kfnythemes_modal">
<div class="modal fade" id="addSettledPerson" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-class">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Settled Person</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal_main_body">
        <form id="settledPersonForm">
          <div class="modal-body">
            @csrf
            @method('post')
            <div class="examAlertMsg"></div>
            <div class="row">
              <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <label class="mb-1">Name<span class="text-danger ">*</span></label>
                    <input type="text" class="form-control " value="" name="name" id="name" data-rule-required="true">
                    <span class="text-danger error name-error"></span>
                  </div>
                </div>
                <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <label class="mb-1">Email/Fax<span class="text-danger ">*</span></label>
                    <input type="text" class="form-control " value="" name="email_fax" id="email_fax" data-rule-required="true">
                    <span class="text-danger error email_fax-error"></span>
                  </div>
                </div>
                <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <label class="mb-1">Phone Number<span class="text-danger ">*</span></label>
                    <input type="text" class="form-control " value="" name="phone_number" id="phone_number" data-rule-required="true">
                    <span class="text-danger error phone_number-error"></span>
                  </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary save-settled-person" data-url="{{route('settled_person.store')}}">SUBMIT</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

</div>
