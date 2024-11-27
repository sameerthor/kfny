@extends('layouts.app')
@section('content')
<!-- main container html start -->
<div class="main_container">
  <div class="p-3">
    <div class="col-12 patient_info_heading">
      <h4>Reports</h4>
    </div>
    <div class="bill-data-tab-wrap">
      <div class="bill-data-tab">
        <div class="bill-data-tab-inner">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="false" tabindex="-1">By Defence Firm</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false" tabindex="-1">Case Status</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false" tabindex="-1">Settlement</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="simple-tab-3" data-bs-toggle="tab" href="#simple-tabpanel-3" role="tab" aria-controls="simple-tabpanel-3" aria-selected="false" tabindex="-1">Reg Payments</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="simple-tab-4" data-bs-toggle="tab" href="#simple-tabpanel-4" role="tab" aria-controls="simple-tabpanel-4" aria-selected="false" tabindex="-1">Answer Overdue</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="simple-tab-5" data-bs-toggle="tab" href="#simple-tabpanel-5" role="tab" aria-controls="simple-tabpanel-5" aria-selected="false" tabindex="-1">Notice of Trial Reports</a>
            </li>
          </ul>
          <div class="tab-content" id="tab-content">
            <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
              <div class="basic-detail-form-wrap py-3">
                <div class="row">
                <livewire:reports.defence-firm />
                </div>
              </div>   
            </div>
            <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
              <div class="basic-detail-form-wrap py-3">
                <div class="row">
                <livewire:reports.case-status />
                </div>
              </div>
            </div>
            <div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
              <div class="basic-detail-form-wrap py-3">
                <div class="row">
                <livewire:reports.settlement-report/>

                </div>
              </div>
            </div>
            <div class="tab-pane" id="simple-tabpanel-3" role="tabpanel" aria-labelledby="simple-tab-3">
              <div class="basic-detail-form-wrap py-3">
                <div class="row">
                <livewire:reports.payment/>

                </div>
              </div>
            </div>
            <div class="tab-pane" id="simple-tabpanel-4" role="tabpanel" aria-labelledby="simple-tab-4">
              <div class="basic-detail-form-wrap py-3">
                <div class="row">
                <livewire:reports.answer-due/>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="simple-tabpanel-5" role="tabpanel" aria-labelledby="simple-tab-5">
              <div class="basic-detail-form-wrap py-3">
                <div class="row">
                <livewire:reports.trial-notice/>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>
<!-- main container html end -->
@endsection