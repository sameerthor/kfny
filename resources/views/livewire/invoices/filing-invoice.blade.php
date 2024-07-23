<div>
    <style>
        .selected td {
            background: #faf6ff;
        }
    </style>
    <div class="py-3">
        <div class="row">
            <div class="col-md-4">
                <label for="eip-provider">Select Provider Name: </label>
                <select id="eip-provider" name="eip-provider" wire:model.defer="provider_ids" multiple class="invoice-form-select custom-select ">

                    <option>
                    </option>
                    @foreach($providers as $p)
                    <option value="{{ $p['id'] }}">{{$p['name'] ??'-'}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5"></div>
            <div class="col-md-3">
                <button class="btn btn-dark" @if(empty($provider_filings)) disabled @endif wire:click="addAll">Add All</button>
                <button class="btn btn-dark" @if(empty($selected_filing)) disabled @endif wire:click="generate">Generate</button>
            </div>
        </div>
        <div class="table-responsive basic-inteke-table py-3">
            <table class="table accordion bill-data-table-d ">
                <thead>
                    <tr>
                        <th scope="col">File #</th>
                        <th scope="col">Assignor</th>
                        <th scope="col">Claim #</th>
                        <th scope="col">D/O/A</th>
                        <th scope="col">Insurance Co.</th>
                        <th scope="col">Case Total</th>
                        <th scope="col">Filing Fees</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($provider_filings as $k=>$res)
                    @if(empty($res['invoice_id']))
                    <tr style="cursor: pointer;" wire:click="select({{$res['id']}})" class="{{in_array($res['id'],$selected_filing)?'selected':'' }}">
                        <td>{{$res['id']}}</td>
                        <td>{{@$res['patient']['first_name']}} {{@$res['patient']['last_name']}}</td>
                        <td>{{$res['patient']['claim_number']}}</td>
                        <td>{{$res['patient']['doa']}}</td>
                        <td>{{$res['patient']['insuranceCompany']['name']}}</td>
                        <td>${{number_format($res->tableDetails->sum('amount'),2)}}</td>
                        <td>${{$res['is_ligitation']=='2'?"40":""}}{{$res['is_ligitation']=='3'?"0":""}}{{$res['is_ligitation']=='1'?$res['patient']['insuranceCompany']['filing_fees_date_specific']:""}}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($provider_filings as $k=>$res)
                    @if(in_array($res['id'],$selected_filing))
                    @php $c_total=(float)@$c_total+$res->tableDetails->sum('amount');
                    $f_total=(float)@$f_total+($res['is_ligitation']=='2'?40:($res['is_ligitation']=='3'?0:($res['is_ligitation']=='1'?(float)@$res['patient']['insuranceCompany']['filing_fees_date_specific']:0)));@endphp
                    <tr>
                        <td>{{$res['id']}}</td>
                        <td>{{@$res['patient']['first_name']}} {{@$res['patient']['last_name']}}</td>
                        <td>{{$res['provoiderInformation']['name']}}</td>
                        <td>{{$res['patient']['claim_number']}}</td>
                        <td>{{$res['patient']['doa']}}</td>
                        <td>{{$res['patient']['insuranceCompany']['name']}}</td>
                        <td>${{number_format($res->tableDetails->sum('amount'),2)}}</td>
                        <td>${{$res['is_ligitation']=='2'?"40":""}}{{$res['is_ligitation']=='3'?"0":""}}{{$res['is_ligitation']=='1'?$res['patient']['insuranceCompany']['filing_fees_date_specific']:""}}</td>

                    </tr>

                    @endif
                    @endforeach
                    @if(!empty($selected_filing))
                    <tr>
                        <th colspan="5" style="text-align: center;">Total</th>
                        <td>${{number_format($c_total,2)}}</td>
                        <td>${{number_format($f_total,2)}}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
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


        window.addEventListener('filingPaymentTab', event => {
            document.getElementById('simple-tab-1').click()
        })

        document.addEventListener("livewire:load", function(event) {
            $('.invoice-form-select').select2({
                placeholder: 'Select an option',
                matcher: function(params, data) {
                    return matchStart(params, data);
                }
            }).on("change", function(e) {
                var mod = $(e.target).attr('wire:model.defer');

                @this.set(mod, $(e.target).val(), true);

                window.livewire.emit('providerChange', $(e.target).val());

            });
            Livewire.hook('message.processed', (el, component) => {
                $('.invoice-form-select').select2({
                    placeholder: 'Select an option',
                    matcher: function(params, data) {
                        return matchStart(params, data);
                    }
                }).on("change", function(e) {
                    var mod = $(e.target).attr('wire:model.defer');

                    @this.set(mod, $(e.target).val(), true);

                    window.livewire.emit('providerChange', $(e.target).val());

                });

            });
        });
    })
</script>
@endpush