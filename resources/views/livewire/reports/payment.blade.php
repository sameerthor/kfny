<div>
    <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

    <div class="row">
        <div class="d-flex d-flex justify-content-around">
            <div class="p-2 bd-highlight" style="width: inherit;">
                <label>Providers</label>
                <select wire:model.defer="provider_id" multiple style="width: 100%;" class="custom-select report-payment-select">
                    <option value=""></option>
                    @foreach($providers as $res)
                    <option value="{{$res->id}}">{{$res->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="p-2 bd-highlight" style="width: inherit;">
                <label>Insurance Companies</label>
                <select wire:model.defer="insurance_company_id" multiple style="width: 100%;" class="custom-select report-defence-firm-select">
                    <option value=""></option>
                    @foreach($insurance_companies as $res)
                    <option value="{{$res->id}}">{{$res->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="p-2 bd-highlight" style="width: inherit;">
                <label>Recieved From <input type="text" wire:model.defer="rec_from" class="form-control report-payment-datepicker"></label>
            </div>
            <div class="p-2 bd-highlight" style="width: inherit;">
                <label>Recieved to <input type="text" wire:model.defer="rec_to" class="form-control report-payment-datepicker"></label>
            </div>
            <div class="p-2 bd-highlight" style="width: inherit;">
                <label>Cheque Number</label>
                <br>
                <input type="text" value="" class="form-control" wire:model.defer="check_no">
            </div>

        </div>
        <div class="d-flex justify-content-center">
            <div class="p-2 bd-highlight"><button type="button" wire:click="$refresh" class="btn btn-secondary">Search</button></div>
            <div class="p-2 bd-highlight"><button type="button" wire:click="clearData" class="btn btn-secondary">Clear</button></div>
            <div class="p-2 bd-highlight"><button type="button" onclick="exportReportToExcel(this)" @if(count($search_results)==0) disabled @endif class="btn btn-secondary">Excel</button></div>
        </div>
    </div>
    <div class="table-responsive basic-inteke-table py-3">
        <table class="table accordion bill-data-table-d " id="payment_report_table">
            <thead>
                <tr>
                    <th scope="col">File #</th>
                    <th scope="col">Cheque #</th>
                    <th scope="col">Cheque Date</th>
                    <th scope="col">Paid Date</th>
                    <th scope="col">Assignor</th>
                    <th scope="col">Ins. Co. Name</th>
                    <th scope="col">Provider</th>
                    <th scope="col">Principle</th>
                    <th scope="col">Interest</th>
                    <th scope="col">Other Cost</th>
                    <th scope="col">AttFees</th>
                    <th scope="col">FilingFee</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($search_results as $res)
                <tr>
                    <td>{{$res['settlement']['basic_intake']['id']}}</td>
                    <td>{{$res['check']}}</td>
                    <td>{{$res['date']}}</td>
                    <td>{{$res['date_received']}}</td>
                    <td>{{$res['settlement']['basic_intake']['patient']['first_name']." ".$res['settlement']['basic_intake']['patient']['last_name']}}</td>
                    <td>{{@$res['settlement']['basic_intake']['patient']['insuranceCompany']['name']}}</td>
                    <td>{{@$res['settlement']['basic_intake']['provoiderInformation']['name']}}</td>
                    <td>{{@$res['principle']}}</td>
                    <td>{{@$res['interest']}}</td>
                    <td>{{@$res['costs']}}</td>
                    <td>{{@$res['attorney_fees']}}</td>
                    <td>{{@$res['filing_fees']}}</td>
                    <td>{{@$res['total']}}</td>
                </tr>
                @endforeach
                @if(count($search_results)>0)
                <tr>
                    <td colspan="7">Total</td>
                    <td>${{array_sum(array_column($search_results->toArray(),'principle'))}}</td>
                    <td>${{array_sum(array_column($search_results->toArray(),'interest'))}}</td>
                    <td>${{array_sum(array_column($search_results->toArray(),'costs'))}}</td>
                    <td>${{array_sum(array_column($search_results->toArray(),'attorney_fees'))}}</td>
                    <td>${{array_sum(array_column($search_results->toArray(),'filing_fees'))}}</td>
                    <td>${{array_sum(array_column($search_results->toArray(),'total'))}}</td>
                </tr>
                @endif
            </tbody>
        </table>
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

    document.addEventListener("livewire:load", function(event) {
        $('.report-payment-select').select2({
            placeholder: 'Select an option',
            allowClear: true,
            matcher: function(params, data) {
                return matchStart(params, data);
            }
        }).on("change", function(e) {
            var vals = $(e.target).map(function(i, el) {
                return $(el).val();
            }).get();

            var mod = $(e.target).attr('wire:model.defer');
            @this.set(mod, vals, true);
        });
        $('.report-payment-datepicker').datetimepicker({
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
        Livewire.hook('message.processed', (el, component) => {
            console.log("test")

            $('.report-payment-select').select2({
                placeholder: 'Select an option',
                allowClear: true,
                matcher: function(params, data) {
                    return matchStart(params, data);
                }
            }).on("change", function(e) {
                var vals = $(e.target).map(function(i, el) {
                    return $(el).val();
                }).get();
                var mod = $(e.target).attr('wire:model.defer');
                @this.set(mod, vals, true);
            });

        });
    });

    function exportReportToExcel() {
        let table = document.getElementById("payment_report_table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
        TableToExcel.convert(table, { // html code may contain multiple tables so here we are refering to 1st table tag
            name: `payment_report.xlsx`, // fileName you could use any name
            sheet: {
                name: 'Payment Report' // sheetName
            }
        });
    }
</script>
@endpush