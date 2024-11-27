<div>
    <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

    <div class="row">
        <div class="d-flex d-flex justify-content-center">
            
            <div class="p-2 bd-highlight">
                <label>Date From <input type="text" wire:model.defer="date_from" class="form-control report-answer-overdue-datepicker"></label>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="p-2 bd-highlight"><button type="button" wire:click="$refresh" class="btn btn-secondary">Search</button></div>
            <div class="p-2 bd-highlight"><button type="button" wire:click="clearData" class="btn btn-secondary">Clear</button></div>
            <div class="p-2 bd-highlight"><button type="button" onclick="exportReportToExcel(this)" @if(count($search_results)==0) disabled @endif class="btn btn-secondary">Excel</button></div>
        </div>
    </div>
    <div class="table-responsive basic-inteke-table py-3">
        <table class="table accordion bill-data-table-d " id="answer_overdue_report_table">
            <thead>
                <tr>
                    <th scope="col">File #</th>
                    <th scope="col">Index #</th>
                    <th scope="col">Claim #</th>
                    <th scope="col">Served Date</th>
                    <th scope="col">Ans. Due By</th>
                    <th scope="col">Ans. Extension</th>
                    <th scope="col">Status</th>
                    <th scope="col">Assignor</th>
                    <th scope="col">Provider</th>
                    <th scope="col">Ins. Co. Name</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($search_results as $res)
                <tr>
                    <td>{{$res['id']}}</td>
                    <td>{{$res['index_number']}}</td>
                    <td>{{@$res['patient']['claim_number']}}</td>
                    <td>{{@$res['filingInfo']['date_served']}}</td>
                    <td>{{@$res['filingInfo']['ans_due_by']}}</td>
                    <td>{{@$res['filingInfo']['ans_ext']}}</td>
                    <td>{{@$res->statusData?->status}}</td>
                    <td>{{$res['patient']['first_name']." ".$res['patient']['last_name']}}</td>
                    <td>{{@$res['provoiderInformation']['name']}}</td>
                    <td>{{@$res['patient']['insuranceCompany']['name']}}</td>
                    <td>@php $amount=$res->tableDetails->sum('out_st');@$total+=$amount;echo $amount; @endphp</td>
                </tr>
                @endforeach
                
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
        $('.report-answer-overdue-select').select2({
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
        $('.report-answer-overdue-datepicker').datetimepicker({
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

            $('.report-answer-overdue-select').select2({
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
        let table = document.getElementById("answer_overdue_report_table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
        TableToExcel.convert(table, { // html code may contain multiple tables so here we are refering to 1st table tag
            name: `answer_overdue_report.xlsx`, // fileName you could use any name
            sheet: {
                name: 'Answer OverDue Report' // sheetName
            }
        });
    }
</script>
@endpush