<div class="kfnythemes_modal">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Settlement Info</h5>
        </div>
        <div class="card-body">
            <form id="settlementForm" action="{{ route('ligitation.create') }}" method="POST">
                @csrf
                @method('post')
                <input type="hidden" name="set_id" value="{{$settlementInfo['id']}}">
                <div class="examAlertMsg"></div>
                <!-- Rest of your form content -->
                <div class="examAlertMsg"></div>
                <div class="row">
                    <!-- <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label class="mb-1">Decision Date</label>
                            <input type="date" class="form-control" name="decision_date" value="{{!empty($settlementInfo['decision_date'])?date('Y-m-d',strtotime($settlementInfo['decision_date'])):''}}" id="decision_date" data-rule-required="true">
                            <span class="text-danger error decision_date-error"></span>
                        </div>
                    </div> -->
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label class="mb-1">Settlement Date</label>
                            <input type="date" class="form-control" name="settlement_date" value="{{!empty($settlementInfo['settlement_date'])?date('Y-m-d',strtotime($settlementInfo['settlement_date'])):''}}" id="settlement_date" data-rule-required="true">
                            <span class="text-danger error settlement_date-error"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label class="mb-1">Person Settled with</label>
                            <input type="text" class="form-control" name="settled_with" value="{{$settlementInfo['settled_with']}}" id="settled_with" data-rule-required="true">
                            <span class="text-danger error settled_with-error"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label class="mb-1">Email/Fax #</label>
                            <input type="text" class="form-control" name="email_fax" value="{{$settlementInfo['email_fax']}}" id="email_fax" data-rule-required="true">
                            <span class="text-danger error email_fax-error"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label class="mb-1">Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" value="{{$settlementInfo['phone_number']}}" id="phone_number" data-rule-required="true">
                            <span class="text-danger error phone_number-error"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label class="mb-1">Principal %</label>
                            <input type="text" class="form-control" name="principal_term" value="{{$settlementInfo['principal_term']}}" id="principal_term" data-rule-required="true">
                            <span class="text-danger error principal_term-error"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label class="mb-1">Principal Amount</label>
                            <input type="text" class="form-control" name="principal_amount" value="{{$settlementInfo['principal_amount']}}" id="principal_amount" data-rule-required="true">
                            <span class="text-danger error principal_amount-error"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label class="mb-1">New total</label>
                            <input type="checkbox" class="form-check-input" {{$settlementInfo['new_total']=='1'?'checked':''}} name="new_total" value="1" id="new_total">
                            <span class="text-danger error new_total-error"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label class="mb-1">Interest %</label>
                            <input type="text" class="form-control" name="interest_term" value="{{$settlementInfo['interest_term']}}" id="interest_term" data-rule-required="true">
                            <span class="text-danger error interest_term-error"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label class="mb-1">Interest Amount</label>
                            <input type="text" class="form-control" name="interest_amount" value="{{$settlementInfo['interest_amount']}}" id="interest_amount" data-rule-required="true">
                            <span class="text-danger error interest_amount-error"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label class="mb-1">Interest From</label>
                            <select name="interest_from" class="form-control" data-rule-required="true">
                                <option selected>Date of Filing</option>
                                <option>Date of Service</option>
                                <option>30 Days overdue</option>
                                <option>Other</option>
                            </select>
                            <span class="text-danger error interest_from-error"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label class="mb-1">Settled Other</label>
                            <input type="text" class="form-control" name="settled_other" value="{{$settlementInfo['settled_other']}}" id="settled_other" data-rule-required="true">
                            <span class="text-danger error settled_other-error"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label class="mb-1">Fees Charged</label>
                            <input type="text" class="form-control" name="fee_charged" value="{{$settlementInfo['fee_charged']}}" id="fee_charged" data-rule-required="true">
                            <span class="text-danger error fee_charged-error"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label class="mb-1">Attorney's fees</label>
                            <input type="text" class="form-control" name="attorney_fees" value="{{$settlementInfo['attorney_fees']}}" id="attorney_fees" data-rule-required="true">
                            <span class="text-danger error attorney_fees-error"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label class="mb-1">Other Cost</label>
                            <input type="text" class="form-control" name="other_cost" value="{{$settlementInfo['other_cost']}}" id="other_cost" data-rule-required="true">
                            <span class="text-danger error other_cost-error"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label class="mb-1">Judgement Date</label>
                            <input type="date" class="form-control" name="judgement_date" value="{{!empty($settlementInfo['judgement_date'])?date('Y-m-d',strtotime($settlementInfo['judgement_date'])):''}}" id="judgement_date" data-rule-required="true">
                            <span class="text-danger error judgement_date-error"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label class="mb-1">Additional Cost</label>
                            <input type="text" class="form-control" name="additional_cost" value="{{$settlementInfo['additional_cost']}}" id="additional_cost" data-rule-required="true">
                            <span class="text-danger error additional_cost-error"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label class="mb-1">Additional Interest</label>
                            <input type="text" class="form-control" name="additional_interest" value="{{$settlementInfo['additional_interest']}}" id="additional_interest" data-rule-required="true">
                            <span class="text-danger error additional_interest-error"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label class="mb-1">Sent to Marshal</label>
                            <input type="checkbox" {{$settlementInfo['marshal_fee']=='1'?'checked':''}} class="form-check-input" name="sent_to_marshal" value="1" id="sent_to_marshal">
                            <span class="text-danger error sent_to_marshal-error"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label class="mb-1">Marshal Fee</label>
                            <input type="text" class="form-control"  name="marshal_fee" value="{{$settlementInfo['marshal_fee']}}" id="marshal_fee" data-rule-required="true">
                            <span class="text-danger error marshal_fee-error"></span>
                        </div>
                    </div>
                </div>
                <div class="m-3">
                    <table id="add_table" class="table" data-toggle="table" data-mobile-responsive="true">
                        <thead>
                            <tr>
                                <th>Date Received</th>
                                <th>Total</th>
                                <th>Principle</th>
                                <th>Interest</th>
                                <th>Attorney Fees</th>
                                <th>Filing Fees/Costs</th>
                                <th>Other</th>
                                <th>Check #</th>
                                <th>Check Date</th>
                                <th>
                                    <button type="button" class="btn btn-outline-success" id="add_cheque_row" class="add">+
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="chequeTable">
                            @if(count($settlementInfo->tableDetails)>0)
                            @foreach($settlementInfo->tableDetails as $res)
                            <tr>
                                <td>
                                    <input type="date" value="{{!empty($res['date_rec'])?date('Y-m-d',strtotime($res['date_rec'])):''}}" name="settlement_details[date_rec][]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" value="{{$res['total']}}" name="settlement_details[total][]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" value="{{$res['principle']}}" name="settlement_details[principle][]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" value="{{$res['interest']}}" name="settlement_details[interest][]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" value="{{$res['attorney_fees']}}" name="settlement_details[attorney_fees][]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" value="{{$res['filling_fees']}}" name="settlement_details[filling_fees][]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" value="{{$res['other']}}" name="settlement_details[other][]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" value="{{$res['check_number']}}" name="settlement_details[check_number][]" class="form-control">
                                </td>
                                <td>
                                    <input type="date" value="{{!empty($res['check_date'])?date('Y-m-d',strtotime($res['check_date'])):''}}" name="settlement_details[check_date][]" class="form-control">
                                </td>
                                <td>
                                    <button class="btn btn-outline-danger delete_cheque_row">Remove</button>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td>
                                    <input type="date" name="settlement_details[date_rec][]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="settlement_details[total][]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="settlement_details[principle][]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="settlement_details[interest][]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="settlement_details[attorney_fees][]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="settlement_details[filling_fees][]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="settlement_details[other][]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="settlement_details[check_number][]" class="form-control">
                                </td>
                                <td>
                                    <input type="date" name="settlement_details[check_date][]" class="form-control">
                                </td>
                                <td>
                                    <button class="btn btn-outline-danger delete_cheque_row">Remove</button>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary save-settlement-info-form" data-url="{{ route('settlement.store') }}">Save</button>
                </div>
            </form>
        </div>


    </div>
</div>
</div>