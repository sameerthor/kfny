<div class="kfnythemes_modal">
<div class="modal fade" id="addDefence" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Defence Firm</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal_main_body">
        <form id="defenseFirmForm">
          <div class="modal-body">
            @csrf
            @method('post')
            <div class="examAlertMsg"></div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Firm Name<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="firm_name" id="firm_name" data-rule-required="true">
                  <span class="text-danger error firm_name-error"></span>
                </div>

              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Name<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="name" id="name" data-rule-required="true">
                  <span class="text-danger error name-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Address<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="address" id="address" data-rule-required="true">
                  <span class="text-danger error address-error"></span>
                </div>

              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">City<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="city" id="city" data-rule-required="true">
                  <span class="text-danger error city-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">State<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="state" id="state" data-rule-required="true">
                  <span class="text-danger error state-error"></span>
                </div>

              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Zip Code<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="zip_code" id="zip_code" data-rule-required="true">
                  <span class="text-danger error zip_code-error"></span>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Phone Number<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="phone_number" id="phone_number" data-rule-required="true">
                  <span class="text-danger error phone_number-error"></span>
                </div>

              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Fax Number<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="fax_number" id="fax_number" data-rule-required="true">
                  <span class="text-danger error fax_number-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Best Contact Person<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="best_contact_person" id="best_contact_person" data-rule-required="true">
                  <span class="text-danger error best_contact_person-error"></span>
                </div>

              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Known Email<span class="text-danger ">*</span></label>
                  <input type="email" class="form-control " name="known_email" id="known_email" data-rule-required="true">
                  <span class="text-danger error known_email-error"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary save-firm" data-url="{{route('defense-firm.store')}}">SUBMIT</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
</div>