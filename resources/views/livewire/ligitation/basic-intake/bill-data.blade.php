<div>
<style>
  
  table thead tr th.sort-asc:after {
      content: "\25b4";
    }

    table thead tr th.sort-desc:after {
      content: "\25be";
    }

    .bill_data_table thead tr th:not(.no-sort){
      cursor: pointer;
    }  
</style>    
    <div classs="bill-data-wrap">
        <div class="col-12 patient_info_heading py-3 d-flex align-items-center justify-content-between">
            <h4 class="m-0">Bill Data</h4>
            <div class="bill-edit-buttons">

                <button type="button" wire:click.prevent="addBill()" @if(empty($basic_intake_id)) disabled @endif id="add-bill" class="btn sky-btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_956_2256)">
                            <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z" fill="#1B1D21" />
                        </g>
                        <defs>
                            <clipPath id="clip0_956_2256">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg> Add</button>

            </div>
        </div>
        <div class="bill-data-table-wrap">
            <div class="bill-data-table-button">
            </div>
            <div class="bill-data-table">
                <div class="table-responsive">
                    @if(!empty($billing_data))
                    <div class="row mb-1">
                        <div class="col-md-2">
                            <button id="export-bill-data" data-file="{{$basic_intake_id}}" type="button" class="btn btn-dark">Export</button>
                        </div>
                    </div>
                    @endif
                    <table class="table accordion bill-data-table-d bill_data_table">
                        <thead>
                            <tr>
                                <th scope="col">DOS From</th>
                                <th scope="col">DOS To</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Partial Pay</th>
                                <th scope="col">Outstanding</th>
                                <th scope="col">POM Date</th>
                                <th scope="col">Verif Req.</th>
                                <th scope="col">Verif Resp.</th>
                                <th scope="col">Denial Date</th>
                                <th scope="col">Denial Reason</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="r1">
                            @if(!empty($billing_data))
                            @foreach($billing_data as $res)
                            <tr>
                                <td>{{$res['dos_from']}}</td>
                                <td>{{$res['dos_to']}}</td>
                                <td>${{ number_format($res['amount'], 2) }}</td>
                                <td>${{ number_format($res['partial_pay'],2)}}</td>
                                <td>${{ number_format($res['out_st'],2)}}</td>
                                <td>{{$res['pom']}}</td>
                                <td>{{$res['ver_req']}}</td>
                                <td>{{$res['ver_resp']}}</td>
                                <td>{{$res['denial_date']}}</td>
                                <td>{{@$res['DenialReason']['title']}}</td>
                                <td><button class="btn btn-dark" wire:click.prevent="editBill({{$res['id']}})" type="button" id="view-bill-{{$res['id']}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z" fill="white" />
                                        </svg> View</button>
                                    <button class="btn sky-btn" id="delete-bill"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z" fill="#1B1D21" />
                                        </svg> Delete</button>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="bill-add-table-popup" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              
            </button>
          </div> -->
                <div class="modal-body">
                    <div class="add-bill-popup-form-wrap">
                        <div class="add-bill-popup-form-inner">
                            <div class="add-bill-popup-form">
                                <form wire:submit.prevent="submitForm" id="billForm">
                                    <div class="form-fields d-flex">
                                        <div class="form-group col-5 d-flex">
                                            <label for="dos_from" class="col-4 col-form-label">DOS From</label>
                                            <div class="col-8">
                                                <input id="dos_from" name="dos_from" wire:model.defer="modalData.dos_from" type="text" autocomplete="off"  class="form-control bill-form-datepicker">
                                            </div>
                                        </div>

                                        <div class="form-group col-5 d-flex">
                                            <label for="ver_resp" class="col-4 col-form-label">Verif Resp.</label>
                                            <div class="col-8">
                                                <input id="ver_resp" name="ver_resp" wire:model.defer="modalData.ver_resp" type="text" autocomplete="off"  class="form-control bill-form-datepicker">
                                            </div>
                                        </div>
                                        <div class="form-group col-5 d-flex">
                                            <label for="dos_to" class="col-4 col-form-label">DOS To</label>
                                            <div class="col-8">
                                                <input id="dos_to" name="dos_to" wire:model.defer="modalData.dos_to" type="text" autocomplete="off"  class="form-control bill-form-datepicker">
                                            </div>
                                        </div>
                                        <div class="form-group col-5 d-flex">
                                            <label for="ver_req" class="col-4 col-form-label">Verif Req.</label>
                                            <div class="col-8">
                                                <input id="ver_req" name="ver_req" wire:model.defer="modalData.ver_req" type="text" autocomplete="off"  class="form-control bill-form-datepicker">
                                            </div>
                                        </div>
                                        <div class="form-group col-5 d-flex">
                                            <label for="amount" class="col-4 col-form-label">Amount</label>
                                            <div class="col-8">
                                                <input id="amount" name="amount" wire:model.defer="modalData.amount" type="number" min="1" step="any" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-5 d-flex">
                                            <label for="pom" class="col-4 col-form-label">POM Date</label>
                                            <div class="col-8">
                                                <input id="pom" name="pom" wire:model.defer="modalData.pom" type="text" autocomplete="off"  class="form-control bill-form-datepicker">
                                            </div>
                                        </div>

                                        <div class="form-group col-5 d-flex">
                                            <label for="partial_pay" class="col-4 col-form-label">Partial Pay</label>
                                            <div class="col-8">
                                                <input id="partial_pay" name="partial_pay" wire:model.defer="modalData.partial_pay" type="number" min="1" step="any" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group col-5 d-flex">
                                            <label for="denial_date" class="col-4 col-form-label">Denial Date</label>
                                            <div class="col-8">
                                                <input id="denial_date" name="denial_date" wire:model.defer="modalData.denial_date" autocomplete="off"  type="text" class="form-control bill-form-datepicker">
                                            </div>
                                        </div>


                                        <div class="form-group col-5 d-flex">
                                            <label for="popup-outstanding" class="col-4 col-form-label">Outstanding</label>
                                            <div class="col-8">
                                                <input id="popup-outstanding" name="popup-outstanding" readonly type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-5 d-flex">
                                            <label for="denial_reason" class="col-4 col-form-label">Denial
                                                Reason</label>
                                            <div class="col-8">
                                                <select id="denial_reason" name="denial_reason" wire:model.defer="modalData.denial_reason" class="custom-select bill-form-select ">
                                                    <option></option>
                                                    @foreach($denial_reasons as $denial_reason)
                                                    <option value="{{$denial_reason['id']}}">{{$denial_reason['title']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-buttons">
                                        <div class=" d-flex">

                                            <button class="btn btn-dark" id="save-bill" type="submit">Save
                                                changes</button>
                                            <button type="button" class="btn sky-btn" data-bs-dismiss="modal">Cancel</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
        window.addEventListener('billSaved', event => {

            $('#bill-add-table-popup').modal("hide");
        })

        window.addEventListener('addbill', event => {
            $("#billForm")[0].reset()
            $('#bill-add-table-popup').modal("show");
        })

        window.addEventListener('editbill', event => {
            $('#bill-add-table-popup').modal("show");
        })

        $(document).on('show.bs.modal', '.modal', function() {
            if ($(".modal-backdrop").length > 1) {
                $(".modal-backdrop").not(':first').remove();
            }
        });
        // Remove all backdrop on close
        $(document).on('hide.bs.modal', '.modal', function() {
            if ($(".modal-backdrop").length > 1) {
                $(".modal-backdrop").remove();
            }
        });

        $(document).on('blur', '#amount,#partial_pay', function() {
            var amount = $("#amount").val() != "" ? $("#amount").val() : 0.00;
            var partial_pay = $("#partial_pay").val() != "" ? $("#partial_pay").val() : 0.00;
            $("#popup-outstanding").val(amount - partial_pay)
        });

    });

    document.addEventListener("livewire:load", function(event) {
        Livewire.hook('message.processed', (el, component) => {

            $('.bill-form-select').select2({
                placeholder: 'Select an option',
                dropdownParent: $("#bill-add-table-popup"),
                matcher: function(params, data) {
                    return matchStart(params, data);
                }
            }).on("change", function(e) {
                var mod = $(e.target).attr('wire:model.defer');
                @this.set(mod, e.target.value, true);


            });

            $('.bill-form-datepicker').datetimepicker({
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

    $(document).on("click", "#export-bill-data", function() {
        var id = "<?php echo config('app.bill_sheet_id'); ?>";
        var file_id=$(this).attr('data-file');
        var data = [];
        var sheet_data = [];
        $('.bill_data_table tr').each(function() {
            data.push($(this));
        });


        data.forEach(function(item, index) {
            var csv_data = []

            var td = item[0].children
            for (i = 0; i < td.length - 1; i++) {

                csv_data.push(td[i].innerText==""?"N/A":td[i].innerText)
            }
            sheet_data.push(csv_data);

        })
        console.log(sheet_data)
        $.ajax({
            url: "<?php echo route('exportSpread', config('app.bill_sheet_id')); ?>",
            method: "POST",
            data: {
                sheet_data: sheet_data,
                file_id:file_id
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
$(document).on("click", ".bill_data_table thead tr th:not(.no-sort)", function() {
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