<div>
    <style>
        .selected td {
            background: #faf6ff;
        }
    </style>
    <div class="py-3">
        <div class="row">
            <div class="col-md-4">
                <label >Select Provider Name: </label>
                <select  wire:model.defer="provider_ids" multiple class="provider-form-select custom-select ">

                    <option>
                    </option>
                    @foreach($providers as $p)
                    <option value="{{ $p['id'] }}">{{$p['name'] ??'-'}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5"></div>
            <div class="col-md-3">
                <button class="btn btn-dark" @if(empty($provider_settlements)) disabled @endif wire:click="addAll">Add All</button>
                <button class="btn btn-dark" @if(empty($selected_settlements)) disabled @endif wire:click="generate">Generate</button>
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
                        <th scope="col">Principle Amount</th>
                        <th scope="col">Interest Amount</th>
                        <th scope="col">Legal Fees Due</th>
                        <th scope="col">Filing Fees</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($provider_settlements as $k=>$res)
                    @if(empty($res['invoice_id']))
                    <tr style="cursor: pointer;" wire:click="select({{$res['id']}})" class="{{in_array($res['id'],$selected_settlements)?'selected':'' }}">
                        <td>{{$res['basic_intake']['id']}}</td>
                        <td>{{@$res['basic_intake']['patient']['first_name']}} {{@$res['basic_intake']['patient']['last_name']}}</td>
                        <td>{{$res['basic_intake']['patient']['claim_number']}}</td>
                        <td>{{$res['basic_intake']['patient']['doa']}}</td>
                        <td>{{$res['new_total']==1?$res['new_principle']:$res['priciple_amount']}}</td>
                        <td>{{$res['interest_amount']}}</td>
                        <td><?php
                            if ($res['basic_intake']['is_ligitation'] == 1 || $res['basic_intake']['is_ligitation'] == 2) {
                                $principle = $res['new_total'] == 1 ? $res['new_principle'] : $res['priciple_amount'];
                                $interest = $res['interest_amount'];
                                $fee = $res['basic_intake']['is_ligitation'] == 1 ?
                                    ((float)@$principle * (float)@$res['basic_intake']['provoiderInformation']['litigation_principle'] / 100 + (float)@$interest * (float)@$res['basic_intake']['provoiderInformation']['litigation_interest'] / 100)
                                    : ((float)@$principle * (float)@$res['basic_intake']['provoiderInformation']['arbitration_principle'] / 100 + (float)@$interest * (float)@$res['basic_intake']['provoiderInformation']['arbitration_interest'] / 100);
                                echo $fee;    
                            } else {
                                echo 0.0;
                            } ?></td>
                        <td>{{$res['filing_fees']}}</td>
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
                        <th scope="col">Claim #</th>
                        <th scope="col">D/O/A</th>
                        <th scope="col">Principle Amount</th>
                        <th scope="col">Interest Amount</th>
                        <th scope="col">Legal Fees Due</th>
                        <th scope="col">Filing Fees</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($provider_settlements as $k=>$res)
                    @if(in_array($res['id'],$selected_settlements))
                    @php 
                    $p_total=(float)@$p_total+($res['new_total']==1?$res['new_principle']:$res['priciple_amount']);
                    $i_total=(float)@$i_total+$res['interest_amount'];
                    $f_total=(float)@$f_total+$res['filing_fees'];
                    @endphp
                    <tr>
                        <td>{{$res['basic_intake']['id']}}</td>
                        <td>{{@$res['basic_intake']['patient']['first_name']}} {{@$res['basic_intake']['patient']['last_name']}}</td>
                        <td>{{$res['basic_intake']['patient']['claim_number']}}</td>
                        <td>{{$res['basic_intake']['patient']['doa']}}</td>
                        <td>{{$res['new_total']==1?$res['new_principle']:$res['priciple_amount']}}</td>
                        <td>{{$res['interest_amount']}}</td>
                        <td><?php
                            if ($res['basic_intake']['is_ligitation'] == 1 || $res['basic_intake']['is_ligitation'] == 2) {
                                $principle = $res['new_total'] == 1 ? $res['new_principle'] : $res['priciple_amount'];
                                $interest = $res['interest_amount'];
                                $fee = $res['basic_intake']['is_ligitation'] == 1 ?
                                    ((float)@$principle * (float)@$res['basic_intake']['provoiderInformation']['litigation_principle'] / 100 + (float)@$interest * (float)@$res['basic_intake']['provoiderInformation']['litigation_interest'] / 100)
                                    : ((float)@$principle * (float)@$res['basic_intake']['provoiderInformation']['arbitration_principle'] / 100 + (float)@$interest * (float)@$res['basic_intake']['provoiderInformation']['arbitration_interest'] / 100);
                                echo $fee;    
                                $l_total=(float)@$l_total+$fee;
                            } else {
                                echo 0.0;
                            } ?></td>
                        <td>{{$res['filing_fees']}}</td>
                    </tr>

                    @endif
                    @endforeach
                    @if(!empty($selected_settlements))
                    <tr>
                        <th colspan="4" style="text-align: center;">Total</th>
                        <th>${{number_format($p_total,2)}}</th>
                        <th>${{number_format($i_total,2)}}</th>
                        <th>${{number_format(@$l_total,2)}}</th>
                        <th>${{number_format($f_total,2)}}</th>
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


        window.addEventListener('providerPaymentTab', event => {
            document.getElementById('simple-tab-3').click()
        })

        document.addEventListener("livewire:load", function(event) {
            $('.provider-form-select').select2({
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
                $('.provider-form-select').select2({
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