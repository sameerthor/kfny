<div>
    <style>
        .total_table td{
                border: 1px solid black;
                padding: 5px;
        }
    </style>
    <div class="py-3">
        <div class="row">
            <div class="col-md-6">
                <label for="filing_invoice">Invoice: </label>
                <input type="text" id="filing_invoice" wire:model="invoice_id">
                @if(!empty($invoice_data))
                <label>Date Created: {{date('m/d/Y',strtotime($invoice_data->created_at))}}</label>
                @endif
            </div>

            <div class="col-md-3"></div>
            <div class="col-md-3">
                <button class="btn btn-dark" wire:click="print" @if(empty($invoice_data)) disabled @endif>Print</button>
            </div>
        </div>
        <div class="table-responsive basic-inteke-table py-3">
            <table class="table accordion bill-data-table-d ">
                <thead>
                    <tr>
                        <th scope="col">File #</th>
                        <th scope="col">Assignor</th>
                        <th scope="col">Provider</th>
                        <th scope="col">Claim #</th>
                        <th scope="col">D/O/A</th>
                        <th scope="col">Insurance Co.</th>
                        <th scope="col">Case Total</th>
                        <th scope="col">Filing Fees</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($invoice_data))
                    @foreach($invoice_data->invoice_intake as $k=>$res)
                    @php $c_total=(float)@$c_total+$res->tableDetails->sum('amount');
                    $f_total=(float)@$f_total+($res['is_ligitation']=='2'?40:($res['is_ligitation']=='3'?0:($res['is_ligitation']=='1'?$res['patient']['insuranceCompany']['filing_fees_date_specific']:0)));@endphp
                    <tr style="cursor: pointer;">
                        <td>{{$res['id']}}</td>
                        <td>{{@$res['patient']['first_name']}} {{@$res['patient']['last_name']}}</td>
                        <td>{{$res['provoiderInformation']['name']}}</td>
                        <td>{{$res['patient']['claim_number']}}</td>
                        <td>{{$res['patient']['doa']}}</td>
                        <td>{{$res['patient']['insuranceCompany']['name']}}</td>
                        <td>${{number_format($res->tableDetails->sum('amount'),2)}}</td>
                        <td>${{$res['is_ligitation']=='2'?"40":""}}{{$res['is_ligitation']=='3'?"0":""}}{{$res['is_ligitation']=='1'?$res['patient']['insuranceCompany']['filing_fees_date_specific']:""}}</td>
                        <td>
                            <button class="btn sky-btn" onclick="confirm('Are you sure you want to delete this item?') || event.stopImmediatePropagation()" wire:click="deleteInvoiceItem({{$res['id']}})" id="delete-bill"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z" fill="#1B1D21" />
                                </svg> Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        @if(!empty($invoice_data))
        <table border="1" style="float: right;" class="total_table">
            <tr>
                <td>S&C Total</td>
                <td>${{number_format(@$c_total,2)}}</td>
            </tr>
            <tr>
                <td>Filing Total</td>
                <td>${{number_format(@$f_total,2)}}</td>
            </tr>
            <tr>
                <td>Outstanding Total </td>
                <td>${{number_format(max(@$f_total-$invoice_data->invoice_checks->sum('amount'),0),2)}}</td>
            </tr>

        </table>
        @endif
        <br>
        <br>
        <br>
        <div class="table-responsive basic-inteke-table py-3">
            <div class="row">
                <div class="col-md-3">
                    @if(!empty($invoice_data))
                    <button class="btn btn-dark" wire:click="addNewCheck">Add Check</button>
                    @endif
                </div>
            </div>
            <table class="table accordion bill-data-table-d ">
                <thead>
                    <tr>
                        <th scope="col">Check #</th>
                        <th scope="col">Check Date</th>
                        <th scope="col">Date Received</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Issued by</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($invoice_data))
                    @foreach($invoice_data->invoice_checks as $res)
                    
                    <tr style="cursor: pointer;">
                        <td>{{$res['check_number']}}</td>
                        <td>{{$res['check_date']}}</td>
                        <td>{{$res['date_received']}}</td>
                        <td>{{$res['amount']}}</td>
                        <td>{{$res['issued_by']}}</td>
                        <td><button class="btn btn-dark" wire:click.prevent="editCheck({{$res['id']}})" type="button" id="view-check-{{$res['id']}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z" fill="white" />
                                </svg> View</button>
                            <button class="btn sky-btn" onclick="confirm('Are you sure you want to delete this item?') || event.stopImmediatePropagation()" wire:click="deleteCheck({{$res['id']}})" id="delete-bill"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
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
    <div class="modal fade" id="check-popup" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Check</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="add-bill-popup-form-wrap">
                        <div class="add-bill-popup-form-inner">
                            <div class="add-bill-popup-form">
                                <form wire:submit.prevent="submitCheckForm" id="checkForm">
                                    <div class="form-fields row">
                                        <div class="form-group row col-6">
                                            <label for="check_number" class="col-4 col-form-label">Check No.</label>
                                            <div class="col-7">
                                                <input id="check_number" name="check_number" wire:model.defer="checkForm.check_number" type="text" class="form-control" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="amount" class="col-4 col-form-label">Amount</label>
                                            <div class="col-7">
                                                <input id="amount" name="amount" wire:model.defer="checkForm.amount" type="text" class="form-control" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="check_date" class="col-4 col-form-label">Check Date</label>
                                            <div class="col-7">
                                                <input id="check_date" name="check_date" wire:model.defer="checkForm.check_date" type="text" class="form-control check-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="issued_by" class="col-4 col-form-label">Issued by</label>
                                            <div class="col-7">
                                                <input id="issued_by" name="issued_by" wire:model.defer="checkForm.issued_by" type="text" class="form-control" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="date_received" class="col-4 col-form-label">Received Date</label>
                                            <div class="col-7">
                                                <input id="date_received" name="date_received" wire:model.defer="checkForm.date_received" type="text" class="form-control check-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-buttons">
                                        <div class=" d-flex">

                                            <button class="btn btn-dark" type="submit">Save
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
    $(document).ready(function() {
        window.addEventListener('addCheck', event => {
            $("#checkForm")[0].reset()
            $('#check-popup').modal("show");
        })

        window.addEventListener('editCheck', event => {
            $('#check-popup').modal("show");
        })

        window.addEventListener('saveCheck', event => {

            $('#check-popup').modal("hide");
        })

        document.addEventListener("livewire:load", function(event) {
            Livewire.hook('message.processed', (el, component) => {



                $('.check-form-datepicker').datetimepicker({
                    format: 'n/j/y',
                    timepicker: false,
                    mask: false,
                    validateOnBlur: true,
                    lazyInit: true,
                    onChangeDateTime: function(dp, $input) {
                        var mod = $input.attr('wire:model.defer');

                        @this.set(mod, $input.val(), true);
                    }
                });
            });
        });
    });
</script>
@endpush