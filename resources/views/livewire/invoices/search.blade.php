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

        .invoice_search_table thead tr th:not(.no-sort) {
            cursor: pointer;
        }
    </style>
    <div class="py-3" id="invoice-search-form" style="display:none">
        <div class="card card-body">
            <form class="patient-info-detail-form" wire:submit.prevent="invoiceSearch" id="invoiceSearchForm">
                <div class=" d-flex" style="flex-wrap: wrap;justify-content: space-between;">
                    <div class="form-group  d-flex col-5">
                        <label class="col-5 col-form-label">Provider</label>
                        <div class="col-7">
                            <select name="eip-provider" wire:model.defer="Search.provider_id" class=" invoice-search-select custom-select ">

                                <option>
                                </option>
                                @foreach($providers as $p)
                                <option value="{{ $p['id'] }}">{{$p['name'] ??'-'}}</option>
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
                    <div class="form-group  d-flex col-5">
                        <label for="eip-assigner" class="col-5 col-form-label">Assigner</label>
                        <div class="col-7">
                            <input id="eip-assigner" name="eip-assigner" type="text" wire:model.defer="Search.assigner" class="form-control">
                        </div>
                    </div>
                    <div class="form-group  d-flex col-5">
                        <label for="eip-claim" class="col-5 col-form-label">Claim No.</label>
                        <div class="col-7">
                            <input id="eip-claim" name="eip-claim" type="text" wire:model.defer="Search.claim_number" class="form-control">
                        </div>
                    </div>
                    <div class="form-group  d-flex col-5">
                        <label for="eip-check" class="col-5 col-form-label">Check No.</label>
                        <div class="col-7">
                            <input id="eip-check" name="eip-check" type="text" wire:model.defer="Search.check" class="form-control">
                        </div>
                    </div>
                    <div class="form-group  d-flex col-5">
                        <label for="eip-principle" class="col-5 col-form-label">Principle Amount</label>
                        <div class="col-7">
                            <input id="eip-principle" name="eip-principle" type="text" wire:model.defer="Search.principle" class="form-control">
                        </div>
                    </div>
                    <div class="form-group  d-flex col-5">
                        <label for="eip-interest" class="col-5 col-form-label">Interest Amount</label>
                        <div class="col-7">
                            <input id="eip-interest" name="eip-interest" type="text" wire:model.defer="Search.interest" class="form-control">
                        </div>
                    </div>
                    <div class="form-group  d-flex col-5">
                        <div class="row">
                            <label for="eip-date_range_start" class="col-5 col-form-label">Date Range- Start</label>
                            <div class="col-7">
                                <input id="eip-date_range_start" name="eip-date_range_start" type="text" wire:model.defer="Search.date_range_start" class="form-control invoice-search-start-datepicker">
                            </div>
                        </div>
                        <div class="row  mx-2">
                            <label for="eip-date_range_end" class="col-5 col-form-label">Date Range- End</label>
                            <div class="col-7">
                                <input id="eip-date_range_end" name="eip-date_range_end" type="text" wire:model.defer="Search.date_range_end" class="form-control invoice-search-end-datepicker">
                            </div>
                        </div>
                    </div>
                    <div class="form-group  d-flex col-5">
                        <label class="col-5 col-form-label">Search by Unpaid Invoice</label>
                        <div class="col-7">
                            <label for="filing_checkbox">Filing Invoice: <input type="checkbox" id="filing_checkbox" wire:model.defer="Search.filing_invoice" value="1"></label>
                            <br><label for="provider_checkbox">Provider Invoice: <input type="checkbox" id="provider_checkbox" wire:model.defer="Search.provider_invoice" value="1"></label>

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
            <div class="table-responsive">
                <table class="table accordion bill-data-table-d invoice_search_table">
                    <thead>
                        <tr>
                            <th scope="col" data-key="number" data-type="asc">Invoice # <span></span></th>
                            <th scope="col" data-type="asc">Type <span></span></th>
                            <th>Provider</th>
                            <th scope="col" data-key="date" data-type="asc">Date <span></span></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($searchResults as $res)
                        <tr>
                            <td>{{@$res['id']}}</td>
                            <td>{{@$res['type']==1?"Filing":""}}{{@$res['type']==2?"Provider":""}}</td>
                            <td>{{@$res['type']==1?@$res['invoice_intake'][0]['provoiderInformation']['name']:""}}{{@$res['type']==2?@$res['invoice_settlement'][0]['basic_intake']['provoiderInformation']['name']:""}}</td>
                            <td>{{date('F d,Y',strtotime($res['updated_at']))}}</td>
                            <td><button class="btn btn-dark" wire:click.prevent="ViewInvoice({{$res['id']}})" type="button" id="view-invoice-{{$res['id']}}">
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


        window.addEventListener('resetInvoice', event => {

            $('#invoiceSearchForm')[0].reset();
        })
        $('.invoice-search-select').select2({
            placeholder: 'Select an option',
            allowClear: true,
            matcher: function(params, data) {
                return matchStart(params, data);
            }
        }).on("change", function(e) {
            var mod = $(e.target).attr('wire:model.defer');
            @this.set(mod, e.target.value, true);


        });

        $('.invoice-search-datepicker').datetimepicker({
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

        $('.invoice-search-start-datepicker').datetimepicker({
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

            $('.invoice-search-end-datepicker').datetimepicker({
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
            $('.invoice-search-select').select2({
                placeholder: 'Select an option',
                matcher: function(params, data) {
                    return matchStart(params, data);
                }
            }).on("change", function(e) {
                var mod = $(e.target).attr('wire:model.defer');
                @this.set(mod, e.target.value, true);


            });

            $('.invoice-search-start-datepicker').datetimepicker({
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

            $('.invoice-search-end-datepicker').datetimepicker({
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


    $(document).ready(function() {

        // sort table data:
        $(document).on("click", ".invoice_search_table thead tr th:not(.no-sort)", function() {
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

                if (parseInt(val_a) < parseInt(val_b)) result = -1;
                if (parseInt(val_a) > parseInt(val_b)) result = 1;
                if (parseInt(val_a) == parseInt(val_b)) result = 0;

            } else if (isDate(val_a) && isDate(val_b)) {
                let date_a = new Date(val_a);
                let date_b = new Date(val_b);
                result = date_a - date_b;
            } else {
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