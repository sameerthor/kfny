<div>
  <style>
    span.select2.select2-container.select2-container--default {
      width: 100% !important;
    }

  
    table thead tr th.sort-asc:after {
      content: "\25b4";
    }

    table thead tr th.sort-desc:after {
      content: "\25be";
    }

    .advance_search_table thead tr th:not(.no-sort){
      cursor: pointer;
    }
  </style>
  <div class="py-3" id="patient-info-form-popup" style="display:<?php if (is_array($searchResults) || !empty($searchResults)) {
                                                                  echo " block";
                                                                } else {
                                                                  echo "none";
                                                                } ?>">
    <div class="card card-body">
      <form class="patient-info-detail-form" wire:submit.prevent="advanceSearch" id="advanceSearchForm">
        <div class=" d-flex">
          <div class="form-group  d-flex col-5">
            <label for="eip-first-name" class="col-5 col-form-label">EIP First Name</label>
            <div class="col-7">
              <input id="eip-first-name" name="eip-first-name" wire:model.defer="Search.patient.first_name" type="text" class="form-control">
            </div>
          </div>
          <div class="form-group  d-flex col-5">
            <label for="eip-last-name" class="col-5 col-form-label">EIP Last Name</label>
            <div class="col-7">
              <input id="eip-last-name" name="eip-last-name" wire:model.defer="Search.patient.last_name" type="text" class="form-control">
            </div>
          </div>

          <div class="form-group  d-flex col-5">
            <label for="eip-dob" class="col-5 col-form-label">DOA</label>
            <div class="col-7">
              <input id="eip-dob" name="eip-dob" type="text" autocomplete="off" class="form-control advance-form-datepicker" wire:model.defer="Search.patient.doa">
            </div>
          </div>

          <div class="form-group  d-flex col-5">
            <label for="eip-insured-name" class="col-5 col-form-label">Insured Name</label>
            <div class="col-7">
              <input id="eip-insured-name" name="eip-insured-name" type="text" class="form-control" wire:model.defer="Search.patient.insured">
            </div>
          </div>
          <div class="form-group  d-flex col-5">
            <label for="eip-claim" class="col-5 col-form-label">Claim No.</label>
            <div class="col-7">
              <input id="eip-claim" name="eip-claim" type="text" wire:model.defer="Search.patient.claim_number" class="form-control">
            </div>
          </div>
          <div class="form-group  d-flex col-5">
            <label for="eip-policy-num" class="col-5 col-form-label">Policy No.</label>
            <div class="col-7">
              <input id="eip-policy-num" name="eip-policy-num" type="text" wire:model.defer="Search.patient.policy_number" class="form-control">
            </div>
          </div>

          <div class="form-group  d-flex col-5">
            <label for="eip-insurance-company" class="col-5 col-form-label">Insurance Company</label>
            <div class="col-7">
              <select id="eip-insurance-company" name="eip-insurance-company" wire:model.defer="Search.patient.insurance_company_id" class=" advance-form-select custom-select ">

                <option>
                </option>
                @foreach($insuranceId as $p)
                <option value="{{ $p['id'] }}">{{$p['name'] ??'-'}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group  d-flex col-5">
            <label for="eip-provider" class="col-5 col-form-label">Povider</label>
            <div class="col-7">
              <select id="eip-provider" name="eip-provider" wire:model.defer="Search.provider_id" class=" advance-form-select custom-select ">

                <option>
                </option>
                @foreach($providers as $p)
                <option value="{{ $p['id'] }}">{{$p['name'] ??'-'}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group  d-flex col-5">
            <label for="eip-carrier_attorney" class="col-5 col-form-label">Carrier Attorney</label>
            <div class="col-7">
              <select id="eip-carrier_attorney" name="eip-carrier_attorney" wire:model.defer="Search.carrier_attorney" class=" advance-form-select custom-select ">

                <option>
                </option>
                @foreach($carrier as $p)
                <option value="{{ $p['id'] }}">{{$p['firm_name'] ??'-'}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group  d-flex col-5">
            <label for="eip-index" class="col-5 col-form-label">Index #</label>
            <div class="col-7">
              <input id="eip-index" name="eip-index" type="text" wire:model.defer="Search.index_number" class="form-control">
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
      @if(isset($searchResults) && count($searchResults)==0)
      <h5 style="margin:auto">No data found.</h5>
      @elseif(!empty($searchResults))
      <div class="row mb-1">
        <div class="col-md-2">
          <button id="export-advance-search" type="button" class="btn btn-dark">Export</button>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table accordion bill-data-table-d advance_search_table">
          <thead>
            <tr>
              <th scope="col" data-key="number" data-type="asc">File # <span></span></th>
              <th scope="col" data-key="number" data-type="asc">Index/AAA <span></span></th>
              <th scope="col">status</th>
              <th scope="col">Patient Name</th>
              <th scope="col" data-key="date" data-type="asc">DOA <span></span></th>
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
                Paid":""}}{{$res['status']=="7"?"Decison - Trial":""}}
              </td>
              <td>{{@$res['patient']['first_name']}} {{@$res['patient']['last_name']}}</td>
              <td>{{@$res['patient']['doa']}}</td>
              <td>{{@$res['patient']['claim_number']}}</td>
              <td>{{@$res['provoiderInformation']['name']}}</td>
              <td>{{@$res['patient']['insuranceCompany']['name']}}</td>
              <td>${{@$res->tableDetails->sum('out_st')}}</td>
              <td><button class="btn btn-dark" wire:click.prevent="ViewCase({{$res['id']}})" type="button" id="view-case-{{$res['id']}}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z" fill="white" />
                  </svg> View</button>
              </td>
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

  function matchStart(params, data) {
        if ($.trim(params.term) === '') {
            return data;
        }
        if (typeof data.text === 'undefined') {
            return null;
        }
        if (data.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
            return data;
        }
        return null;
    }

  $(document).ready(function() {
    window.addEventListener('searchAdvance', event => {
      $("#patient-info-form-popup").slideToggle();
    })

    window.addEventListener('resetAdvance', event => {

      $('#advanceSearchForm')[0].reset();
    })
    $('.advance-form-select').select2({
      placeholder: 'Select an option',
      allowClear: true,
      matcher: function(params, data) {
                    return matchStart(params, data);
                }
    }).on("change", function(e) {
      var mod = $(e.target).attr('wire:model.defer');
      @this.set(mod, e.target.value, true);


    });

    $('.advance-form-datepicker').datetimepicker({
      format: 'n/j/y',
      timepicker: false,
      mask: false,
      validateOnBlur: true,
      lazyInit: true,
      onChangeDateTime: function(dp, $input) {
        var mod = $input.attr('wire:model.defer');
        console.log(mod)
        console.log($input.val())
        @this.set(mod, $input.val(), true);
      }
    });

  });
  document.addEventListener("livewire:load", function(event) {
    Livewire.hook('message.processed', (el, component) => {
      $('.advance-form-select').select2({
        placeholder: 'Select an option',
        matcher: function(params, data) {
                    return matchStart(params, data);
                }
      }).on("change", function(e) {
        var mod = $(e.target).attr('wire:model.defer');
        @this.set(mod, e.target.value, true);


      });

      $('.advance-form-datepicker').datetimepicker({
        format: 'n/j/y',
        timepicker: false,
        mask: false,
        validateOnBlur: true,
        lazyInit: true,
        onChangeDateTime: function(dp, $input) {
          var mod = $input.attr('wire:model.defer');
          console.log(mod)
          console.log($input.val())
          @this.set(mod, $input.val(), true);
        }
      });
    });
  });
  $(document).on("click", "#export-advance-search", function() {
    var id = "<?php echo config('app.search_sheet_id'); ?>";
    var data = [];
    var sheet_data = [];
    $('.advance_search_table tr').each(function() {
      data.push($(this));
    });


    data.forEach(function(item, index) {
      var csv_data = []

      var td = item[0].children
      for (i = 0; i < td.length - 1; i++) {

        csv_data.push(td[i].innerText == "" ? "N/A" : td[i].innerText)
      }
      sheet_data.push(csv_data);

    })

    $.ajax({
      url: "<?php echo route('exportSpread', config('app.search_sheet_id')); ?>",
      method: "POST",
      data: {
        sheet_data: sheet_data
      },
      beforeSend: function() {
        $('.loader').fadeIn(300)
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      success: function(response) {
        window.open("https://docs.google.com/spreadsheets/d/" + id + "/edit#gid=543471152","_blank")

      }
    });
  });

  $(document).ready(function() {

    // sort table data:
    $(document).on("click", ".advance_search_table thead tr th:not(.no-sort)", function() {
      let table = $(this).parents("table");
      let rows = $(this).parents("table").find("tbody tr").toArray().sort(TableComparer($(this).index()));
      let dir = ($(this).hasClass("sort-asc")) ? "desc" : "asc";

      if (dir == "desc") {
        rows = rows.reverse();
      }

      for (let i = 0; i < rows.length; i++) {
        table.append(rows[i]);
      }

      table.find("thead tr th").removeClass("sort-asc").removeClass("sort-desc");
      $(this).removeClass("sort-asc").removeClass("sort-desc").addClass("sort-" + dir);
    });

  });


  // table data comparison:
  function TableComparer(index) {
    return function(a, b) {

      let val_a = TableCellValue(a, index).replace("$", "");
      let val_b = TableCellValue(b, index).replace("$", "");
      let result;

   
      if ($.isNumeric(val_a) && $.isNumeric(val_b)) {
     
  if (parseInt(val_a) < parseInt(val_b)) result= -1;
  if (parseInt(val_a) > parseInt(val_b)) result= 1;
  if (parseInt(val_a) == parseInt(val_b)) result= 0;
   
      }else if (isDate(val_a) && isDate(val_b)) {
        let date_a = new Date(val_a);
        let date_b = new Date(val_b);
        result = date_a - date_b;
      }else{
        result = val_a.toString().localeCompare(val_b);
      }

      return result;
    }
  }


  // get table cell value:
  function TableCellValue(row, index) {
    return $(row).children("td").eq(index).text();
  }


  // date validation:
  function isDate(val) {
    let d = new Date(val);

    return !isNaN(d.valueOf());
  }
</script>
@endpush