<div>
    <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

    <div class="row">
        <div class="d-flex d-flex justify-content-around">
            <div class="p-2 bd-highlight" style="width: inherit;">
                <label>Providers</label>
                <select wire:model.defer="provider_id" multiple style="width: 100%;" class="custom-select report-settlement-select">
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
                <select wire:model.defer="status_id" multiple style="width: 100%;" class="custom-select report-settlement-select">
                    <option value=""></option>
                    @foreach($statuses as $res)
                    <option value="{{$res->id}}">{{$res->status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="p-2 bd-highlight" style="width: inherit;">
                <label>Settled From <input type="text" wire:model.defer="sett_from" class="form-control report-settlement-datepicker"></label>
            </div>
            <div class="p-2 bd-highlight" style="width: inherit;">
                <label>Settled to <input type="text" wire:model.defer="sett_to" class="form-control report-settlement-datepicker"></label>
            </div>
            <div class="p-2 bd-highlight" style="width: inherit;">
                <label>Outstanding</label>
                <br>
                <input type="checkbox" value="1" wire:model.defer="is_out" >
            </div>
          
        </div>
        <div class="d-flex justify-content-center">
            <div class="p-2 bd-highlight"><button type="button" wire:click="$refresh" class="btn btn-secondary">Search</button></div>
            <div class="p-2 bd-highlight"><button type="button" wire:click="clearData" class="btn btn-secondary">Clear</button></div>
            <div class="p-2 bd-highlight"><button type="button" onclick="exportReportToExcel(this)" @if(count($search_results)==0) disabled @endif class="btn btn-secondary">Excel</button></div>
        </div>
    </div>
    <div class="table-responsive basic-inteke-table py-3">
        <table class="table accordion bill-data-table-d " id="settlement_report_table">
            <thead>
                <tr>
                    <th scope="col">File #</th>
                    <th scope="col">Provider</th>
                    <th scope="col">Assignor</th>
                    <th scope="col">Ins. Co. Name</th>
                    <th scope="col">Settled</th>
                    <th scope="col">Principle</th>
                    <th scope="col">Interest</th>
                    <th scope="col">AttFees</th>
                    <th scope="col">FilingFee</th>
                    <th scope="col">Otherfee</th>
                    <th scope="col">Outstanding</th>
                </tr>
            </thead>
            <tbody>
                @foreach($search_results as $res)
                <tr>
                    <td>{{$res['id']}}</td>
                    <td>{{@$res['provoiderInformation']['name']}}</td>
                    <td>{{$res['patient']['first_name']." ".$res['patient']['last_name']}}</td>
                    <td>{{@$res['patient']['insuranceCompany']['name']}}</td>
                    <td>{{@$res['settlements']['date']}}</td>
                    <td>$@php $principle= !empty(@$res['settlements']['new_principle'])?@$res['settlements']['new_principle']:@$res['settlements']['principle_amount'];echo (float)$principle;@$total_principle+=$principle; @endphp</td>
                    <td>$@php $interest= @$res['settlements']['interest_amount'];echo (float)$interest;@$total_interest+=$interest; @endphp</td>
                    <td>$@php $attorney_fees= (float)@$res['settlements']['attorney_fees']+(float)@$res['settlements']['additional_attorney_fees'];echo (float)$attorney_fees ;@$total_attorney_fees+=$attorney_fees; @endphp</td>
                    <td>$@php $filling_fees= @$res['settlements']['filling_fees'];echo (float)$filling_fees;@$total_filling_fees+=$filling_fees; @endphp</td>
                    <td>$@php $additional_costs= @$res['settlements']['additional_costs'];echo (float)$additional_costs;@$total_additional_costs+=$additional_costs; @endphp</td>
                    <td>$@php $outstanding= @$res['settlements']['outstanding'];echo (float)$outstanding;@$total_outstanding+=$outstanding; @endphp</td>
                </tr>
                @endforeach
                @if(count($search_results)>0)
                <tr>
                    <td colspan="5" style="text-align: end;">Total</td>
                    <td>${{$total_principle}}</td>
                    <td>${{$total_interest}}</td>
                    <td>${{$total_attorney_fees}}</td>
                    <td>${{$total_filling_fees}}</td>
                    <td>${{$total_additional_costs}}</td>
                    <td>${{$total_outstanding}}</td>
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
        $('.report-settlement-select').select2({
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
        $('.report-settlement-datepicker').datetimepicker({
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

            $('.report-settlement-select').select2({
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
        let table = document.getElementById("settlement_report_table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
        TableToExcel.convert(table, { // html code may contain multiple tables so here we are refering to 1st table tag
            name: `settlement_report.xlsx`, // fileName you could use any name
            sheet: {
                name: 'Settlement Report' // sheetName
            }
        });
    }
</script>
@endpush