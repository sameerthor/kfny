@extends('layouts.app')
@section('content')
<div class="">
  <br>
  <div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
          aria-expanded="true" aria-controls="collapseOne">
          Advance Search
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
        data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <form method="post" id="advanceSearchForm">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label class="mb-1">Index #</label>
                  <input type="text" class="form-control" name="index_no" id="index_no" data-rule-required="true">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="mb-1">Claim #</label>
                  <input type="text" class="form-control" name="claim_number" id="claim_number"
                    data-rule-required="true">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="mb-1">Appeal Docket No.</label>
                  <input type="text" class="form-control" name="appeal_docket" id="appeal_docket"
                    data-rule-required="true">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="mb-1">Patient First Name</label>
                  <input type="text" class="form-control" name="first_name" id="first_name" data-rule-required="true">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="mb-1">Patient Last Name</label>
                  <input type="text" class="form-control" name="last_name" id="last_name" data-rule-required="true">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="mb-1">Insured Name</label>
                  <input type="text" class="form-control" name="insured" id="insured" data-rule-required="true">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="mb-1">Policy #</label>
                  <input type="text" class="form-control" name="policy_number" id="policy_number"
                    data-rule-required="true">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="mb-1">Venue County</label>
                  <select name="venue_county" class="form-control" data-rule-required="true">
                    <option selected disabled>Select</option>
                    @foreach($venueCounty as $p)
                    <option value="{{ $p['id'] }}">{{ $p['venue_name'] ?? '-' }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="mb-1">DOA</label>
                  <input type="date" class="form-control" name="doa" id="doa" data-rule-required="true">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="mb-1">Defense Firm</label>
                  <select name="defense_firm_id" class="form-control" data-rule-required="true">
                    <option selected disabled>Select</option>
                    @foreach($defenceFirmId as $p)
                    <option value="{{ $p['id'] }}">{{ $p['name'] ?? '-' }}</option>

                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="mb-1">Insurance Company</label>
                  <select name="insurance_company_id" class="form-control" data-rule-required="true">
                    <option selected disabled>Select</option>
                    @foreach($insuranceId as $p)
                    <option value="{{ $p['id'] }}">{{ $p['name'] ?? '-' }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="mb-1">Status</label>
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
              <div class="col-md-5">
                <button type="button" id="advance-search" data-url="{{route('ligitation.advance_search')}}"
                  class="btn btn btn-primary">Search</button>
                <button type="button" onclick='document.getElementById("advanceSearchForm").reset();'
                  class="btn btn-light">Reset</button>
              </div>
            </div>
          </form>
          <br>
          <div id="search-table">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="invoic_section list_hr">
    @include('admin.Ligitation.header-tab')
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <!-- Venue County -->
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-basicIntake-tab" data-bs-toggle="pill"
          data-bs-target="#pills-VenueCounty" type="button" role="tab" aria-controls="pills-VenueCounty"
          aria-selected="true">
          Basic Intake
        </button>
      </li>

      <!-- Provider Information -->

      <li class="nav-item " role="presentation">
        <button class="nav-link filling-info-tab" id="pills-ProviderInformation-tab" data-bs-toggle="pill"
          data-bs-target="#pills-fillingInfo" type="button" role="tab" aria-controls="pills-ProviderInformation"
          aria-selected="false">
          Filing Info
        </button>
      </li>



      <!-- Defense Firm -->

      <li class="nav-item" role="presentation">
        <button class="nav-link settlement-info-tab" id="pills-settlement-tab" data-bs-toggle="pill"
          data-bs-target="#pills-settlementInfo" type="button" role="tab" aria-controls="pills-settlement"
          aria-selected="true">
          Settelment Judg't
        </button>
      </li>



    </ul>

    <div class="tab-content" id="pills-tabContent">
      <!-- Venue County start -->

      <div class="tab-pane fade show active" id="pills-VenueCounty" role="tabpanel"
        aria-labelledby="pills-VenueCounty-tab">
        <div class="kfnythemes_table basic-intake-render mt-4">
          <div class="kfnythemes_modal">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"> Basic Intake</h5>
              </div>
              <div class="card-body basicIntake_div">
                @include('admin\Ligitation.\add-basic-intake')
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Venue County end -->

      <!-- Provider Information start -->

      <div class="tab-pane fade" id="pills-fillingInfo" role="tabpanel" aria-labelledby="pills-fillingInfo-tab">
        <div class="filingInfo_div mt-4">
        </div>
      </div>

      <div class="tab-pane fade" id="pills-settlementInfo" role="tabpanel" aria-labelledby="pills-settlementInfo-tab">
        <div class="settlementInfo_div mt-4">
        </div>
      </div>

    </div>
  </div>
</div>
@endsection

@section('javascript')
<script src="{{asset('js/ligitation.js')}}"></script>
@endsection