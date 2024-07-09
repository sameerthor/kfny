@extends('layouts.app')
@section('content')
<div class="p-3">
  <div class="col-12 patient_info_heading">
    <h4>Invoices <button class="pi_fil_search_button  btn btn-dark col-2 d-inline" id="invoice-search" aria-controls="patient-info-form-popup" fdprocessedid="482vu9"><span class="search_icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
            <path d="M12.5233 11.4626L15.7353 14.6746L14.6746 15.7353L11.4626 12.5233C10.3077 13.4473 8.843 14 7.25 14C3.524 14 0.5 10.976 0.5 7.25C0.5 3.524 3.524 0.5 7.25 0.5C10.976 0.5 14 3.524 14 7.25C14 8.843 13.4473 10.3077 12.5233 11.4626ZM11.0185 10.9061C11.9356 9.96095 12.5 8.6717 12.5 7.25C12.5 4.34938 10.1506 2 7.25 2C4.34938 2 2 4.34938 2 7.25C2 10.1506 4.34938 12.5 7.25 12.5C8.6717 12.5 9.96095 11.9356 10.9061 11.0185L11.0185 10.9061Z" fill="white"></path>
          </svg></span> Invoice Search</button></h4>
    <livewire:invoices.search />


  </div>
  <div class="bill-data-tab-wrap">
    <div class="bill-data-tab">
      <div class="bill-data-tab-inner">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Filing Invoice</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Filing Payment</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false">Provider Invoice</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="simple-tab-3" data-bs-toggle="tab" href="#simple-tabpanel-3" role="tab" aria-controls="simple-tabpanel-3" aria-selected="false">Provider Payment</a>
          </li>
        </ul>
        <div class="tab-content" id="tab-content">
          <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
            <livewire:invoices.filing-invoice />

          </div>
          <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
            <livewire:invoices.filing-payment />
          </div>
          <div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
            <livewire:invoices.provider-invoice />
          </div>
          <div class="tab-pane" id="simple-tabpanel-3" role="tabpanel" aria-labelledby="simple-tab-3">
            <livewire:invoices.provider-payment />
          </div>
        </div>
      </div>


    </div>
  </div>
  <!-- main container htnl end -->
</div>
</div>

<!-- Button trigger modal -->

@endsection
@push('custom-scripts')
<script>
  $(document).on("click", "#invoice-search", function() {
    console.log("test")
    $("#invoice-search-form").slideToggle();
  })
</script>
@endpush