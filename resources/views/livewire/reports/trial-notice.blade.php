<div>
    <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

    <div class="row">
        <div class="d-flex d-flex justify-content-around">
            <div class="p-2 bd-highlight" style="width: inherit;">
                <label>Providers</label>
                <select wire:model.defer="provider_id" multiple style="width: 100%;" class="custom-select report-trial-notice-select">
                    <option value=""></option>
                    @foreach($providers as $res)
                    <option value="{{$res->id}}">{{$res->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="p-2 bd-highlight" style="width: inherit;">
                <label>Insurance Companies</label>
                <select wire:model.defer="insurance_company_id" multiple style="width: 100%;" class="custom-select report-trial-notice-select">
                    <option value=""></option>
                    @foreach($insurance_companies as $res)
                    <option value="{{$res->id}}">{{$res->name}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="p-2 bd-highlight" style="width: inherit;">
                <label>NOT Filed From <input type="text" wire:model.defer="not_from" class="form-control report-trial-notice-datepicker"></label>
                <label>NOT Filed to <input type="text" wire:model.defer="not_to" class="form-control report-trial-notice-datepicker"></label>
            </div>
            
        </div>
        <div class="d-flex justify-content-center">
            <div class="p-2 bd-highlight"><button type="button" wire:click="$refresh" class="btn btn-secondary">Search</button></div>
            <div class="p-2 bd-highlight"><button type="button" wire:click="clearData" class="btn btn-secondary">Clear</button></div>
            <div class="p-2 bd-highlight"><button type="button" onclick="exportReportToExcel(this)" @if(count($search_results)==0) disabled @endif class="btn btn-secondary">Excel</button></div>
        </div>
    </div>
    <div class="table-responsive basic-inteke-table py-3">
        <table class="table accordion bill-data-table-d " id="trial_notice_report_table">
            <thead>
                <tr>
                    <th scope="col">File #</th>
                    <th scope="col">NOT Filed</th>
                    <th scope="col">NOT Adj</th>
                    <th scope="col">Provider</th>
                    <th scope="col">Carrier Attny</th>
                    <th scope="col">Ins. Co. Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($search_results as $res)
                @php
                $not_adj_dates=[];
                if(!empty($res->trial))
                {
                $not_adj_dates=$res->trial->trialDates->pluck('trial_date')->toArray();
                $not_adj_dates=array_filter($not_adj_dates);
                array_multisort(array_map('strtotime', $not_adj_dates), $not_adj_dates);
                }
                @endphp
                <tr>
                    <td>{{$res['id']}}</td>
                    <td>{{$res->trial?->not_filed}}</td>
                    <td>{{count($not_adj_dates)>0?$not_adj_dates[array_key_last($not_adj_dates)]:''}}</td>
                    <td>{{@$res['provoiderInformation']['name']}}</td>
                    <td>{{@$res['defenseFirm']['firm_name']}}</td>
                    <td>{{@$res['patient']['insuranceCompany']['name']}}</td>
                    <td>{{@$res->statusData?->status}}</td>
                    <td>@php $amount=$res->tableDetails->sum('out_st');@$total+=$amount;echo $amount; @endphp</td>
                </tr>
                @endforeach
                @if(count($search_results)>0)
                <tr>
                    <td colspan="7" style="text-align: end;">Total S&C</td>
                    <td>${{$total}}</td>
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
        $('.report-trial-notice-select').select2({
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
        $('.report-trial-notice-datepicker').datetimepicker({
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

            $('.report-trial-notice-select').select2({
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
        let table = document.getElementById("trial_notice_report_table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
        TableToExcel.convert(table, { // html code may contain multiple tables so here we are refering to 1st table tag
            name: `trial_notice_report.xlsx`, // fileName you could use any name
            sheet: {
                name: 'Trial Notice Report' // sheetName
            }
        });
    }
</script>
@endpush