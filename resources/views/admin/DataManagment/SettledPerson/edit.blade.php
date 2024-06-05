<div class="kfnythemes_modal">
  <div class="modal fade" id="editSettledPersonModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Settled Person</h1>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal_main_body">
          <form id="editSettledPersonForm">
            <div class="modal-body">
              @csrf
              @method('put')
              <div class="examAlertMsg"></div>
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <label class="mb-1">Name<span class="text-danger ">*</span></label>
                    <input type="text" class="form-control " value="{{$info['name']}}" name="name" id="name" data-rule-required="true">
                    <span class="text-danger error name-error"></span>
                  </div>
                </div>
                <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <label class="mb-1">Email/Fax<span class="text-danger ">*</span></label>
                    <input type="text" class="form-control " value="{{$info['email_fax']}}" name="email_fax" id="email_fax" data-rule-required="true">
                    <span class="text-danger error email_fax-error"></span>
                  </div>
                </div>
                <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <label class="mb-1">Phone Number<span class="text-danger ">*</span></label>
                    <input type="text" class="form-control " value="{{$info['phone_number']}}" name="phone_number" id="phone_number" data-rule-required="true">
                    <span class="text-danger error phone_number-error"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary update-settled-person" data-url="{{route('settled_person.update',$info['id'])}}">SUBMIT</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>