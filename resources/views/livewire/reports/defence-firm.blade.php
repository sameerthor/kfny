<div>
    <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

    <div class="row">
        <div class="d-flex d-flex justify-content-around">
            <div class="p-2 bd-highlight" style="width: inherit;">
                <label>Defence Firms</label>
                <select wire:model.defer="defence_firm_id" multiple style="width: 100%;" class="custom-select report-defence-firm-select">
                    <option value=""></option>
                    @foreach($defence_firms as $res)
                    <option value="{{$res->id}}">{{$res->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="p-2 bd-highlight" style="width: inherit;">
                <label>Providers</label>
                <select wire:model.defer="provider_id" multiple style="width: 100%;" class="custom-select report-defence-firm-select">
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
                <select wire:model.defer="status_id" multiple style="width: 100%;" class="custom-select report-defence-firm-select">
                    <option value=""></option>
                    @foreach($statuses as $res)
                    <option value="{{$res->id}}">{{$res->status}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="p-2 bd-highlight"><button type="button" wire:click="$refresh"  class="btn btn-secondary">Search</button></div>
            <div class="p-2 bd-highlight"><button type="button" wire:click="clearData" class="btn btn-secondary">Clear</button></div>
            <div class="p-2 bd-highlight"><button type="button" onclick="exportReportToExcel(this)" @if(count($search_results)==0) disabled @endif class="btn btn-secondary">Excel</button></div>
        </div>
    </div>
    <div class="table-responsive basic-inteke-table py-3">
        <table class="table accordion bill-data-table-d " id="defence_firm_report_table">
            <thead>
                <tr>
                    <th scope="col">File #</th>
                    <th scope="col">Assignor</th>
                    <th scope="col">Status</th>
                    <th scope="col">Provider</th>
                    <th scope="col">Defence Firm</th>
                    <th scope="col">Ins. Co. Name</th>
                    <th scope="col">Claim #</th>
                    <th scope="col">Index #</th>
                    <th scope="col">DOA</th>
                    <th scope="col">S&C</th>
                </tr>
            </thead>
            <tbody>
                @foreach($search_results as $res)
                <tr>
                    <td>{{$res['id']}}</td>
                    <td>{{$res['patient']['first_name']." ".$res['patient']['last_name']}}</td>
                    <td>{{@$res->statusData?->status}}</td>
                    <td>{{@$res['provoiderInformation']['name']}}</td>
                    <td>{{@$res['defenseFirm']['firm_name']}}</td>
                    <td>{{@$res['patient']['insuranceCompany']['name']}}</td>
                    <td>{{@$res['patient']['claim_number']}}</td>
                    <td>{{$res['index_number']}}</td>
                    <td>{{$res['patient']['doa']}}</td>
                    <td>@php $amount=$res->tableDetails->sum('out_st');@$total+=$amount;echo $amount; @endphp</td>
                </tr>
                @endforeach
                @if(count($search_results)>0)
                <tr>
                    <td colspan="9" style="text-align: end;">Total S&C</td>
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
        $('.report-defence-firm-select').select2({
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
        Livewire.hook('message.processed', (el, component) => {
            console.log("test")

            $('.report-defence-firm-select').select2({
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
        let table = document.getElementById("defence_firm_report_table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
        TableToExcel.convert(table, { // html code may contain multiple tables so here we are refering to 1st table tag
            name: `defence_firm_report.xlsx`, // fileName you could use any name
            sheet: {
                name: 'Defence Firm Report' // sheetName
            }
        });
    }
</script>
@endpush