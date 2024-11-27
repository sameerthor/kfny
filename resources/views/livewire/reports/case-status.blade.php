<div>
    <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

    <div class="row">
        <div class="d-flex d-flex justify-content-around">
            <div class="p-2 bd-highlight" style="width: inherit;">
                <label>Providers</label>
                <select wire:model.defer="provider_id" multiple style="width: 100%;" class="custom-select report-case-status-select">
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
                <label>Case Statuses</label>
                <select wire:model.defer="status_id" multiple style="width: 100%;" class="custom-select report-case-status-select">
                    <option value=""></option>
                    @foreach($statuses as $res)
                    <option value="{{$res->id}}">{{$res->status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="p-2 bd-highlight" style="width: inherit;">
                <label>Answ. From <input type="text" wire:model.defer="answ_from" class="form-control report-case-status-datepicker"></label>
                <label>Answ. to <input type="text" wire:model.defer="answ_to" class="form-control report-case-status-datepicker"></label>
            </div>
            <div class="p-2 bd-highlight" style="width: inherit;">
                <label>Filing From <input type="text" wire:model.defer="filing_from" class="form-control report-case-status-datepicker"></label>
                <label>Filing to <input type="text" wire:model.defer="filing_to" class="form-control report-case-status-datepicker"></label>
            </div>
            <div class="p-2 bd-highlight" style="width: inherit;">
                <label>Serv. From <input type="text" wire:model.defer="serv_from" class="form-control report-case-status-datepicker"></label>
                <label>Serv. to <input type="text" wire:model.defer="status_id" class="form-control report-case-status-datepicker"></label>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="p-2 bd-highlight"><button type="button" wire:click="$refresh" class="btn btn-secondary">Search</button></div>
            <div class="p-2 bd-highlight"><button type="button" wire:click="clearData" class="btn btn-secondary">Clear</button></div>
            <div class="p-2 bd-highlight"><button type="button" onclick="exportReportToExcel(this)" @if(count($search_results)==0) disabled @endif class="btn btn-secondary">Excel</button></div>
        </div>
    </div>
    <div class="table-responsive basic-inteke-table py-3">
        <table class="table accordion bill-data-table-d " id="case_status_report_table">
            <thead>
                <tr>
                    <th scope="col">File #</th>
                    <th scope="col">SJ</th>
                    <th scope="col">NOT</th>
                    <th scope="col">D. Demands</th>
                    <th scope="col">P. Demands</th>
                    <th scope="col">P. Resp.</th>
                    <th scope="col">D. Resp.</th>
                    <th scope="col">Assignor</th>
                    <th scope="col">Status</th>
                    <th scope="col">Provider</th>
                    <th scope="col">Defence Firm</th>
                    <th scope="col">Ins. Co. Name</th>
                    <th scope="col">Answer Rec.</th>
                    <th scope="col">Filing SC</th>
                    <th scope="col">Served Date</th>
                    <th scope="col">Index #</th>
                    <th scope="col">S&C</th>
                </tr>
            </thead>
            <tbody>
                @foreach($search_results as $res)
                @php
                $sj_dates=[];
                $sj_dates=$res->motions->pluck('return_date')->toArray();
                $res->motions->each(function($item) use(&$sj_dates) {
                $sj_dates=array_merge($sj_dates,$item->adjourneds->pluck('adj_date')->toArray());
                });
                $sj_dates=array_filter($sj_dates);
                array_multisort(array_map('strtotime', $sj_dates), $sj_dates);
                @endphp
                <tr>
                    <td>{{$res['id']}}</td>
                    <td>{{count($sj_dates)>0?$sj_dates[array_key_last($sj_dates)]:''}}</td>
                    <td>{{$res->trial?->not_filed}}</td>
                    <td>{{$res->discovery?->d_demands}}</td>
                    <td>{{$res->discovery?->p_demands}}</td>
                    <td>{{$res->discovery?->p_resp}}</td>
                    <td>{{$res->discovery?->d_resp}}</td>
                    <td>{{$res['patient']['first_name']." ".$res['patient']['last_name']}}</td>
                    <td>{{@$res->statusData?->status}}</td>
                    <td>{{@$res['provoiderInformation']['name']}}</td>
                    <td>{{@$res['defenseFirm']['firm_name']}}</td>
                    <td>{{@$res['patient']['insuranceCompany']['name']}}</td>
                    <td>{{@$res['filingInfo']['ans_rec']}}</td>
                    <td>{{@$res['filingInfo']['filing_date']}}</td>
                    <td>{{@$res['filingInfo']['date_served']}}</td>
                    <td>{{$res['index_number']}}</td>
                    <td>@php $amount=$res->tableDetails->sum('out_st');@$total+=$amount;echo $amount; @endphp</td>
                </tr>
                @endforeach
                @if(count($search_results)>0)
                <tr>
                    <td colspan="16" style="text-align: end;">Total S&C</td>
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
        $('.report-case-status-select').select2({
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
        $('.report-case-status-datepicker').datetimepicker({
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

            $('.report-case-status-select').select2({
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
        let table = document.getElementById("case_status_report_table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
        TableToExcel.convert(table, { // html code may contain multiple tables so here we are refering to 1st table tag
            name: `case_status_report.xlsx`, // fileName you could use any name
            sheet: {
                name: 'Case Status Report' // sheetName
            }
        });
    }
</script>
@endpush