<style>
  .r-bdr {
    border-right: 2px solid #d6d6d6 !important;
  }
</style>
<form id="basicIntakeForm" action="{{ route('ligitation.create') }}" method="POST">
  @csrf
  @method('post')
  <div class="examAlertMsg"></div>
  <!-- Rest of your form content -->
  <div class="examAlertMsg"></div>
  <div class="row">
    <div class="col-md-6 r-bdr">
      <div class="row">
        <div class="col-lg-6 col-md-4">
          <div class="form-group">
            <label class="mb-1">First Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="first_name" id="first_name" data-rule-required="true">
            <span class="text-danger error first_name-error"></span>
          </div>
        </div>
        <div class="col-lg-6 col-md-4">
          <div class="form-group">
            <label class="mb-1">Last Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="last_name" id="last_name" data-rule-required="true">
            <span class="text-danger error last_name-error"></span>
          </div>
        </div>
        <div class="col-lg-6 col-md-4">
          <div class="form-group">
            <label class="mb-1">DOA<span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="doa" id="doa" data-rule-required="true">
            <span class="text-danger error doa-error"></span>
          </div>
        </div>

        <div class="col-lg-6 col-md-4">
          <div class="form-group">
            <label class="mb-1">DPO<span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="dpo" id="dpo" data-rule-required="true">
            <span class="text-danger error dpo-error"></span>
          </div>
        </div>
        <div class="col-lg-6 col-md-4">
          <div class="form-group">
            <label class="mb-1">Claim Number<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="claim_number" id="claim_number" data-rule-required="true">
            <span class="text-danger error claim_number-error"></span>
          </div>
        </div>
        <div class="col-lg-6 col-md-4">
          <div class="form-group">
            <label class="mb-1">Policy Number<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="policy_number" id="policy_number" data-rule-required="true">
            <span class="text-danger error policy_number-error"></span>
          </div>
        </div>
        <div class="col-lg-6 col-md-4">
          <div class="form-group">
            <label class="mb-1">Phone Number<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" data-rule-required="true">
            <span class="text-danger error phone_number-error"></span>
          </div>
        </div>

        <div class="col-lg-6 col-md-4">
          <div class="form-group">
            <label class="mb-1">Fax Number<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="fax_number" id="fax_number" data-rule-required="true">
            <span class="text-danger error fax_number-error"></span>
          </div>
        </div>

        <div class="col-lg-6 col-md-4">
          <div class="form-group">
            <label class="mb-1">Best Contact Person<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="best_contact_person" id="best_contact_person"
              data-rule-required="true">
            <span class="text-danger error best_contact_person-error"></span>
          </div>
        </div>

        <div class="col-lg-6 col-md-4">
          <div class="form-group">
            <label class="mb-1">Known Email<span class="text-danger">*</span></label>
            <input type="email" class="form-control" name="known_email" id="known_email" data-rule-required="true">
            <span class="text-danger error known_email-error"></span>
          </div>
        </div>

        <div class="col-lg-6 col-md-4">
          <div class="form-group">
            <label class="mb-1">Address<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="address" id="address" data-rule-required="true">
            <span class="text-danger error address-error"></span>
          </div>
        </div>
        <div class="col-lg-6 col-md-4">
          <div class="form-group">
            <label class="mb-1">City<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="city" id="city" data-rule-required="true">
            <span class="text-danger error city-error"></span>
          </div>
        </div>
        <div class="col-lg-6 col-md-4">
          <div class="form-group">
            <label class="mb-1">State<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="state" id="state" data-rule-required="true">
            <span class="text-danger error state-error"></span>
          </div>
        </div>

        <div class="col-lg-6 col-md-4">
          <div class="form-group">
            <label class="mb-1">Zip Code<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="zip_code" id="zip_code" data-rule-required="true">
            <span class="text-danger error zip_code-error"></span>
          </div>
        </div>
        <div class="col-lg-6 col-md-4">
          <div class="form-group">
            <label class="mb-1">Self Insh</label>
            <br>
            <input type="checkbox" class="form-check-input" name="self_insh" id="self_insh">
            <span class="text-danger error self_insh-error"></span>
          </div>
        </div>
        <div class="col-lg-6 col-md-4">
          <div class="form-group">
            <label class="mb-1">Insured<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="insured" id="insured" data-rule-required="true">
            <span class="text-danger error insured-error"></span>
          </div>
        </div>
        <div class="col-lg-6 col-md-4">
          <div class="form-group">
            <label class="mb-1">Insurance Company<span class="text-danger">*</span></label>
            <select name="insurance_company_id" class="form-control" data-rule-required="true">
              <option selected disabled>Select</option>
              @foreach($insuranceId as $p)
              <option value="{{ $p['id'] }}">{{ $p['name'] ?? '-' }}</option>
              @endforeach
            </select>
            <span class="text-danger error insurance_company_id-error"></span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row">

        <div class="col-lg-12 col-md-4">
          <div class="form-group">
            <label class="mb-1">Provider<span class="text-danger">*</span></label>
            <select name="provider_id" class="form-control" data-rule-required="true">

              <option selected disabled>Select</option>
              @foreach($provoiderId as $p)
              <option value="{{ $p['id'] }}">{{ $p['name'] ?? '-' }}</option>

              @endforeach
            </select>
            <span class="text-danger error provider_id-error"></span>
          </div>
        </div>
        <div class="col-lg-12 col-md-4">
          <div class="form-group">
            <label class="mb-1">Carrier Attorney<span class="text-danger">*</span></label>
            <select name="defense_firm_id" class="form-control" data-rule-required="true">
              <option selected disabled>Select</option>
              @foreach($defenceFirmId as $p)
              <option value="{{ $p['id'] }}">{{ $p['name'] ?? '-' }}</option>

              @endforeach
            </select>
            <span class="text-danger error defense_firm_id-error"></span>
          </div>
        </div>
        <div class="col-lg-12 col-md-4">
          <div class="form-group">
            <label class="mb-1">Venue County<span class="text-danger">*</span></label>
            <select name="venue_county" class="form-control" data-rule-required="true">
              <option selected disabled>Select</option>
              @foreach($venueCounty as $p)
              <option value="{{ $p['id'] }}">{{ $p['venue_name'] ?? '-' }}</option>
              @endforeach
            </select>
            <span class="text-danger error venue_county-error"></span>
          </div>
        </div>
        <div class="col-lg-12 col-md-4">
          <div class="form-group">
            <label class="mb-1">Ligitation/Arbitrator<span class="text-danger">*</span></label>
            <select name="is_ligitation" class="form-control" data-rule-required="true">
              <option value="1">Ligitation</option>
              <option value="2">Arbitrator</option>
            </select>
            <span class="text-danger error is_ligitation-error"></span>
          </div>
        </div>
        <div class="col-lg-12 col-md-4">
          <div class="form-group">
            <label class="mb-1">Index Number<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="index_no" id="index_no" data-rule-required="true">
            <span class="text-danger error index_no-error"></span>
          </div>
        </div>
        <div class="col-lg-12 col-md-4">
          <div class="form-group">
            <label class="mb-1">AAA number<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="aaa_number" id="aaa_number" data-rule-required="true">
            <span class="text-danger error aaa_number-error"></span>
          </div>
        </div>
        <div class="col-lg-12 col-md-4">
          <div class="form-group">
            <label class="mb-1">Appeal Docket #<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="appeal_docket" id="appeal_docket" data-rule-required="true">
            <span class="text-danger error appeal_docket-error"></span>
          </div>
        </div>
        <div class="col-lg-12 col-md-4">
          <div class="form-group">
            <label class="mb-1">Carrier's Attorney<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="carrier_attorney" id="carrier_attorney" data-rule-required="true">
            <span class="text-danger error carrier_attorney-error"></span>
          </div>
        </div>
        <div class="col-lg-12 col-md-4">
          <div class="form-group">
            <label class="mb-1">Status<span class="text-danger">*</span></label>
            <select name="status" class="form-control" data-rule-required="true">
              <option selected disabled>Select</option>
              <option value="1">Active</option>
              <option value="2">Appeal</option>
              <option value="3">Archived</option>
              <option value="4">Decison - Denied</option>
              <option value="5">Decison - Lost</option>
              <option value="6">Decison - Paid</option>
              <option value="7">Decison - Trial</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="m-3">
    <table id="add_table" class="table" data-toggle="table" data-mobile-responsive="true">
      <thead>
        <tr>
          <th>DOS From</th>
          <th>DOS To</th>
          <th>Amount</th>
          <th>Partial Pay</th>
          <th>Outst</th>
          <th>POM</th>
          <th>Ver. Req</th>
          <th>Ver. Resp</th>
          <th>Denial Date</th>
          <th>Denial Reason</th>
          <th>
            <button type="button" class="btn btn-outline-success" id="add_amount_row" class="add">+
            </button>
          </th>
        </tr>
      </thead>
      <tbody id="amountTable">
        <tr>
          <td>
            <input type="date" name="basic_intake_details[dos_from][]" class="form-control">
          </td>
          <td>
            <input type="date" name="basic_intake_details[dos_to][]" class="form-control">
          </td>
          <td>
            <input type="text" name="basic_intake_details[amount][]" class="form-control">
          </td>
          <td>
            <input type="text" name="basic_intake_details[partial_pay][]" class="form-control">
          </td>
          <td>
            <input type="text" name="basic_intake_details[out_st][]" class="form-control">
          </td>
          <td>
            <input type="text" name="basic_intake_details[pom][]" class="form-control">
          </td>
          <td>
            <input type="text" name="basic_intake_details[ver_req][]" class="form-control">
          </td>
          <td>
            <input type="text" name="basic_intake_details[ver_resp][]" class="form-control">
          </td>
          <td>
            <input type="date" name="basic_intake_details[denial_date][]" class="form-control">
          </td>
          <td>
            <textarea name="basic_intake_details[denial_reason][]" class="form-control"></textarea>
          </td>
          <td>
            <button class="btn btn-outline-danger delete_amount_row">Remove</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col-lg-12 col-md-6">
      <div class="form-group">
        <label class="mb-1">Attorney Notes<span class="text-danger">*</span></label>
        <textarea class="form-control" name="attorney_notes" id="attorney_notes" data-rule-required="true"></textarea>
        <span class="text-danger error attorney_notes-error"></span>
      </div>
    </div>
    <div class="col-lg-12 col-md-6">
      <div class="form-group">
        <label class="mb-1">Notes<span class="text-danger">*</span></label>
        <textarea class="form-control" name="notes" id="notes" data-rule-required="true"></textarea>
        <span class="text-danger error notes-error"></span>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-primary save-form" data-url="{{ route('ligitation.store') }}">Save</button>
  </div>
</form>