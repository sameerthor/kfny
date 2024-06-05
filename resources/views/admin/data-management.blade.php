@extends('layouts.app')
@section('content')
<!-- main container  html start -->

<div class="main_container">
  <div class="invoic_section list_hr">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
       <!-- Venue County -->

       <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-CaseStatus-tab" data-bs-toggle="pill" data-bs-target="#pills-CaseStatus" type="button" role="tab" aria-controls="pills-CaseStatus" aria-selected="true">
          Case Status
        </button>
      </li>
      <!-- Venue County -->

      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-VenueCounty-tab" data-bs-toggle="pill" data-bs-target="#pills-VenueCounty" type="button" role="tab" aria-controls="pills-VenueCounty" aria-selected="true">
          Venue County
        </button>
      </li>

      <!-- Provider Information -->

      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-ProviderInformation-tab" data-bs-toggle="pill" data-bs-target="#pills-ProviderInformation" type="button" role="tab" aria-controls="pills-ProviderInformation" aria-selected="false">
          Provider Information
        </button>
      </li>

      <!-- Insurance Company -->

      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-InsuranceCompany-tab" data-bs-toggle="pill" data-bs-target="#pills-InsuranceCompany" type="button" role="tab" aria-controls="pills-InsuranceCompany" aria-selected="false">
          Insurance Company
        </button>
      </li>

      <!-- Carrier Attorney -->

      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-DefenseFirm-tab" data-bs-toggle="pill" data-bs-target="#pills-DefenseFirm" type="button" role="tab" aria-controls="pills-DefenseFirm" aria-selected="true">
          Carrier Attorney
        </button>
      </li>

      <!-- Judge -->

      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-Judge-tab" data-bs-toggle="pill" data-bs-target="#pills-Judge" type="button" role="tab" aria-controls="pills-Judge" aria-selected="false">
          Judge
        </button>
      </li>

      <!-- Arbitrator -->
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-Arbitrator-tab" data-bs-toggle="pill" data-bs-target="#pills-Arbitrator" type="button" role="tab" aria-controls="pills-Arbitrator" aria-selected="false">
          Arbitrator
        </button>
      </li>

      <!--Denial Reason -->
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-denial-reason-tab" data-bs-toggle="pill" data-bs-target="#pills-denial-reason" type="button" role="tab" aria-controls="pills-denial-reason" aria-selected="false">
          Denial Reason
        </button>
      </li>

       <!-- Settled Person -->
       <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-settled-person-tab" data-bs-toggle="pill" data-bs-target="#pills-settled-person" type="button" role="tab" aria-controls="pills-settled-person" aria-selected="false">
        Settled Person
        </button>
      </li>
      
    </ul>

    <div class="tab-content" id="pills-tabContent">
         <!-- Case Status start -->

         <div class="tab-pane fade show active" id="pills-CaseStatus" role="tabpanel" aria-labelledby="pills-CaseStatus-tab">
        <div class="datamangement_tab">
          <div class="kfnythemes_modal">
            <div class="col-md-2">
              <input type="text" class="form-control case-status-search" placeholder="Search Case Status Name Here.." />
            </div>
            <!-- Button trigger modal  html start-->
            <div class="button_one">
              <button class="btn add-case-status-modal" data-url="{{ route('case-status.create') }}" data-bs-toggle="modal" data-bs-target="#ArbitratorModal">
                <i class="bi bi-plus-lg"></i> Add Case status
              </button>
            </div>
            <!-- Button trigger modal  html start-->
          </div>
          <div class="kfnythemes_table mt-4 case-status-table">
            @include('admin.DataManagment.CaseStatus.index')
          </div>
        </div>
      </div>

      <!-- Case Status end -->

      <!-- Venue County start -->

      <div class="tab-pane fade" id="pills-VenueCounty" role="tabpanel" aria-labelledby="pills-VenueCounty-tab">
        <div class="datamangement_tab">
          <div class="kfnythemes_modal">
            <div class="col-md-2">
              <input type="text" class="form-control venue-search" placeholder="Search Venue Name Here.." />
            </div>
            <!-- Button trigger modal  html start-->
            <div class="button_one">
              <button class="btn add-venue-modal" data-url="{{ route('venue.create') }}" data-bs-toggle="modal" data-bs-target="#ArbitratorModal">
                <i class="bi bi-plus-lg"></i> Add County
              </button>
            </div>
            <!-- Button trigger modal  html start-->
          </div>
          <div class="kfnythemes_table mt-4 venue-table">
            @include('admin.DataManagment.Venue.index')
          </div>
        </div>
      </div>

      <!-- Venue County end -->

      <!-- Provider Information start -->

      <div class="tab-pane fade" id="pills-ProviderInformation" role="tabpanel" aria-labelledby="pills-ProviderInformation-tab">
        <div class="kfnythemes_modal">
          <div class="col-md-2">
            <input type="text" class="form-control provider-search" placeholder="Search Provider Name Here.." />
          </div>
          <!-- Button trigger modal  html start-->
          <div class="button_one">
            <button class="btn add-ProviderInformation-modal" data-url="{{ route('data-management.create') }}" data-bs-toggle="modal" data-bs-target="#ArbitratorModal">
              <i class="bi bi-plus-lg"></i> Add Provider Information
            </button>
          </div>
          <!-- Button trigger modal  html start-->



        </div>


        <div class="kfnythemes_table mt-4 ProviderInformation-table">

          @include('admin.DataManagment.ProvoiderInformation.index')
        </div>
      </div>

      <!-- Provider Information end -->

      <!-- Insurance Company start -->

      <div class="tab-pane fade" id="pills-InsuranceCompany" role="tabpanel" aria-labelledby="pills-InsuranceCompany-tab">
        <div class="col-md-2">
          <input type="text" class="form-control insurance-search" placeholder="Search Insurance Company Here.." />
        </div>
        <div class="kfnythemes_modal">
          <!-- Button trigger modal  html start-->
          <div class="button_one">
            <button class="btn add-Insurance-modal" data-url="{{ route('insurance-company.create') }}" data-bs-toggle="modal" data-bs-target="#ArbitratorModal">
              <i class="bi bi-plus-lg"></i> Add Insurance Company
            </button>
          </div>
          <!-- Button trigger modal  html start-->



        </div>


        <div class="kfnythemes_table mt-4 insurance-table">

          @include('admin.DataManagment.InsuranceCompany.index')
        </div>
      </div>

      <!-- Insurance Company end -->

      <!-- Carrier Attorney start -->

      <div class="tab-pane fade" id="pills-DefenseFirm" role="tabpanel" aria-labelledby="pills-DefenseFirm-tab">
        <div class="col-md-2">
          <input type="text" class="form-control firm-search" placeholder="Search Firm Name Here.." />
        </div>
        <div class="kfnythemes_modal">
          <!-- Button trigger modal  html start-->
          <div class="button_one">
            <button class="btn add-defense-firm-modal" data-url="{{ route('defense-firm.create') }}" data-bs-toggle="modal" data-bs-target="#ArbitratorModal">
              <i class="bi bi-plus-lg"></i> Add Carrier Attorney
            </button>
          </div>
          <!-- Button trigger modal  html start-->

        </div>


        <div class="kfnythemes_table mt-4 defence-table">

          @include('admin.DataManagment.DefenseFirm.index')
        </div>
      </div>

      <!-- Carrier Attorney end -->

      <!-- Judge  start -->

      <div class="tab-pane fade" id="pills-Judge" role="tabpanel" aria-labelledby="pills-Judge-tab">
        <div class="kfnythemes_modal">
        <div class="col-md-2">
          <input type="text" class="form-control judge-search" placeholder="Search Judge Name Here.." />
        </div>
          <!-- Button trigger modal  html start-->
          <div class="button_one">
            <button class="btn add-judge-modal" data-url="{{ route('judge.create') }}" data-bs-toggle="modal" data-bs-target="#ArbitratorModal">
              <i class="bi bi-plus-lg"></i> Add Judge
            </button>
          </div>
          <!-- Button trigger modal  html start-->

        </div>


        <div class="kfnythemes_table mt-4 judge-table">

          @include('admin.DataManagment.Judge.index')
        </div>
      </div>

      <!-- Judge Firm end -->

      <!-- Arbitrator  start -->

      <div class="tab-pane fade" id="pills-Arbitrator" role="tabpanel" aria-labelledby="pills-Arbitrator-tab">
        <div class="datamangement_tab">
          <div class="kfnythemes_modal">
          <div class="col-md-2">
          <input type="text" class="form-control arbitrator-search" placeholder="Search Arbitrator Name Here.." />
        </div>
            <!-- Button trigger modal  html start-->
            <div class="button_one">
              <button class="btn add-arbitrator-modal" data-url="{{ route('arbitrator.create') }}" data-bs-toggle="modal" data-bs-target="#ArbitratorModal">
                <i class="bi bi-plus-lg"></i> Add Arbitrator
              </button>
            </div>
            <!-- Button trigger modal  html start-->
          </div>
          <div class="kfnythemes_table mt-4 arbitrator-table">
            @include('admin.DataManagment.Arbitrator.index')
          </div>
        </div>
      </div>

      <!-- Arbitrator Firm end -->

         <!-- Denial Reason  start -->

         <div class="tab-pane fade" id="pills-denial-reason" role="tabpanel" aria-labelledby="pills-denial-reason-tab">
        <div class="datamangement_tab">
          <div class="kfnythemes_modal">
          
            <!-- Button trigger modal  html start-->
            <div class="button_one">
              <button class="btn add-denial-reason-modal" data-url="{{ route('denial_reason.create') }}" data-bs-toggle="modal">
                <i class="bi bi-plus-lg"></i> Add Denial Reason 
              </button>
            </div>
            <!-- Button trigger modal  html start-->
          </div>
          <div class="kfnythemes_table mt-4 denial-reason-table">
            @include('admin.DataManagment.DenialReason.index')
          </div>
        </div>
      </div>

      <!-- Denial Reason end -->
      
         <!-- Settled Person start -->

         <div class="tab-pane fade" id="pills-settled-person" role="tabpanel" aria-labelledby="pills-settled-person-tab">
        <div class="datamangement_tab">
          <div class="kfnythemes_modal">
          
            <!-- Button trigger modal  html start-->
            <div class="button_one">
              <button class="btn add-settled-person-modal" data-url="{{ route('settled_person.create') }}" data-bs-toggle="modal">
                <i class="bi bi-plus-lg"></i> Add Settled Person 
              </button>
            </div>
            <!-- Button trigger modal  html start-->
          </div>
          <div class="kfnythemes_table mt-4 settled-person-table">
            @include('admin.DataManagment.SettledPerson.index')
          </div>
        </div>
      </div>

      <!-- Settled Person end -->
    </div>
  </div>
</div>

@section('javascript')
<!-- main container  html end -->
<script src="{{asset('js/data-management-provoider.js')}}"></script>
<script src="{{asset('js/data-management-insurance.js')}}"></script>
<script src="{{asset('js/data-management-defense.js')}}"></script>
<script src="{{asset('js/judge.js')}}"></script>
<script src="{{asset('js/venue.js')}}"></script>
<script src="{{asset('js/arbitrator.js')}}"></script>
<script src="{{asset('js/denial-reason.js')}}"></script>
<script src="{{asset('js/case-status.js')}}"></script>
<script src="{{asset('js/settled-person.js')}}"></script>
@endsection
@endsection