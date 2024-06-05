<div>
    <div>
        <div class="basic-detail-form-wrap py-3">
            <div class="row">
                <div class="basic-detail-general col-12">
                    <form class="patient-info-detail-form" wire:submit.prevent="submitSettlementForm">

                        <div class="row">
                            <h5>Settlement</h5>
                            <div class="form-group row col-4">
                                <label for="date" class="col-4 col-form-label">Date</label>
                                <div class="col-7">
                                    <input id="date" wire:blur="calculate('date')" @if($settlementFormStatus=="readonly" ) readonly @endif name="date" wire:model.defer="settlementForm.date" type="text" class="form-control settlement-form-datepicker" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row col-4">
                                <label for="principle_percent" class="col-4 col-form-label">Principle %</label>
                                <div class="col-7">
                                    <input id="principle_percent" wire:blur="calculate('principle_percent')" @if($settlementFormStatus=="readonly" ) readonly @endif name="principle_percent" wire:model.defer="settlementForm.principle_percent" type="text" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row col-4">
                                <label for="attorney_fees" class="col-4 col-form-label">Attorney's fees</label>
                                <div class="col-7">
                                    <input id="attorney_fees" @if($settlementFormStatus=="readonly" ) readonly @endif name="attorney_fees" wire:model.defer="settlementForm.attorney_fees" type="text" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row col-4">
                                <label for="type" class="col-4 col-form-label">Type</label>
                                <div class="col-7 other-select-div">
                                    <select id="type" name="type" wire:model.defer="settlementForm.type" @if($settlementFormStatus=="readonly" ) disabled @endif class="custom-select settlement-form-select ">
                                        <option></option>
                                        <option>Decision</option>
                                        <option>Settlement</option>
                                        <option>Voluntary Payment</option>
                                        <option>Partial Decision</option>
                                        <option>Partial Settlement</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row col-4 principle_amount_box" style="visibility:{{@$settlementForm['new_total']=='1'?'hidden':'visible'}}">
                                <label for="principle_amount" class="col-4 col-form-label">Principle Amount</label>
                                <div class="col-7">
                                    <input id="principle_amount" wire:blur="calculate('principle_amount')" readonly name="principle_amount" wire:model.defer="settlementForm.principle_amount" type="text" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row col-4">
                                <label for="filing_fees" class="col-4 col-form-label">Filing Fees/Disburs.</label>
                                <div class="col-7">
                                    <input id="filing_fees" @if($settlementFormStatus=="readonly" ) readonly @endif name="filing_fees" wire:model.defer="settlementForm.filing_fees" type="text" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row col-4">
                                <label for="person_settled" class="col-4 col-form-label">Person Settled with</label>
                                <div class="col-7 other-select-div">
                                    <select id="person_settled" name="person_settled" wire:model.defer="settlementForm.person_settled" @if($settlementFormStatus=="readonly" ) disabled @endif class="custom-select settlement-form-select-tag ">
                                        <option>{{in_array(@$settlementForm['person_settled'],$persons->pluck('name')->toArray())?'':@$settlementForm['person_settled']}}</option>
                                        @foreach($persons as $person)
                                        <option>{{$person['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row col-4 new_principle_box" style="visibility:{{@$settlementForm['new_total']=='1'?'visible':'hidden'}}">
                                <label for="new_principle" class="col-4 col-form-label">New Principle</label>
                                <div class="col-7">
                                    <input id="new_principle" wire:blur="calculate('new_principle')" @if($settlementFormStatus=="readonly" ) readonly @endif name="new_principle" wire:model.defer="settlementForm.new_principle" type="text" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row col-4" style="visibility:{{@$settlementForm['type']=='Decision' || @$settlementForm['type']=='Partial Settlement' ?'visible':'hidden'}}">
                                <label for="costs" class="col-4 col-form-label">Costs</label>
                                <div class="col-7">
                                    <input id="costs" @if($settlementFormStatus=="readonly" ) readonly @endif name="costs" wire:model.defer="settlementForm.costs" type="text" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row col-4">
                                <label for="email_fax" class="col-4 col-form-label">Email/Fax #</label>
                                <div class="col-7">
                                    <input id="email_fax" @if($settlementFormStatus=="readonly" ) readonly @endif name="email_fax" wire:model.defer="settlementForm.email_fax" type="text" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row col-4">
                                <label for="interest_percent" class="col-4 col-form-label">Interest %</label>
                                <div class="col-7">
                                    <input id="interest_percent" wire:blur="calculate('interest_percent')" @if($settlementFormStatus=="readonly" ) readonly @endif name="interest_percent" wire:model.defer="settlementForm.interest_percent" type="text" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row col-4">
                            </div>
                            <div class="form-group row col-4">
                                <label for="settlement_phone_number" class="col-4 col-form-label">Phone Number</label>
                                <div class="col-7">
                                    <input id="settlement_phone_number" @if($settlementFormStatus=="readonly" ) readonly @endif name="phone_number" wire:model.defer="settlementForm.phone_number" type="text" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row col-4">
                                <label for="interest_from" class="col-4 col-form-label">Interest From</label>
                                <div class="col-7 other-select-div">
                                    <select id="interest_from" wire:change="calculate('interest_from')" name="interest_from" wire:model.defer="settlementForm.interest_from" @if($settlementFormStatus=="readonly" ) disabled @endif class="custom-select settlement-form-select ">
                                        <option></option>
                                        <option>Date of Filing</option>
                                        <option>Date of Service</option>
                                        <option>30 Days overdue</option>
                                        <option>Other</option>
                                    </select>
                                    <input style="display:{{@$settlementForm['interest_from']=='Other'?'block':'none'}}" wire:blur="calculate('interest_from_date')" id="interest_from_date" @if($settlementFormStatus=="readonly" ) readonly @endif name="interest_from_date" wire:model.defer="settlementForm.interest_from_date" type="text" class="form-control settlement-form-datepicker" autocomplete="off">

                                </div>
                            </div>
                            <div class="form-group row col-4">
                            </div>
                            <div class="form-group row col-4">
                            </div>
                            <div class="form-group row col-4">
                                <label for="interest_amount" class="col-4 col-form-label">Interest Amount</label>
                                <div class="col-7">
                                    <input id="interest_amount" @if($settlementFormStatus=="readonly" ) readonly @endif name="interest_amount" wire:model.defer="settlementForm.interest_amount" type="text" class="form-control" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row col-4">
                            </div>
                            <div class="form-group row col-4">
                                <label for="new_total" class="col-4 col-form-label">New Total</label>
                                <div class="col-7">
                                    <input id="new_total" wire:blur="calculate('total')" @if($settlementFormStatus=="readonly" ) disabled @endif name="new_total" wire:model.defer="settlementForm.new_total" type="checkbox" class="" autocomplete="off">
                                    <span>{{ (@$settlementForm['new_total']=="1"? (int)@$settlementForm['new_principle']: (int)@$settlementForm['principle_amount']) + (int)@$settlementForm['interest_amount'] + (int)@$settlementForm['attorney_fees'] + (int)@$settlementForm['filing_fees'] + (int)@$settlementForm['costs'] }}</span>
                                </div>
                            </div>
                            <div class="form-group row col-4">
                            </div>
                            <div class="form-group row col-4">
                            </div>
                            <div class="form-group row col-4">
                                <label for="judgement_appl" class="col-4 col-form-label">Judgement Appl</label>
                                <div class="col-7">
                                    <input id="judgement_appl" wire:blur="calculate" @if($settlementFormStatus=="readonly" ) readonly @endif name="judgement_appl" wire:model.defer="settlementForm.judgement_appl" type="text" class="form-control settlement-form-datepicker" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row col-4">
                                <label for="additional_interest" class="col-4 col-form-label">Additional Interest</label>
                                <div class="col-7">
                                    <input id="additional_interest" @if($settlementFormStatus=="readonly" ) readonly @endif name="additional_interest" wire:model.defer="settlementForm.additional_interest" type="text" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row col-4">
                            </div>
                            <div class="form-group row col-4">
                                <label for="judgement_date" class="col-4 col-form-label">Judgement Date</label>
                                <div class="col-7">
                                    <input id="judgement_date" @if($settlementFormStatus=="readonly" ) readonly @endif name="judgement_date" wire:model.defer="settlementForm.judgement_date" type="text" class="form-control settlement-form-datepicker" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row col-4">
                                <label for="additional_attorney_fees" class="col-4 col-form-label">Additional Attorney Fees</label>
                                <div class="col-7">
                                    <input id="additional_attorney_fees" @if($settlementFormStatus=="readonly" ) readonly @endif name="additional_attorney_fees" wire:model.defer="settlementForm.additional_attorney_fees" type="text" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row col-4">
                            </div>
                            <div class="form-group row col-4">
                                <label for="noe_judgement" class="col-4 col-form-label">NOE Judgement</label>
                                <div class="col-7">
                                    <input id="noe_judgement" @if($settlementFormStatus=="readonly" ) readonly @endif name="noe_judgement" wire:model.defer="settlementForm.noe_judgement" type="text" class="form-control settlement-form-datepicker" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row col-4" style="visibility:{{@$settlementForm['type']=='Decision' || @$settlementForm['type']=='Partial Settlement' ?'visible':'hidden'}}">
                                <label for="additional_costs" class="col-4 col-form-label">Additional Costs</label>
                                <div class="col-7">
                                    <input id="additional_costs" @if($settlementFormStatus=="readonly" ) readonly @endif name="additional_costs" wire:model.defer="settlementForm.additional_costs" type="text" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row col-4">
                            </div>
                            <div class="form-group row col-4">
                                <label for="sent_to_marshal" class="col-4 col-form-label">Sent to Marshal</label>
                                <div class="col-7">
                                    <input id="sent_to_marshal" @if($settlementFormStatus=="readonly" ) disabled @endif name="sent_to_marshal" wire:model.defer="settlementForm.sent_to_marshal" type="checkbox" class="" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row col-4">
                            </div>
                            <div class="form-group row col-4">
                            </div>
                            <div class="form-group row col-4">
                                <label for="marshal_fees" class="col-4 col-form-label">Marshal Fees</label>
                                <div class="col-7">
                                    <input id="marshal_fees" value="" @if($settlementFormStatus=="readonly" ) readonly @endif name="marshal_fees" wire:model.defer="settlementForm.marshal_fees" type="text" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row col-4">
                                <label for="notes" class="col-4 col-form-label">Notes</label>
                                <div class="col-7">
                                    <textarea id="notes" @if($settlementFormStatus=="readonly" ) readonly @endif name="notes" wire:model.defer="settlementForm.notes" class="form-control"> </textarea>
                                </div>
                            </div>
                            <div class="form-group row col-4">
                            </div>
                        </div>
                        @if(!empty($basic_intake_id))
                        <div class="form-edit-button general-form-edit">
                            <div class="form-group row">

                                <div class=" col-3 submit-button">
                                    <button id="save-left-button" @if($settlementFormStatus=="readonly" ) disabled @endif type="submit" class="btn btn-dark">Save
                                        Changes</button>
                                </div>
                                <div class="add-del-button col-4">
                                    @if($settlementFormStatus=="readonly")
                                    <button wire:click="$set('settlementFormStatus', 'editable')" id="update-left-button" type="button" class="btn d-flex  justify-content-between"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <g clip-path="url(#clip0_956_2256)">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z" fill="#1B1D21" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_956_2256">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg> Update</button>
                                    <button type="button" @if(empty($settlement_id)) disabled @endif class="btn d-flex  justify-content-between"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z" fill="#1B1D21" />
                                        </svg> Delete</button>
                                    @else
                                    <button id="cancel-left-button" wire:click.prevent="readonlySettlement()" type="button" class="btn btn-dark">Cancel</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                    </form>
                </div>

            </div>
            @if(!empty($settlement_id))
            <div class="row">
                <div class="col-md-3">
                    <button type="button" class="btn sky-btn" wire:click.prevent="addSettlementCheck()"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_956_2256)">
                                <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z" fill="#1B1D21"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_956_2256">
                                    <rect width="24" height="24" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg> Add Check</button>
                    <button type="button" class="btn sky-btn" wire:click.prevent="addReplicate()"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_956_2256)">
                                <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z" fill="#1B1D21"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_956_2256">
                                    <rect width="24" height="24" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>Replicate Data</button>
                </div>
                <div class="col-md-9">
                </div>
            </div>
            <div class="table-responsive basic-inteke-table py-3">
                <table class="table accordion bill-data-table-d ">
                    <thead>
                        <tr>
                            <th scope="col">Date Received</th>
                            <th scope="col">Total</th>
                            <th scope="col">Principle</th>
                            <th scope="col">Interest</th>
                            <th scope="col">Attorney Fees</th>
                            <th scope="col">Filing Fees/Disburs</th>
                            <th scope="col">Costs</th>
                            <th scope="col">Other</th>
                            <th scope="col">Check #</th>
                            <th scope="col">Check Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($settlementChecks))
                        @foreach($settlementChecks as $res)
                        <tr>
                            <td>{{$res->date_received}}</td>
                            <td>{{$res->total}}</td>
                            <td>{{$res->principle}}</td>
                            <td>{{$res->interest}}</td>
                            <td>{{$res->attorney_fees}}</td>
                            <td>{{$res->filing_fees}}</td>
                            <td>{{$res->costs}}</td>
                            <td>{{$res->other}}</td>
                            <td>{{$res->check}}</td>
                            <td>{{$res->date}}</td>
                            <td><button class="btn btn-sm btn-dark" wire:click.prevent="editSettlementCheck({{$res['id']}})" type="button" id="view-settlement-check-{{$res['id']}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z" fill="white" />
                                    </svg></button>
                                <button class="btn btn-sm sky-btn" id="delete-settlement_check-{{$res['id']}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z" fill="#1B1D21" />
                                    </svg> </button>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        @if(!empty($settlementChecks))
                        <tr>
                            <td>Total</td>
                            <td colspan="10">{{$settlementChecks->sum('total')}}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            @endif
        </div>
        <h5 style="float:right;">Total Outstanding: <span>{{max((int)((@$settlementForm['new_total']=="1"?(int)@$settlementForm['new_principle']:(int)@$settlementForm['principle_amount']) + (int)@$settlementForm['interest_amount'] + (int)@$settlementForm['attorney_fees'] + (int)@$settlementForm['filing_fees'] + (int)@$settlementForm['costs'])-$settlementChecks->sum('total'), 0)}}</span></h5>
        <div class="modal fade" id="settlement-check-popup" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Settlement Check</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="add-bill-popup-form-wrap">
                            <div class="add-bill-popup-form-inner">
                                <div class="add-bill-popup-form">
                                    <form wire:submit.prevent="submitSettlementCheck" id="settlementCheckForm">
                                        <div class="form-fields row">
                                            <div class="form-group row col-4">
                                                <label for="date_received" class="col-4 col-form-label">Date Received</label>
                                                <div class="col-7">
                                                    <input id="date_received" name="date_received" wire:model.defer="settlementCheckForm.date_received" type="text" class="form-control settlement-form-datepicker" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group row col-4">
                                                <label for="check_total" class="col-4 col-form-label">Total</label>
                                                <div class="col-7">
                                                    <input id="check_total" name="total" wire:model.defer="settlementCheckForm.total" type="text" class="form-control" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group row col-4">
                                                <label for="check_principle" class="col-4 col-form-label">Principle</label>
                                                <div class="col-7">
                                                    <input id="check_principle" name="principle" wire:model.defer="settlementCheckForm.principle" type="text" class="form-control" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group row col-4">
                                                <label for="check_interest" class="col-4 col-form-label">Interest</label>
                                                <div class="col-7">
                                                    <input id="check_interest" name="interest" wire:model.defer="settlementCheckForm.interest" type="text" class="form-control" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group row col-4">
                                                <label for="check_attorney_fees" class="col-4 col-form-label">Attorney Fees</label>
                                                <div class="col-7">
                                                    <input id="check_attorney_fees" name="attorney_fees" wire:model.defer="settlementCheckForm.attorney_fees" type="text" class="form-control" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group row col-4">
                                                <label for="check_filing_fees" class="col-4 col-form-label">Filing Fees</label>
                                                <div class="col-7">
                                                    <input id="check_filing_fees" name="filing_fees" wire:model.defer="settlementCheckForm.filing_fees" type="text" class="form-control" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group row col-4">
                                                <label for="check_costs" class="col-4 col-form-label">Costs</label>
                                                <div class="col-7">
                                                    <input id="check_costs" name="costs" wire:model.defer="settlementCheckForm.costs" type="text" class="form-control" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group row col-4">
                                                <label for="check" class="col-4 col-form-label">Check #</label>
                                                <div class="col-7">
                                                    <input id="check" name="check" wire:model.defer="settlementCheckForm.check" type="text" class="form-control" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group row col-4">
                                                <label for="date" class="col-4 col-form-label">Check Date</label>
                                                <div class="col-7">
                                                    <input id="date" name="date" wire:model.defer="settlementCheckForm.date" type="text" class="form-control settlement-form-datepicker" autocomplete="off">
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
        <div class="modal fade" id="replicate-popup" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Replicate Data(*Previous data for settlement will be vanish for selected file numbers.)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="add-bill-popup-form-wrap">
                            <div class="add-bill-popup-form-inner">
                                <div class="add-bill-popup-form">
                                    <form wire:submit.prevent="submitReplicateForm" id="replicateForm">
                                        <div class="form-fields row">
                                            <div class="form-group row col-12">
                                                <label for="replicated_files" class="col-4 col-form-label">Select File# to replicate in:</label>
                                                <div class="col-7 other-select-div">
                                                    <select id="replicated_files" multiple name="replicated_files" wire:model.defer="replicated_files" class="custom-select replicate-form-select ">
                                                        <option></option>
                                                        @foreach($files as $file)
                                                        <option value="{{$file->id}}">File #{{$file->id}}</option>
                                                        @endforeach
                                                    </select>
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
            window.addEventListener('saveSettlementCheck', event => {

                $('#settlement-check-popup').modal("hide");
            })

            window.addEventListener('addSettlementCheck', event => {
                $("#settlementCheckForm")[0].reset()
                $('#settlement-check-popup').modal("show");
            })

            window.addEventListener('editSettlementCheck', event => {
                $('#settlement-check-popup').modal("show");
            })

            window.addEventListener('saveReplicate', event => {

                $('#replicate-popup').modal("hide");
            })

            window.addEventListener('addReplicate', event => {
                $("#replicateForm")[0].reset()
                $('#replicate-popup').modal("show");
            })

            $(document).on('show.bs.modal', '.modal', function() {
                if ($(".modal-backdrop").length > 1) {
                    $(".modal-backdrop").not(':first').remove();
                }
            });
            // Remove all backdrop on close
            $(document).on('hide.bs.modal', '.modal', function() {
                if ($(".modal-backdrop").length > 1) {
                    $(".modal-backdrop").remove();
                }
            });

            $(document).on("change", "#interest_from", function() {
                if ($(this).val() == "Other") {
                    $("#interest_from_date").show();
                } else {
                    $("#interest_from_date").hide();

                }
            })

            $(document).on('change', '#new_total', function() {
                if (this.checked) {
                    $(".principle_amount_box").css("visibility", "hidden");
                    $(".new_principle_box").css("visibility", "visible");
                } else {
                    $(".new_principle_box").css("visibility", "hidden");
                    $(".principle_amount_box").css("visibility", "visible");
                }
            });

            $(document).on('change', '#sent_to_marshal', function() {
                if (this.checked) {
                    $("#marshal_fees").val("50");
                } else {
                    $("#marshal_fees").val("");
                }

                @this.set($("#marshal_fees").attr("wire:model.defer"), $("#marshal_fees").val(), true);

            });

            $(document).on('blur', '#check_principle,#check_interest,#check_attorney_fees,#check_filing_fees,#check_costs', function() {
                var total = 0.0;
                if ($("#check_principle").val() != "") {
                    total += parseFloat($("#check_principle").val());
                }
                if ($("#check_interest").val() != "") {
                    total += parseFloat($("#check_interest").val());
                }
                if ($("#check_attorney_fees").val() != "") {
                    total += parseFloat($("#check_attorney_fees").val());
                }
                if ($("#check_filing_fees").val() != "") {
                    total += parseFloat($("#check_filing_fees").val());
                }
                if ($("#check_costs").val() != "") {
                    total += parseFloat($("#check_costs").val());
                }

                $("#check_total").val(total);
                @this.set($("#check_total").attr("wire:model.defer"), $("#check_total").val(), true);

            });
        });
        document.addEventListener("livewire:load", function(event) {
            Livewire.hook('message.processed', (el, component) => {
                $('.settlement-form-select').select2({
                    placeholder: 'Select an option',
                    matcher: function(params, data) {
                        return matchStart(params, data);
                    }
                }).on("change", function(e) {
                    var mod = $(e.target).attr('wire:model.defer');
                    @this.set(mod, e.target.value, true);
                    if (mod == "settlementForm.interest_from") {
                        console.log("in");
                        @this.emit('calculate', 'interest_from');
                    }

                    if (mod == "settlementForm.type") {
                        console.log("in");
                        @this.emit('calculate', 'type');
                    }
                });

                $('.settlement-form-select-tag').select2({
                    placeholder: 'Select an option',
                    tags: true,
                    matcher: function(params, data) {
                        return matchStart(params, data);
                    }
                }).on("change", function(e) {
                    var mod = $(e.target).attr('wire:model.defer');
                    @this.set(mod, e.target.value, true);
                    var persons = @js($persons);
                    persons = persons.filter(item => item.name == e.target.value)
                    console.log(persons)
                    if (persons.length > 0) {
                        $("#email_fax").val(persons[0].email_fax)
                        @this.set($("#email_fax").attr("wire:model.defer"), $("#email_fax").val(), true);

                        $("#settlement_phone_number").val(persons[0].phone_number)
                        @this.set($("#settlement_phone_number").attr("wire:model.defer"), $("#settlement_phone_number").val(), true);

                    }

                });

                $('.replicate-form-select').select2({
                    placeholder: 'Select an option',
                    tags: true,
                    dropdownParent: $("#replicate-popup"),
                    multiple: true,
                    matcher: function(params, data) {
                        return matchStart(params, data);
                    }
                }).on("change", function(e) {
                    var mod = $(e.target).attr('wire:model.defer');
                    var values = Array.from(e.target.selectedOptions, option => option.value);
                    @this.set(mod, values, true);
                });

                $('.settlement-form-datepicker').datetimepicker({
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

        Livewire.on('addArbitration', () => {
            alert('A post was added with the id of:stId');
        })
    </script>
    @endpush
</div>