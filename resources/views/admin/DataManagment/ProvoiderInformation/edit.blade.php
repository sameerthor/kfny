<div class="kfnythemes_modal">
  <div class="modal fade" id="editProviderInformationModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Provider Information</h1>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal_main_body">
          <form id="editProvoiderInformationForm">
            <div class="modal-body">
              @csrf
              @method('put')
              <div class="examAlertMsg"></div>
              <input type="checkbox" id="user_credential" @if(!empty($info['user_id'])) disabled checked @endif name="user_credential" value="1">
              <label for="user_credential">@if(empty($info['user_id'])) Create @endif  Credentials</label><br>
              <div class="row" @if(empty($info['user_id'])) style="display: none;" @endif id="user_credential_box">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">User Email<span class="text-danger ">*</span></label>
                    <input type="text" class="form-control" value="{{@$info['user']['email']}}" @if(!empty($info['user_id'])) data-rule-required="true" @endif name="useremail" id="useremail">
                    <span class="text-danger error useremail-error"></span>
                  </div>

                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">@if(empty($info['user_id'])) Password @else New Password (Leave blank if not want to change old password.) @endif  <span class="text-danger ">*</span></label>
                    <input type="text" class="form-control" name="password" id="password" >
                    <span class="text-danger error password-error"></span>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Provider Type<span class="text-danger ">*</span></label>
                    <input type="text" class="form-control" name="provider_type" value="{{$info['provider_type'] ?? ''}}" id="provider_type" data-rule-required="true">
                    <span class="text-danger error provider_type-error"></span>
                  </div>

                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Name<span class="text-danger ">*</span></label>
                    <input type="text" class="form-control " name="name" value="{{$info['name'] ?? ''}}" id="name" data-rule-required="true">
                    <span class="text-danger error name-error"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Address</label>
                    <input type="text" class="form-control " name="address" value="{{$info['address'] ?? ''}}" id="address">
                    <span class="text-danger error address-error"></span>
                  </div>

                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">City</label>
                    <input type="text" class="form-control " name="city" value="{{$info['city'] ?? ''}}" id="city">
                    <span class="text-danger error city-error"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">State</label>
                    <input type="text" class="form-control " name="state" value="{{$info['state'] ?? ''}}" id="state">
                    <span class="text-danger error state-error"></span>
                  </div>

                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Zip Code</label>
                    <input type="text" class="form-control " name="zip_code" value="{{$info['zip_code'] ?? ''}}" id="zip_code">
                    <span class="text-danger error zip_code-error"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Phone Number</label>
                    <input type="text" class="form-control " name="phone_number" value="{{$info['phone_number'] ?? ''}}" id="phone_number">
                    <span class="text-danger error phone_number-error"></span>
                  </div>

                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Tax Id</label>
                    <input type="text" class="form-control " name="tax_id" value="{{$info['tax_id'] ?? ''}}" id="tax_id">
                    <span class="text-danger error tax_id-error"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Owner Name</label>
                    <input type="text" class="form-control " name="owner_name" value="{{$info['owner_name'] ?? ''}}" id="owner_name">
                    <span class="text-danger error owner_name-error"></span>
                  </div>

                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Owner Address</label>
                    <input type="text" class="form-control " name="owner_address" value="{{$info['owner_address'] ?? ''}}" id="owner_address">
                    <span class="text-danger error owner_address-error"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Owner Phone Number</label>
                    <input type="text" class="form-control " name="owner_phone_number" value="{{$info['owner_phone_number'] ?? ''}}" id="owner_phone_number">
                    <span class="text-danger error owner_phone_number-error"></span>
                  </div>

                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Owner User Name</label>
                    <input type="text" class="form-control " name="owner_user_name" value="{{$info['owner_user_name'] ?? ''}}" id="owner_user_name">
                    <span class="text-danger error owner_user_name-error"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Owner Password</label>
                    <input type="text" class="form-control " name="owner_password" value="{{$info['owner_password'] ?? ''}}" id="owner_password">
                    <span class="text-danger error owner_password-error"></span>
                  </div>

                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Owner License Number</label>
                    <input type="text" class="form-control " name="owner_license_number" value="{{$info['owner_license_number'] ?? ''}}" id="owner_license_number">
                    <span class="text-danger error owner_license_number-error"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Affidavit Signor</label>
                    <input type="text" class="form-control " name="affidavit_signor" value="{{$info['affidavit_signor'] ?? ''}}" id="affidavit_signor">
                    <span class="text-danger error affidavit_signor-error"></span>
                  </div>

                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Litigation Principle</label>
                    <input type="text" class="form-control " name="litigation_principle" value="{{$info['litigation_principle'] ?? ''}}" id="litigation_principle">
                    <span class="text-danger error litigation_principle-error"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Litigation Interest</label>
                    <input type="text" class="form-control " name="litigation_interest" value="{{$info['litigation_interest'] ?? ''}}" id="litigation_interest">
                    <span class="text-danger error litigation_interest-error"></span>
                  </div>

                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Arbitration Principle</label>
                    <input type="text" class="form-control " name="arbitration_principle" value="{{$info['arbitration_principle'] ?? ''}}" id="arbitration_principle">
                    <span class="text-danger error arbitration_principle-error"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Arbitration Interest</label>
                    <input type="text" class="form-control " name="arbitration_interest" value="{{$info['arbitration_interest'] ?? ''}}" id="arbitration_interest">
                    <span class="text-danger error arbitration_interest-error"></span>
                  </div>

                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Billing Company</label>
                    <input type="text" class="form-control " name="billing_company" value="{{$info['billing_company'] ?? ''}}" id="billing_company">
                    <span class="text-danger error billing_company-error"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Billing Company Person Name</label>
                    <input type="text" class="form-control " name="billing_company_person_name" value="{{$info['billing_company_person_name'] ?? ''}}" id="billing_company_person_name">
                    <span class="text-danger error billing_company_person_name-error"></span>
                  </div>

                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Billing Company Contact Name</label>
                    <input type="text" class="form-control " name="billing_company_contact_person" value="{{$info['billing_company_contact_person'] ?? ''}}" id="billing_company_contact_person">
                    <span class="text-danger error billing_company_contact_person-error"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Billing Company Phone</label>
                    <input type="text" class="form-control " name="billing_company_phone" value="{{$info['billing_company_phone'] ?? ''}}" id="billing_company_phone">
                    <span class="text-danger error billing_company_phone-error"></span>
                  </div>

                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Billing Company email</label>
                    <input type="text" class="form-control " name="billing_company_email" value="{{$info['billing_company_email'] ?? ''}}" id="billing_company_email">
                    <span class="text-danger error billing_company_email-error"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary update-provoiderInformation" data-url="{{route('data-management.update',$info['id'])}}">SUBMIT</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>