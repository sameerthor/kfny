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
                <button class="pi_fil_search_button  btn btn-dark col-1 d-inline" aria-controls="patient-info-form-popup"><span class="search_icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
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
            <div class="py-3" id="patient-info-form-popup" style="display:<?php if (is_array($searchResults) || !empty($searchResults)) {
                                                                                echo " block";
                                                                            } else {
                                                                                echo "none";
                                                                            } ?>">
                <div class="card card-body">
                    <form class="patient-info-detail-form" wire:submit.prevent="advanceSearch" id="advanceSearchForm">
                        <div class=" d-flex">
                            <div class="form-group  d-flex col-5">
                                <label for="search_insurance_company" class="col-5 col-form-label">Insurance Company</label>
                                <div class="col-7">
                                    <select id="search_insurance_company" name="search_insurance_company" wire:model.defer="searchForm.insurance_company" class="custom-select eou-form-select ">
                                        <option></option>
                                        @foreach($insurance_companies as $res)
                                        <option value="{{$res['id']}}">{{$res['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group  d-flex col-5">
                                <label for="search_provider" class="col-5 col-form-label">Provider*</label>
                                <div class="col-7">
                                    <select id="search_provider" name="search_provider" wire:model.defer="searchForm.provider" class="custom-select eou-form-select ">
                                        <option></option>
                                        @foreach($providers as $res)
                                        <option value="{{$res['id']}}">{{$res['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group  d-flex col-5">
                                <label for="search_carrier_attorney" class="col-5 col-form-label">Carier Attorney</label>
                                <div class="col-7">
                                    <input id="search_carrier_attorney" name="search_carrier_attorney" wire:model.defer="searchForm.carrier_attorney" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="form-group d-flex col-5">
                                <label for="search_eou_status" class="col-5 col-form-label">EOU Status*</label>
                                <div class="col-7">
                                    <select id="search_eou_status" name="search_eou_status" wire:model.defer="searchForm.eou_status" class="custom-select eou-form-select ">
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
                            <div class="form-group d-flex col-5">
                                <label for="search_assigner" class="col-5 col-form-label">Assignor(s)</label>
                                <div class="col-7">
                                    <input id="search_assigner" name="search_assigner" wire:model.defer="searchForm.assigner" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group d-flex col-5">
                                <label for="search_claim_number" class="col-5 col-form-label">Claim #</label>
                                <div class="col-7">
                                    <input id="search_claim_number" name="search_claim_number" wire:model.defer="searchForm.claim_number" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group d-flex col-5">
                                <label for="search_eou_date" class="col-5 col-form-label">EOU Date</label>
                                <div class="col-7">
                                    <input id="search_eou_date" name="search_eou_date" wire:model.defer="searchForm.eou_date" type="text" class="form-control eou-form-datepicker">
                                </div>
                            </div>
                            <div class="form-group d-flex col-5">
                                <label for="search_witness_fee_outstanding" class="col-5 col-form-label">Witness Fee Outstanding</label>
                                <div class="col-7">
                                    <input id="search_witness_fee_outstanding" name="search_witness_fee_outstanding" wire:model.defer="searchForm.witness_fee_outstanding" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group d-flex col-5">
                                <label for="search_principle_settled_outstanding" class="col-5 col-form-label">Principle Settled Outstanding</label>
                                <div class="col-7">
                                    <input id="search_principle_settled_outstanding" name="search_principle_settled_outstanding" wire:model.defer="searchForm.principle_settled_outstanding" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group d-flex col-5">
                                <label for="search_attorney_fees_settled_outstanding" class="col-5 col-form-label">Attorney's Fees Outstanding</label>
                                <div class="col-7">
                                    <input id="search_attorney_fees_settled_outstanding" name="search_attorney_fees_settled_outstanding" wire:model.defer="searchForm.attorney_fees_settled_outstanding" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group d-flex col-5">
                                <label for="search_eou_transcript_deadline" class="col-5 col-form-label">EUO Transcript Deadline</label>
                                <div class="col-7">
                                    <input id="search_eou_transcript_deadline" name="search_eou_transcript_deadline" wire:model.defer="searchForm.eou_transcript_deadline" type="text" class="form-control eou-form-datepicker">
                                </div>
                            </div>
                            <div class="form-group d-flex col-5">
                                <label for="search_response_deadline" class="col-5 col-form-label">Response Deadline</label>
                                <div class="col-7">
                                    <input id="search_response_deadline" name="search_response_deadline" wire:model.defer="searchForm.response_deadline" type="text" class="form-control eou-form-datepicker">
                                </div>
                            </div>
                            <div class="form-group d-flex col-5">
                                <label for="search_adjourned_date" class="col-5 col-form-label">Adjourned Deadline</label>
                                <div class="col-7">
                                    <input id="search_adjourned_date" name="search_adjourned_date" wire:model.defer="searchForm.adjourned_date" type="text" class="form-control eou-form-datepicker">
                                </div>
                            </div>
                        </div>
                        <div class="form-edit-button general-form-edit">
                            <div class="form-group row">
                                <div class="form-buttons">
                                    <div class=" d-flex">
                                        <button class="btn btn-dark" type="submit">Search</button>
                                        <button type="button" wire:click.prevent="resetForm()" class="btn sky-btn">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if(isset($searchResults) && count($searchResults)==0)
                    <h5 style="margin:auto">No data found.</h5>
                    @elseif(!empty($searchResults))

                    <div class="table-responsive">
                        <table class="table accordion bill-data-table-d advance_search_table">
                            <thead>
                                <tr>
                                    <th scope="col">Insurance Company</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($searchResults as $res)
                                <tr>
                                    <td>{{@$res['insuranceCompany']['name']}}</td>
                                    <td><button class="btn btn-dark" wire:click.prevent="ViewCase({{$res['id']}})" type="button" id="view-case-{{$res['id']}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z" fill="white" />
                                            </svg> View</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
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
            <button class="btn btn-dark col-1" @if(empty($eou_id)) disabled @endif wire:click.prevent="addNewEouLetter">Add New</button>

            <table class="table accordion bill-data-table-d ">
                <thead>
                    <tr>
                        <th scope="col">EUO Letter Date</th>
                        <th scope="col">Date Requested</th>
                        <th scope="col">EUO Response Letter</th>
                        <th scope="col">Adjourned Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($eou_id))
                    @foreach($EOU_Letters as $res)
                    <tr>
                        <td>{{$res->eou_letter_date}}</td>
                        <td>{{$res->date_requested}}</td>
                        <td>{{$res->eou_response_letter}}</td>
                        <td>{{$res->adjourned_date}}</td>
                        <td><button class="btn btn-sm btn-dark" wire:click.prevent="editEouLetter({{$res['id']}})" type="button" id="view-eou-letter-{{$res['id']}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z" fill="white" />
                                </svg></button>
                            <button class="btn btn-sm sky-btn" onclick="confirm('Are you sure you want to delete this?') || event.stopImmediatePropagation()" wire:click="deleteEouLetter({{$res['id']}})" id="delete-eou-letter-{{$res['id']}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z" fill="#1B1D21" />
                                </svg> </button>
                        </td>
                    </tr>
                    @endforeach
                    @endif
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
        <div class="modal fade" id="eou-letter-popup" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">EOU Letter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="add-bill-popup-form-wrap">
                            <div class="add-bill-popup-form-inner">
                                <div class="add-bill-popup-form">
                                    <form wire:submit.prevent="submitEouLetterForm" id="eouLetterForm">
                                        <div class="form-fields row">
                                            <div class="form-group row col-6">
                                                <label for="eou_letter_date" class="col-4 col-form-label">EUO Letter Date</label>
                                                <div class="col-7">
                                                    <input id="eou_letter_date" name="eou_letter_date" wire:model.defer="eouLetterForm.eou_letter_date" type="text" class="form-control eou-form-datepicker" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row col-6">
                                                <label for="date_requested" class="col-4 col-form-label">Date Requested</label>
                                                <div class="col-7">
                                                    <input id="date_requested" name="date_requested" wire:model.defer="eouLetterForm.date_requested" type="text" class="form-control eou-form-datepicker" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row col-6">
                                                <label for="eou_response_letter" class="col-4 col-form-label">EUO Response Letter</label>
                                                <div class="col-7">
                                                    <input id="eou_response_letter" name="eou_response_letter" wire:model.defer="eouLetterForm.eou_response_letter" type="text" class="form-control eou-form-datepicker" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row col-6">
                                                <label for="adjourned_date" class="col-4 col-form-label">Adjourned Date</label>
                                                <div class="col-7">
                                                    <input id="adjourned_date" name="adjourned_date" wire:model.defer="eouLetterForm.adjourned_date" type="text" class="form-control eou-form-datepicker" autocomplete="off">
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

      

        $("#advance-search").click(function(){
            $("#patient-info-form-popup").slideToggle();
        })

        window.addEventListener('resetAdvance', event => {

            $('#advanceSearchForm')[0].reset();
        })

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
        window.addEventListener('saveEouLetter', event => {

            $('#eou-letter-popup').modal("hide");
        })

        window.addEventListener('addEouLetter', event => {
            $("#eouLetterForm")[0].reset()
            $('#eou-letter-popup').modal("show");
        })

        window.addEventListener('editEouLetter', event => {
            $('#eou-letter-popup').modal("show");
        })
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

        $(document).on('change', '#eou_transcript_received', function() {
            var val = $(this).val();
            if (val != "") {
                $("#eou_transcript_deadline").val(moment(val, 'M/D/YY').add(120, 'days').format('M/D/YY')).trigger("change");
            } else {
                $("#eou_transcript_deadline").val("").trigger("change");
            }
            if (val != "") {
                $("#response_deadline").val(moment(val, 'M/D/YY').add(120, 'days').format('M/D/YY')).trigger("change");
            } else {
                $("#response_deadline").val("").trigger("change");
            }
            @this.set($("#eou_transcript_deadline").attr("wire:model.defer"), $("#eou_transcript_deadline").val(), true);
            @this.set($("#response_deadline").attr("wire:model.defer"), $("#response_deadline").val(), true);

        });
    </script>
    @endpush