<div>
    <style>
        .form-control[readonly] {
            background-color: #9999991a;
            border: 1px solid #999 !important;
        }

        .form-control[readonly] {
            background-color: #9999991a;
            border: 1px solid #999 !important;
        }

        .pi_advanced_search {
            padding-bottom: 20px;
            border-bottom: none !important;
            margin: 0;
            padding-left: 0;
        }
    </style>

    <div class="pi_advanced_search_and_detail row mt-5">
        <div class="pi_advanced_search  row">
            <div class="pi_file_number_and_search">

                <!-- <span class="pi_fil_number_label">File no.</span> -->
                <label for="file_number" class="px-1 d-inline pi_fil_number_label col-2 col-form-label btn sky-btn">Insurance Company</label>
                <!-- <span class="pi_fil_number">27558</span> -->
                <input wire:model.live.debounce.250ms="search" form="eou_form" type="text" class="d-inline pi_fil_number mx-1 col-2" id="file_number">
                <label for="index_search" class="px-1 d-inline pi_fil_number_label col-1 col-form-label btn sky-btn">Provider
                    no.</label>
                <!-- <span class="pi_fil_number">27558</span> -->
                <input wire:change="updateIndex($event.target.value)" form="eou_form" type="text" value="{{@$data['index_number']}}" class="d-inline pi_fil_number mx-1 col-2" id="index_search">
                <button class="pi_fil_search_button  btn btn-dark col-1 d-inline" id="advance-search" aria-controls="patient-info-form-popup"><span class="search_icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M12.5233 11.4626L15.7353 14.6746L14.6746 15.7353L11.4626 12.5233C10.3077 13.4473 8.843 14 7.25 14C3.524 14 0.5 10.976 0.5 7.25C0.5 3.524 3.524 0.5 7.25 0.5C10.976 0.5 14 3.524 14 7.25C14 8.843 13.4473 10.3077 12.5233 11.4626ZM11.0185 10.9061C11.9356 9.96095 12.5 8.6717 12.5 7.25C12.5 4.34938 10.1506 2 7.25 2C4.34938 2 2 4.34938 2 7.25C2 10.1506 4.34938 12.5 7.25 12.5C8.6717 12.5 9.96095 11.9356 10.9061 11.0185L11.0185 10.9061Z" fill="white"></path>
                        </svg></span> Search</button>
                <div class="col-2"></div>
                <button class="pi_fil_search_button  btn btn-dark col-2 d-inline" id="advance-search" aria-controls="patient-info-form-popup"><span class="search_icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M12.5233 11.4626L15.7353 14.6746L14.6746 15.7353L11.4626 12.5233C10.3077 13.4473 8.843 14 7.25 14C3.524 14 0.5 10.976 0.5 7.25C0.5 3.524 3.524 0.5 7.25 0.5C10.976 0.5 14 3.524 14 7.25C14 8.843 13.4473 10.3077 12.5233 11.4626ZM11.0185 10.9061C11.9356 9.96095 12.5 8.6717 12.5 7.25C12.5 4.34938 10.1506 2 7.25 2C4.34938 2 2 4.34938 2 7.25C2 10.1506 4.34938 12.5 7.25 12.5C8.6717 12.5 9.96095 11.9356 10.9061 11.0185L11.0185 10.9061Z" fill="white"></path>
                        </svg></span> Advanced Search</button>
                <div class="col-2">
                    <button class="btn btn-dark" wire:click.prevent="addNew">Add</button>
                    @if($formStatus=="editable")
                    <button type="submit" class="btn btn-dark" form="eou_form">Save</button>
                    @endif
                </div>
            </div>

        </div>

        <form class="patient-info-detail-form mx-3 mt-3" id="eou_form" wire:submit.prevent="submitEOUForm"></form>
        <div class="row p-4">
            <div class="form-group row col-4">
                <label for="insurance_company" class="col-4 col-form-label">Insurance Company*</label>
                <div class="col-7">
                    <select form="eou_form" id="insurance_company" name="insurance_company" wire:model.defer="eouForm.insurance_company" @if($formStatus=="readonly" ) disabled @endif class="custom-select eou-form-select ">
                        <option></option>
                        @foreach($insurance_companies as $res)
                        <option value="{{$res['id']}}">{{$res['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row col-4">
                <label for="provider" class="col-4 col-form-label">Provider*</label>
                <div class="col-7">
                    <select form="eou_form" id="provider" name="provider" wire:model.defer="eouForm.provider" @if($formStatus=="readonly" ) disabled @endif class="custom-select eou-form-select ">
                        <option></option>
                        @foreach($providers as $res)
                        <option value="{{$res['id']}}">{{$res['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row col-4">
                <label for="carrier_attorney" class="col-4 col-form-label">Carier Attorney*</label>
                <div class="col-7">
                    <input id="carrier_attorney" name="carrier_attorney" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.carrier_attorney" form="eou_form" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row col-4">
                <label for="eou_status" class="col-4 col-form-label">EOU Status*</label>
                <div class="col-7">
                    <select form="eou_form" id="eou_status" name="eou_status" wire:model.defer="eouForm.eou_status" @if($formStatus=="readonly" ) disabled @endif class="custom-select eou-form-select ">
                        <option></option>
                        <option>Pending</option>
                        <option>Attended</option>
                        <option>Completed</option>
                        <option>Settled</option>
                        <option>Settled-Paid</option>
                        <option>Withdrawn</option>
                        <option>Withdrawn Representation</option>
                    </select>
                </div>
            </div>
            <div class="form-group row col-4">
                <label for="amount_dispute" class="col-4 col-form-label">Amount in Dispute</label>
                <div class="col-7">
                    <input id="amount_dispute" name="amount_dispute" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.amount_dispute" form="eou_form" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row col-4">
                <label for="date_service" class="col-4 col-form-label">Dates of Service</label>
                <div class="col-7">
                    <input id="date_service" name="date_service" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.date_service" form="eou_form" type="text" class="form-control eou-form-datepicker">
                </div>
            </div>
            <div class="form-group row col-4">
                <label for="assigner" class="col-4 col-form-label">Assignor(s)</label>
                <div class="col-7">
                    <input id="assigner" name="assigner" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.assigner" form="eou_form" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row col-4">
                <label for="claim_number" class="col-4 col-form-label">Claim #</label>
                <div class="col-7">
                    <input id="claim_number" name="claim_number" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.claim_number" form="eou_form" type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="table-responsive basic-inteke-table py-3">
            <table class="table accordion bill-data-table-d ">
                <thead>
                    <tr>
                        <th scope="col">EUO Date</th>
                        <th scope="col">EUO Time</th>
                        <th scope="col">EUO Location</th>
                        <th scope="col">EUO Witness</th>
                        <th scope="col">EUO Attorney</th>
                        <th scope="col">Witness Fee Demanded</th>
                        <th scope="col">Witness Fee Agreed</th>
                        <th scope="col">Witness Fee Received</th>
                        <th scope="col">EUO Withdrawl Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> <input id="eou_date" name="eou_date" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.eou_date" form="eou_form" type="text" class="form-control eou-form-datepicker"> </td>
                        <td> <input id="eou_time" name="eou_time" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.eou_time" form="eou_form" type="text" class="form-control"> </td>
                        <td> <input id="eou_location" name="eou_location" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.eou_location" form="eou_form" type="text" class="form-control"></td>
                        <td> <input id="eou_witness" name="eou_witness" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.eou_witness" form="eou_form" type="text" class="form-control"></td>
                        <td> <input id="eou_attorney" name="eou_attorney" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.eou_attorney" form="eou_form" type="text" class="form-control"></td>
                        <td> <input id="witness_fee_demanded" name="witness_fee_demanded" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.witness_fee_demanded" form="eou_form" type="text" class="form-control"></td>
                        <td> <input id="witness_fee_agreed" name="witness_fee_agreed" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.witness_fee_agreed" form="eou_form" type="text" class="form-control"></td>
                        <td> <input id="witness_fee_received" name="witness_fee_received" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.witness_fee_received" form="eou_form" type="text" class="form-control"></td>
                        <td> <input id="eou_withdrawl_date" name="eou_withdrawl_date" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.eou_withdrawl_date" form="eou_form" type="text" class="form-control eou-form-datepicker"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive basic-inteke-table py-3">
            <button class="btn btn-dark col-1" disabled>Add New</button>

            <table class="table accordion bill-data-table-d ">
                <thead>
                    <tr>
                        <th scope="col">EUO Letter Date</th>
                        <th scope="col">Date Requested</th>
                        <th scope="col">EUO Response Letter</th>
                        <th scope="col">Adjourned Date</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="table-responsive basic-inteke-table py-3">
            <table class="table accordion bill-data-table-d ">
                <thead>
                    <tr>
                        <th scope="col">EUO Transcript Received</th>
                        <th scope="col">EUO Transcript Deadline</th>
                        <th scope="col">EUO Transcript Sent</th>
                        <th scope="col">1st Post EUO Verification</th>
                        <th scope="col">Response Deadline</th>
                        <th scope="col">2nd Post EUO Verification</th>
                        <th scope="col">Response to Post EUO Verification</th>
                        <th scope="col">Denial Date</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><input id="eou_transcript_received" name="eou_transcript_received" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.eou_transcript_received" form="eou_form" type="text" class="form-control eou-form-datepicker"> </td>
                        <td><input id="eou_transcript_deadline" name="eou_transcript_deadline" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.eou_transcript_deadline" form="eou_form" type="text" class="form-control eou-form-datepicker"> </td>
                        <td><input id="eou_transcript_sent" name="eou_transcript_sent" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.eou_transcript_sent" form="eou_form" type="text" class="form-control eou-form-datepicker"></td>
                        <td><input id="first_post_eou_verification" name="first_post_eou_verification" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.first_post_eou_verification" form="eou_form" type="text" class="form-control eou-form-datepicker"></td>
                        <td><input id="response_deadline" name="response_deadline" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.response_deadline" form="eou_form" type="text" class="form-control eou-form-datepicker"></td>
                        <td><input id="second_post_eou_verification" name="second_post_eou_verification" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.second_post_eou_verification" form="eou_form" type="text" class="form-control eou-form-datepicker"></td>
                        <td><input id="response_post_eou_verification" name="response_post_eou_verification" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.response_post_eou_verification" form="eou_form" type="text" class="form-control eou-form-datepicker"></td>
                        <td><input id="denial_date" name="denial_date" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.denial_date" form="eou_form" type="text" class="form-control eou-form-datepicker"></td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="row p-4">
            <div class="form-group row col-4">
                <label for="person_settled" class="col-4 col-form-label">Person Settled with</label>
                <div class="col-7">
                    <input id="person_settled" name="person_settled" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.person_settled" form="eou_form" type="text" class="form-control">
                </div>
            </div>

            <div class="form-group row col-4">
                <label for="settlement_date" class="col-4 col-form-label">Settlement Date</label>
                <div class="col-7">
                    <input id="settlement_date" name="settlement_date" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.settlement_date" form="eou_form" type="text" class="form-control eou-form-datepicker">
                </div>
            </div>
            <div class="form-group row col-4">
                <label for="email_contact" class="col-4 col-form-label">Email Contact</label>
                <div class="col-7">
                    <input id="email_contact" name="email_contact" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.email_contact" form="eou_form" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row col-4">
                <label for="phone_contact" class="col-4 col-form-label">Phone Contact</label>
                <div class="col-7">
                    <input id="phone_contact" name="phone_contact" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.phone_contact" form="eou_form" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row col-4">
                <label for="principle_settled" class="col-4 col-form-label"> Principle Settled</label>
                <div class="col-7">
                    <input id="principle_settled" name="principle_settled" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.principle_settled" form="eou_form" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row col-4">
                <label for="attorney_fees_settled" class="col-4 col-form-label">Attorney's Fees Settled</label>
                <div class="col-7">
                    <input id="attorney_fees_settled" name="attorney_fees_settled" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.attorney_fees_settled" form="eou_form" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row col-4">
                <label for="principle_received" class="col-4 col-form-label">Principle Received</label>
                <div class="col-7">
                    <input id="principle_received" name="principle_received" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.principle_received" form="eou_form" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row col-4">
                <label for="principle_received_date" class="col-4 col-form-label">Principle Received Date</label>
                <div class="col-7">
                    <input id="principle_received_date" name="principle_received_date" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.principle_received_date" form="eou_form" type="text" class="form-control eou-form-datepicker">
                </div>
            </div>
            <div class="form-group row col-4">
                <label for="attorney_fees_received" class="col-4 col-form-label">Attorney's Fees Received</label>
                <div class="col-7">
                    <input id="attorney_fees_received" name="attorney_fees_received" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.attorney_fees_received" form="eou_form" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row col-4">
                <label for="attorney_fees_received_date" class="col-4 col-form-label">Attorney's Fees Received Date
                </label>
                <div class="col-7">
                    <input id="attorney_fees_received_date" name="attorney_fees_received_date" @if($formStatus=="readonly" ) readonly @endif wire:model.defer="eouForm.attorney_fees_received_date" form="eou_form" type="text" class="form-control eou-form-datepicker">
                </div>
            </div>
            <div class="form-group row col-4">
                <label for="notes" class="col-4 col-form-label">Notes
                </label>
                <div class="col-7">
                    <textarea id="notes" name="notes" wire:model.defer="eouForm.notes" class="form-control" @if($formStatus=="readonly" ) readonly @endif> </textarea>
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

    document.addEventListener("livewire:load", function(event) {
        Livewire.hook('message.processed', (el, component) => {
            $('.eou-form-select').select2({
                placeholder: 'Select an option',
                matcher: function(params, data) {
                    return matchStart(params, data);
                }
            }).on("change", function(e) {
                var mod = $(e.target).attr('wire:model.defer');
                @this.set(mod, e.target.value, true);


            });

            $('.eou-form-datepicker').datetimepicker({
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
        });
    });
    </script>
    @endpush