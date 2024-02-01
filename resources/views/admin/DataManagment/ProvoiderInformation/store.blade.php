<div class="kfnythemes_modal">
<div class="modal fade" id="addProviderInformation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Provider Information</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal_main_body">
        <form id="provoiderInformationForm" >
          <div class="modal-body">
            @csrf
            @method('post')
            <div class="examAlertMsg"></div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Provider Type<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="provider_type" id="provider_type" data-rule-required="true"  >
                  <span class="text-danger error provider_type-error"></span>
                </div>
               
              </div>
              <div class="col-lg-6 col-md-6">
              <div class="form-group">
                  <label class="mb-1">Name<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="name" id="name" data-rule-required="true"  >
                  <span class="text-danger error name-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Address<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="address" id="address" data-rule-required="true"  >
                  <span class="text-danger error address-error"></span>
                </div>
               
              </div>
              <div class="col-lg-6 col-md-6">
              <div class="form-group">
                  <label class="mb-1">City<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="city" id="city" data-rule-required="true"  >
                  <span class="text-danger error city-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">State<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="state" id="state" data-rule-required="true"  >
                  <span class="text-danger error state-error"></span>
                </div>
               
              </div>
              <div class="col-lg-6 col-md-6">
              <div class="form-group">
                  <label class="mb-1">Zip Code<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="zip_code" id="zip_code" data-rule-required="true"  >
                  <span class="text-danger error zip_code-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Phone Number<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="phone_number" id="phone_number" data-rule-required="true"  >
                  <span class="text-danger error phone_number-error"></span>
                </div>
               
              </div>
              <div class="col-lg-6 col-md-6">
              <div class="form-group">
                  <label class="mb-1">Tax Id<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="tax_id" id="tax_id" data-rule-required="true"  >
                  <span class="text-danger error tax_id-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Owner Name<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="owner_name" id="owner_name" data-rule-required="true"  >
                  <span class="text-danger error owner_name-error"></span>
                </div>
               
              </div>
              <div class="col-lg-6 col-md-6">
              <div class="form-group">
                  <label class="mb-1">Owner Address<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="owner_address" id="owner_address" data-rule-required="true"  >
                  <span class="text-danger error owner_address-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Owner Phone Number<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="owner_phone_number" id="owner_phone_number" data-rule-required="true"  >
                  <span class="text-danger error owner_phone_number-error"></span>
                </div>
               
              </div>
              <div class="col-lg-6 col-md-6">
              <div class="form-group">
                  <label class="mb-1">Owner User Name<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="owner_user_name" id="owner_user_name" data-rule-required="true"  >
                  <span class="text-danger error owner_user_name-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Owner Password<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="owner_password" id="owner_password" data-rule-required="true"  >
                  <span class="text-danger error owner_password-error"></span>
                </div>
               
              </div>
              <div class="col-lg-6 col-md-6">
              <div class="form-group">
                  <label class="mb-1">Owner License Number<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="owner_license_number" id="owner_license_number" data-rule-required="true"  >
                  <span class="text-danger error owner_license_number-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Affidavit Signor<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="affidavit_signor" id="affidavit_signor" data-rule-required="true"  >
                  <span class="text-danger error affidavit_signor-error"></span>
                </div>
               
              </div>
              <div class="col-lg-6 col-md-6">
              <div class="form-group">
                  <label class="mb-1">Litigation Principle<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="litigation_principle" id="litigation_principle" data-rule-required="true"  >
                  <span class="text-danger error litigation_principle-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Litigation Interest<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="litigation_interest" id="litigation_interest" data-rule-required="true"  >
                  <span class="text-danger error litigation_interest-error"></span>
                </div>
               
              </div>
              <div class="col-lg-6 col-md-6">
              <div class="form-group">
                  <label class="mb-1">Arbitration Principle<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="arbitration_principle" id="arbitration_principle" data-rule-required="true"  >
                  <span class="text-danger error arbitration_principle-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Arbitration Interest<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="arbitration_interest" id="arbitration_interest" data-rule-required="true"  >
                  <span class="text-danger error arbitration_interest-error"></span>
                </div>
               
              </div>
              <div class="col-lg-6 col-md-6">
              <div class="form-group">
                  <label class="mb-1">Billing Company<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="billing_company" id="billing_company" data-rule-required="true"  >
                  <span class="text-danger error billing_company-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Billing Company Person Name<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="billing_company_person_name" id="billing_company_person_name" data-rule-required="true"  >
                  <span class="text-danger error billing_company_person_name-error"></span>
                </div>
               
              </div>
              <div class="col-lg-6 col-md-6">
              <div class="form-group">
                  <label class="mb-1">Billing Company Contact Name<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="billing_company_contact_person" id="billing_company_contact_person" data-rule-required="true"  >
                  <span class="text-danger error billing_company_contact_person-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Billing Company Phone<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="billing_company_phone" id="billing_company_phone" data-rule-required="true"  >
                  <span class="text-danger error billing_company_phone-error"></span>
                </div>
               
              </div>
              <div class="col-lg-6 col-md-6">
              <div class="form-group">
                  <label class="mb-1">Billing Company email<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="billing_company_email" id="billing_company_email" data-rule-required="true"  >
                  <span class="text-danger error billing_company_email-error"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary save-provoiderInformation" data-url="{{route('data-management.store')}}">SUBMIT</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
</div>