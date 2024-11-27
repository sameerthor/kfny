<div class="datamangement_tab header_tab_of_ligitation mb-5">
  <div class="container">
    <div class="row">
      <!-- Search Input -->
      <div class="col-md-3">
        <div class="serch_input">
          <input class="form-control me-2 searchInputReport" placeholder="Search file number.." value="{{$basicIntake['id'] ?? ''}}" type="text" aria-label="" />
        </div>
      </div>

      <!-- Patient Data -->
      <div class="col-md-3">
        <div class="pati_data d-flex">
          <div class="patinet_input" style="margin-right: 10px;">Index/AAA :</div>
          <div class="patinet_output">{{isset($basicIntake)?$basicIntake['index_no']:"N/A"}}</div>
        </div>
        <div class="pati_data d-flex">
          <div class="patinet_input" style="margin-right: 10px;">Status :</div>
          <div class="patinet_output">{{isset($basicIntake)?($basicIntake['status']=="INACTIVE"?"InActive":"Active"):"N/A"}}</div>
        </div>
        <div class="pati_data d-flex">
          <div class="patinet_input" style="margin-right: 10px;">Assignor :</div>
          <div class="patinet_output">{{isset($basicIntake)?$basicIntake['first_name']." ".$basicIntake['last_name']:"N/A"}}</div>
        </div>
        <!-- More patient data here -->
      </div>

      <!-- Additional Data -->
      <div class="col-md-3">
        <div class="pati_data d-flex">
          <div class="patinet_input" style="margin-right: 10px;">Provider :</div>
          <div class="patinet_output">{{isset($basicIntake)?$basicIntake['provoiderInformation']['name']:"N/A"}}</div>
        </div>
        <div class="pati_data d-flex">
          <div class="patinet_input" style="margin-right: 10px;">Insurance Company :</div>
          <div class="patinet_output">{{isset($basicIntake)?$basicIntake['insuranceCompany']['name']:"N/A"}}</div>
        </div>
        <div class="pati_data d-flex">
          <div class="patinet_input" style="margin-right: 10px;">Firm :</div>
          <div class="patinet_output">{{isset($basicIntake)?$basicIntake['defenseFirm']['name']:"N/A"}}</div>
        </div>
        
        <!-- More additional data here -->
      </div>
      <!-- Additional Data -->
      <div class="col-md-3">
        <div class="pati_data d-flex">
          <div class="patinet_input" style="margin-right: 10px;">Total :</div>
          @php
          if(isset($basicIntake))
          $sum = "$ <span id='total_amt'>".($basicIntake->tableDetails->sum('out_st'))."</span>";
          else
          $sum='N/A';
          @endphp
          <div class="patinet_output">{!! $sum !!}</div>
        </div>
        
        
        <!-- More additional data here -->
      </div>  
      <!-- More columns (if needed) -->
    </div>
  </div>
</div>
