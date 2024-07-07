@extends('layouts.app')
@section('content')
<div class="p-3">
  <div class="col-12 patient_info_heading">
    <h4>Invoices</h4>
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
