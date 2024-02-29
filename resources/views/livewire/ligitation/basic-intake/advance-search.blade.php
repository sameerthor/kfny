<div>
  <div class="py-3" id="patient-info-form-popup"
    style="display:<?php if(is_array($searchResults) || !empty($searchResults)){echo " block";}else{ echo "none" ;} ?>">
    <div class="card card-body">
      <form class="patient-info-detail-form" wire:submit.prevent="advanceSearch" id="advanceSearchForm">
        <div class=" d-flex">
          <div class="form-group  d-flex col-5">
            <label for="eip-first-name" class="col-5 col-form-label">EIP First Name</label>
            <div class="col-7">
              <input id="eip-first-name" name="eip-first-name" wire:model.defer="Search.first_name" type="text"
                class="form-control">
            </div>
          </div>
          <div class="form-group  d-flex col-5">
            <label for="eip-last-name" class="col-5 col-form-label">EIP Last Name</label>
            <div class="col-7">
              <input id="eip-last-name" name="eip-last-name" wire:model.defer="Search.last_name" type="text"
                class="form-control">
            </div>
          </div>
          <div class="form-group  d-flex col-5">
            <label for="eip-street-address" class="col-5 col-form-label">Street Address</label>
            <div class="col-7">
              <input id="eip-street-address" name="eip-street-address" type="text" wire:model.defer="Search.address"
                class="form-control">
            </div>
          </div>
          <div class="form-group  d-flex col-5">
            <label for="eip-city" class="col-5 col-form-label">City</label>
            <div class="col-7">
              <input id="eip-city" name="eip-city" type="text" class="form-control" wire:model.defer="Search.city">
            </div>
          </div>
          <div class="form-group  d-flex col-5">
            <label for="eip-state" class="col-5 col-form-label">State</label>
            <div class="col-7">
              <input id="eip-state" name="eip-state" type="text" class="form-control" wire:model.defer="Search.state">
            </div>
          </div>
          <div class="form-group  d-flex col-5">
            <label for="eip-zip-code" class="col-5 col-form-label">Zip Code</label>
            <div class="col-7">
              <input id="eip-zip-code" name="eip-zip-code" type="text" class="form-control"
                wire:model.defer="Search.zip_code">
            </div>
          </div>
          <div class="form-group  d-flex col-5">
            <label for="eip-dob" class="col-5 col-form-label">DOA</label>
            <div class="col-7">
              <input id="eip-dob" name="eip-dob" type="date" class="form-control" wire:model.defer="Search.doa">
            </div>
          </div>
          <div class="form-group  d-flex col-5">
            <label for="eip-contact-number" class="col-5 col-form-label">Contact Number</label>
            <div class="col-7">
              <input id="eip-contact-number" name="eip-contact-number" type="text" class="form-control"
                wire:model.defer="Search.phone_number">
            </div>
          </div>
          <div class="form-group  d-flex col-5">
            <label for="eip-insured-name" class="col-5 col-form-label">Insured Name</label>
            <div class="col-7">
              <input id="eip-insured-name" name="eip-insured-name" type="text" class="form-control"
                wire:model.defer="Search.insured">
            </div>
          </div>
          <div class="form-group  d-flex col-5">
            <label for="eip-claim" class="col-5 col-form-label">Claim No.</label>
            <div class="col-7">
              <input id="eip-claim" name="eip-claim" type="text" wire:model.defer="Search.claim_number"
                class="form-control">
            </div>
          </div>
          <div class="form-group  d-flex col-5">
            <label for="eip-policy-num" class="col-5 col-form-label">Policy No.</label>
            <div class="col-7">
              <input id="eip-policy-num" name="eip-policy-num" type="text" wire:model.defer="Search.policy_number"
                class="form-control">
            </div>
          </div>
          <div class="form-group  d-flex col-5">
            <label for="eip-select" class="col-5 col-form-label">EIP</label>
            <div class="col-7 other-select-div">
              <select id="eip-select" name="eip-select" wire:model.defer="Search.eip" class="custom-select">
                <option></option>
                <option value="policyholder">Policyholder</option>
                <option value="passenger">Passenger</option>
                <option value="pedestrian">Pedestrian</option>
                <option value="other">Other</option>
              </select>
              <textarea id="textarea" name="other" cols="40" rows="2" class="form-other-txtarea form-control"
                style="display: none;"></textarea>
            </div>
          </div>
          <div class="form-group  d-flex col-5">
            <label for="eip-insurance-company" class="col-5 col-form-label">Insurance Company</label>
            <div class="col-7">
              <select id="eip-insurance-company" name="eip-insurance-company"
                wire:model.defer="Search.insurance_company_id" class="custom-select">

                <option>
                </option>
                @foreach($insuranceId as $p)
                <option value="{{ $p['id'] }}">{{$p['name'] ??'-'}}</option>
                @endforeach
              </select>
            </div>
          </div>

        </div>
        <div class="form-edit-button general-form-edit">
          <div class="form-group row">
            <div class="form-buttons">
              <div class=" d-flex">
                <button class="btn btn-dark" type="submit">Search</button>
                <button type="button" wire:click.prevent="resetForm()" class="btn sky-btn">Reset</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      @if(is_array($searchResults) && empty($searchResults))
      <h5 style="margin:auto">No data found.</h5>
      @elseif(!empty($searchResults))
      <div class="table-responsive">
        <table class="table accordion bill-data-table-d">
          <thead>
            <tr>
              <th scope="col">File #</th>
              <th scope="col">Index/AAA</th>
              <th scope="col">status</th>
              <th scope="col">Patient Name</th>
              <th scope="col">DOA</th>
              <th scope="col">Claim#</th>
              <th scope="col">Provider</th>
              <th scope="col">Ins Co.</th>
              <th scope="col">Total</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($searchResults as $res)
            <tr>
              <td>{{@$res['id']}}</td>
              <td>{{@$res['index_number']}}</td>
              <td>
                {{$res['status']=="1"?"Active":""}}{{$res['status']=="2"?"Appeal":""}}{{$res['status']=="3"?"Archived":""}}{{$res['status']=="4"?"Decison
                - Denied":""}}{{$res['status']=="5"?"Decison - Lost":""}}{{$res['status']=="6"?"Decison -
                Paid":""}}{{$res['status']=="7"?"Decison - Trial":""}}</td>
              <td>{{@$res['patient']['first_name']}} {{@$res['patient']['last_name']}}</td>
              <td>{{@$res['patient']['doa']}}</td>
              <td>{{@$res['patient']['claim_number']}}</td>
              <td>{{@$res['provoiderInformation']['name']}}</td>
              <td>{{@$res['patient']['insuranceCompany']['name']}}</td>
              <td>${{@$res->tableDetails->sum('amount')}}</td>
              <td><button class="btn btn-dark" wire:click.prevent="ViewCase({{$res['id']}})" type="button"
                  id="view-case-{{$res['id']}}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path
                      d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z"
                      fill="white" />
                  </svg> View</button>
              <td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @else
      @endif
    </div>
  </div>
</div>
@push('custom-scripts')
<script>
  $(document).ready(function () {
    window.addEventListener('resetAdvance', event => {

      $('#advanceSearchForm')[0].reset();
    })
  });
</script>
@endpush