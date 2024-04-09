<div class="kfnythemes_modal">
<div class="modal fade" id="editProviderInformationModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Insurance Company</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal_main_body">
        <form id="editinsuranceForm">
        <div class="modal-body">
            @csrf
            @method('put')
            <div class="examAlertMsg"></div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Insurance Company<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="insurance_company" value="{{$info['insurance_company']}}" id="insurance_company" data-rule-required="true">
                  <span class="text-danger error insurance_company-error"></span>
                </div>

              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Name<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="name" value="{{$info['name']}}" id="name" data-rule-required="true">
                  <span class="text-danger error name-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Address</label>
                  <input type="text" class="form-control " name="address" value="{{$info['address']}}" id="address">
                  <span class="text-danger error address-error"></span>
                </div>

              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">City</label>
                  <input type="text" class="form-control " name="city" value="{{$info['city']}}" id="city">
                  <span class="text-danger error city-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">State</label>
                  <input type="text" class="form-control " name="state" value="{{$info['state']}}" id="state">
                  <span class="text-danger error state-error"></span>
                </div>

              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Zip Code</label>
                  <input type="text" class="form-control " name="zip_code" value="{{$info['zip_code']}}" id="zip_code">
                  <span class="text-danger error zip_code-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">NAIC</label>
                  <input type="text" class="form-control " name="NAIC" value="{{$info['NAIC']}}" id="NAIC">
                  <span class="text-danger error NAIC-error"></span>
                </div>

              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">DMV</label>
                  <input type="text" class="form-control " name="DMV" value="{{$info['DMV']}}" id="DMV">
                  <span class="text-danger error DMV-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Phone Number</label>
                  <input type="text" class="form-control " name="phone_number" value="{{$info['phone_number']}}" id="phone_number">
                  <span class="text-danger error phone_number-error"></span>
                </div>

              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Fax Number</label>
                  <input type="text" class="form-control " name="fax_number" value="{{$info['fax_number']}}" id="fax_number">
                  <span class="text-danger error fax_number-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Best Contact Person</label>
                  <input type="text" class="form-control " name="best_contact_person" value="{{$info['best_contact_person']}}" id="best_contact_person">
                  <span class="text-danger error best_contact_person-error"></span>
                </div>

              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Known Email</label>
                  <input type="email" class="form-control " name="known_email" value="{{$info['known_email']}}" id="known_email">
                  <span class="text-danger error known_email-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Filing Fees</label>
                  <input type="text" class="form-control " name="filing_fees_date_specific" value="{{$info['filing_fees_date_specific']}}" id="filing_fees_date_specific">
                  <span class="text-danger error filing_fees_date_specific-error"></span>
                </div>

              </div>
             
            </div>
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary update-insurance" data-url="{{route('insurance-company.update',$info['id'])}}">SUBMIT</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
</div>