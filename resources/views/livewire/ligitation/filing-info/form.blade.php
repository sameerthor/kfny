<div>
    <div class="basic-detail-form-wrap py-3">
        <div class="row">
            <div class="basic-detail-general col-6">
                <form class="patient-info-detail-form" wire:submit.prevent="submitLeftForm">

                    <div class="row">
                        <h5>Filing Info</h5>
                        <div class="form-group row col-6">
                            <label for="filing_date" class="col-4 col-form-label">Filing Date</label>
                            <div class="col-7">
                                <input id="filing_date" @if($leftFormStatus=="readonly" ) readonly @endif value="{{@$filing_info['filing_date']}}" name="filing_date" wire:model.defer="leftForm.filing_date" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="amended_filing" class="col-4 col-form-label">Amended Filing</label>
                            <div class="col-7">
                                <input id="amended_filing" @if($leftFormStatus=="readonly" ) readonly @endif value="{{@$filing_info['amended_filing']}}" name="amended_filing" wire:model.defer="leftForm.amended_filing" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="date_served" class="col-4 col-form-label">Date Served</label>
                            <div class="col-7">
                                <input id="date_served" @if($leftFormStatus=="readonly" ) readonly @endif value="{{@$filing_info['date_served']}}" name="date_served" wire:model.defer="leftForm.date_served" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="service_type" class="col-4 col-form-label">Service Type</label>
                            <div class="col-7 other-select-div">
                                <select data-model="leftForm.service_type" id="service_type" name="service_type" wire:model.defer="leftForm.service_type" @if($leftFormStatus=="readonly" ) disabled @endif class="custom-select filing-form-select ">
                                    <option @if(empty(@$filing_info['service_type'])) selected @endif></option>
                                    <option value="1" {{'1'==@$filing_info['service_type']?"selected":""}}>CV Personal NYC</option>
                                    <option value="2" {{'2'==@$filing_info['service_type']?"selected":""}}>CV Personal NYS</option>
                                    <option value="3" {{'3'==@$filing_info['service_type']?"selected":""}}>CV Non- Personal</option>
                                    <option value="4" {{'4'==@$filing_info['service_type']?"selected":""}}>SU Personal NYC</option>
                                    <option value="5" {{'5'==@$filing_info['service_type']?"selected":""}}>SU Personal NYS</option>
                                    <option value="6" {{'6'==@$filing_info['service_type']?"selected":""}}>SU Non-Personal</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="aos_filing_date" class="col-4 col-form-label">AOS Filing Date</label>
                            <div class="col-7">
                                <input id="aos_filing_date" @if($leftFormStatus=="readonly" ) readonly @endif value="{{@$filing_info['aos_filing_date']}}" name="aos_filing_date" wire:model.defer="leftForm.aos_filing_date" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="service_complete" class="col-4 col-form-label">Service Complete</label>
                            <div class="col-7">
                                <input id="service_complete" readonly value="{{@$filing_info['service_complete']}}" name="service_complete" wire:model.defer="leftForm.service_complete" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="ans_due_by" class="col-4 col-form-label">Answer Due By</label>
                            <div class="col-7">
                                <input id="ans_due_by" readonly value="{{@$filing_info['ans_due_by']}}" name="ans_due_by" wire:model.defer="leftForm.ans_due_by" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="ans_ext" class="col-4 col-form-label">Answer Ext.</label>
                            <div class="col-7">
                                <input id="ans_ext" @if($leftFormStatus=="readonly" ) readonly @endif value="{{@$filing_info['ans_ext']}}" name="ans_ext" wire:model.defer="leftForm.ans_ext" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="ans_rec" class="col-4 col-form-label">Answer Rec.</label>
                            <div class="col-7">
                                <input id="ans_rec" @if($leftFormStatus=="readonly" ) readonly @endif value="{{@$filing_info['ans_rec']}}" name="ans_rec" wire:model.defer="leftForm.ans_rec" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="default_letter" class="col-4 col-form-label">Default Letter</label>
                            <div class="col-7">
                                <input id="default_letter" readonly value="{{@$filing_info['default_letter']}}" name="default_letter" wire:model.defer="leftForm.default_letter" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="default_fileno" class="col-4 col-form-label">Def. File #</label>
                            <div class="col-7">
                                <input id="default_fileno" @if($leftFormStatus=="readonly" ) readonly @endif value="{{@$filing_info['default_fileno']}}" name="default_fileno" wire:model.defer="leftForm.default_fileno" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="default_date" class="col-4 col-form-label">Default Date</label>
                            <div class="col-7">
                                <input id="default_date" @if($leftFormStatus=="readonly" ) readonly @endif value="{{@$filing_info['default_date']}}" name="default_date" wire:model.defer="leftForm.default_date" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="default_deadline" class="col-4 col-form-label">Def. Vac. Deadline</label>
                            <div class="col-7">
                                <input id="default_deadline" readonly value="{{@$filing_info['default_deadline']}}" name="default_deadline" wire:model.defer="leftForm.default_deadline" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    @if(!empty($basic_intake_id))
                    <div class="form-edit-button general-form-edit">
                        <div class="form-group row">

                            <div class=" col-3 submit-button">
                                <button id="save-left-button" @if($leftFormStatus=="readonly" ) disabled @endif type="submit" class="btn btn-dark">Save
                                    Changes</button>
                            </div>
                            <div class="add-del-button col-4">
                                @if($leftFormStatus=="readonly")
                              
                                <button wire:click.prevent="editable('left')"  id="update-left-button" type="button" class="btn d-flex  justify-content-between"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0_956_2256)">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z" fill="#1B1D21" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_956_2256">
                                                <rect width="24" height="24" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg> Update</button>
                                <button type="button" @if(empty($info)) disabled @endif class="btn d-flex  justify-content-between"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z" fill="#1B1D21" />
                                    </svg> Delete</button>
                                @else
                                <button id="cancel-left-button" wire:click.prevent="readonly('left')" type="button" class="btn btn-dark">Cancel</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                </form>
            </div>
            <div class="basic-detail-adv col-6">
                <form class="form" wire:submit.prevent="submitRightForm">
                    <h5>Discovery</h5>

                    <div class="form-data row">
                        @if(!empty($discovery))
                        <div class="col-md-9">
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-sm sky-btn" wire:click.prevent="addDiscSchedule()"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <g clip-path="url(#clip0_956_2256)">
                                        <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z" fill="#1B1D21"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_956_2256">
                                            <rect width="24" height="24" fill="white"></rect>
                                        </clipPath>
                                    </defs>
                                </svg> Add Discv. Schedule</button>
                        </div>
                        @if(count($discovery->schedules)>0)
                        <div class="table-responsive basic-inteke-table py-3">
                            <table class="table accordion bill-data-table-d ">
                                <thead>
                                    <tr>
                                        <th scope="col">Discv. Schedule</th>
                                        <th scope="col">Demands Due</th>
                                        <th scope="col">Resp. Due</th>
                                        <th scope="col">EBT Deadlines</th>
                                        <th scope="col">Next Dscv. Conf.</th>
                                        <th scope="col">NOI Due</th>
                                        <th scope="col">Order/Strip Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($discovery->schedules as $res)
                                    <tr>
                                        <td>{{$res->discovery_schedule==1?"Order":""}}{{$res->discovery_schedule==2?"Strip":""}}</td>
                                        <td>{{$res->demand_due}}</td>
                                        <td>{{$res->resp_due}}</td>
                                        <td>{{$res->ebt_deadlines}}</td>
                                        <td>{{$res->next_desc_conf}}</td>
                                        <td>{{$res->noi_due}}</td>
                                        <td>{{$res->order_strip_date}}</td>
                                        <td><button class="btn btn-sm btn-dark" wire:click.prevent="editDiscSchedule({{$res['id']}})" type="button" id="view-schedule-{{$res['id']}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z" fill="white" />
                                                </svg></button>
                                            <button class="btn btn-sm sky-btn" id="delete-schedule-{{$res['id']}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z" fill="#1B1D21" />
                                                </svg> </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                        @endif
                        <div class="form-group row col-6">
                            <label for="d_demands" class="col-4 col-form-label">D. Demands</label>
                            <div class="col-7">
                                <input id="d_demands" @if($rightFormStatus=="readonly" ) readonly @endif value="{{@$discovery['d_demands']}}" name="d_demands" wire:model.defer="rightForm.d_demands" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="p_resp" class="col-4 col-form-label">P. Resp.</label>
                            <div class="col-7">
                                <input id="p_resp" @if($rightFormStatus=="readonly" ) readonly @endif value="{{@$discovery['p_resp']}}" name="p_resp" wire:model.defer="rightForm.p_resp" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="p_demands" class="col-4 col-form-label">P. Demands.</label>
                            <div class="col-7">
                                <input id="p_demands" @if($rightFormStatus=="readonly" ) readonly @endif value="{{@$discovery['p_demands']}}" name="p_demands" wire:model.defer="rightForm.p_demands" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="d_resp" class="col-4 col-form-label">D. Resp.</label>
                            <div class="col-7">
                                <input id="d_resp" @if($rightFormStatus=="readonly" ) readonly @endif value="{{@$discovery['d_resp']}}" name="d_resp" wire:model.defer="rightForm.d_resp" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="d_3101" class="col-4 col-form-label">D 3101(d)</label>
                            <div class="col-7">
                                <input id="d_3101" @if($rightFormStatus=="readonly" ) readonly @endif value="{{@$discovery['d_3101']}}" name="d_3101" wire:model.defer="rightForm.d_3101" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="p_3101" class="col-4 col-form-label">P 3101(d)</label>
                            <div class="col-7">
                                <input id="p_3101" @if($rightFormStatus=="readonly" ) readonly @endif value="{{@$discovery['p_3101']}}" name="p_3101" wire:model.defer="rightForm.p_3101" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="d_notice" class="col-4 col-form-label">D. Notice to Admit</label>
                            <div class="col-7">
                                <input id="d_notice" @if($rightFormStatus=="readonly" ) readonly @endif value="{{@$discovery['d_notice']}}" name="d_notice" wire:model.defer="rightForm.d_notice" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="p_nta_resp" class="col-4 col-form-label">P. NTA Resp.</label>
                            <div class="col-7">
                                <input id="p_nta_resp" @if($rightFormStatus=="readonly" ) readonly @endif value="{{@$discovery['p_nta_resp']}}" name="p_nta_resp" wire:model.defer="rightForm.p_nta_resp" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="p_notice" class="col-4 col-form-label">P. Notice to Admit</label>
                            <div class="col-7">
                                <input id="p_notice" @if($rightFormStatus=="readonly" ) readonly @endif value="{{@$discovery['p_notice']}}" name="p_notice" wire:model.defer="rightForm.p_notice" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="d_nta_resp" class="col-4 col-form-label">D. NTA Resp.</label>
                            <div class="col-7">
                                <input id="d_nta_resp" @if($rightFormStatus=="readonly" ) readonly @endif value="{{@$discovery['d_nta_resp']}}" name="d_nta_resp" wire:model.defer="rightForm.d_nta_resp" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="good_faith_let" class="col-4 col-form-label">Good Faith Let.</label>
                            <div class="col-7">
                                <input id="good_faith_let" @if($rightFormStatus=="readonly" ) readonly @endif value="{{@$discovery['good_faith_let']}}" name="good_faith_let" wire:model.defer="rightForm.good_faith_let" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="note_of_issue" class="col-4 col-form-label">Note of Issue</label>
                            <div class="col-7">
                                <input id="note_of_issue" @if($rightFormStatus=="readonly" ) readonly @endif value="{{@$discovery['note_of_issue']}}" name="note_of_issue" wire:model.defer="rightForm.note_of_issue" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row col-6">
                            <label for="d_supp_demand" class="col-4 col-form-label">D. Supp. Demand</label>
                            <div class="col-7">
                                <input id="d_supp_demand" @if($rightFormStatus=="readonly" ) readonly @endif value="{{@$discovery['d_supp_demand']}}" name="d_supp_demand" wire:model.defer="rightForm.d_supp_demand" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="p_supp_resp" class="col-4 col-form-label">P Supp. Resp.</label>
                            <div class="col-7">
                                <input id="p_supp_resp" @if($rightFormStatus=="readonly" ) readonly @endif value="{{@$discovery['p_supp_resp']}}" name="p_supp_resp" wire:model.defer="rightForm.p_supp_resp" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="p_supp_demand" class="col-4 col-form-label">P Supp. Demand</label>
                            <div class="col-7">
                                <input id="p_supp_demand" @if($rightFormStatus=="readonly" ) readonly @endif value="{{@$discovery['p_supp_demand']}}" name="p_supp_demand" wire:model.defer="rightForm.p_supp_demand" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="d_supp_resp" class="col-4 col-form-label">D. Supp. Resp.</label>
                            <div class="col-7">
                                <input id="d_supp_resp" @if($rightFormStatus=="readonly" ) readonly @endif value="{{@$discovery['d_supp_resp']}}" name="d_supp_resp" wire:model.defer="rightForm.d_supp_resp" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-4 col-form-label">3rd Party Discv.</label>
                            <div class="col-7">
                                <input placeholder="date field" @if($rightFormStatus=="readonly" ) readonly @endif name="party_disc_date" value="{{@$discovery['party_disc_date']}}" wire:model.defer="rightForm.party_disc_date" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                                <br>
                                <input placeholder="text field" @if($rightFormStatus=="readonly" ) readonly @endif name="party_disc_text" wire:model.defer="rightForm.party_disc_text" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-4 col-form-label">Subpoena</label>
                            <div class="col-7">
                                <input placeholder="date field" @if($rightFormStatus=="readonly" ) readonly @endif name="subpoena_date" value="{{@$discovery['subpoena_date']}}" wire:model.defer="rightForm.subpoena_date" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                                <br>
                                <input placeholder="text field" @if($rightFormStatus=="readonly" ) readonly @endif name="subpoena_text" wire:model.defer="rightForm.subpoena_text" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="notes" class="col-4 col-form-label">Notes</label>
                            <div class="col-7">
                                <textarea id="notes" @if($rightFormStatus=="readonly" ) readonly @endif name="notes" wire:model.defer="rightForm.notes" class="form-control"> </textarea>
                            </div>
                        </div>
                    </div>
                    @if(!empty($basic_intake_id))
                    <div class="form-edit-button adv-form-edit">
                        <div class="form-group row">

                            <div class=" col-4 submit-button">
                                <button id="save-right-button" @if($rightFormStatus=="readonly" ) disabled @endif type="submit" class="btn btn-dark">Save
                                    Changes</button>
                            </div>
                            <div class="add-del-button col-7 
                            ;J0 Z nb">
                                @if($rightFormStatus=="readonly")
                               
                                <button wire:click.prevent="editable('right')"   id="update-right-button" type="button" class="btn d-flex  justify-content-between"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0_956_2256)">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z" fill="#1B1D21" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_956_2256">
                                                <rect width="24" height="24" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg> Update</button>
                                <button type="button" @if(empty($info)) disabled @endif class="btn d-flex  justify-content-between"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z" fill="#1B1D21" />
                                    </svg> Delete</button>
                                @else
                                <button id="cancel-right-button" wire:click.prevent="readonly('right')" type="button" class="btn btn-dark">Cancel</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="schedule-popup" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Discovery Schedules</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="add-bill-popup-form-wrap">
                        <div class="add-bill-popup-form-inner">
                            <div class="add-bill-popup-form">
                                <form wire:submit.prevent="submitScheduleForm" id="scheduleForm">
                                    <div class="form-fields row">
                                        <div class="form-group col-5 d-flex">
                                            <label for="discovery_schedule" class="col-4 col-form-label">Discv. Schedule </label>
                                            <div class="col-8">
                                                <select id="discovery_schedule" name="discovery_schedule" wire:model.defer="modalData.discovery_schedule" class="custom-select">
                                                    <option></option>
                                                    <option value="1">Order</option>
                                                    <option value="2">Strip</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-6 d-flex">
                                            <label for="order_strip_date" class="col-4 col-form-label">Order/Strip Date</label>
                                            <div class="col-8">
                                                <input id="order_strip_date" name="order_strip_date" wire:model.defer="modalData.order_strip_date" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group col-6 d-flex">
                                            <label for="demand_due" class="col-4 col-form-label">Demands Due </label>
                                            <div class="col-8">
                                                <input id="demand_due" name="demand_due" wire:model.defer="modalData.demand_due" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>


                                        <div class="form-group col-5 d-flex">
                                            <label for="resp_due" class="col-4 col-form-label">Resp. Due </label>
                                            <div class="col-8">
                                                <input id="resp_due" name="resp_due" wire:model.defer="modalData.resp_due" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>


                                        <div class="form-group col-6 d-flex">
                                            <label for="ebt_deadlines" class="col-4 col-form-label">EBT Deadlines </label>
                                            <div class="col-8">
                                                <input id="ebt_deadlines" name="ebt_deadlines" wire:model.defer="modalData.ebt_deadlines" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>


                                        <div class="form-group col-5 d-flex">
                                            <label for="next_desc_conf" class="col-4 col-form-label">Next Dscv. Conf. </label>
                                            <div class="col-8">
                                                <input id="next_desc_conf" name="next_desc_conf" wire:model.defer="modalData.next_desc_conf" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>


                                        <div class="form-group col-6 d-flex">
                                            <label for="noi_due" class="col-4 col-form-label">NOI Due </label>
                                            <div class="col-8">
                                                <input id="noi_due" name="noi_due" wire:model.defer="modalData.noi_due" type="text" class="form-control filing-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-buttons">
                                        <div class=" d-flex">

                                            <button class="btn btn-dark" id="save-bill" type="submit">Save
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
        window.addEventListener('saveSchedule', event => {

            $('#schedule-popup').modal("hide");
        })

        window.addEventListener('addSchedule', event => {
            $("#scheduleForm")[0].reset()
            $('#schedule-popup').modal("show");
        })

        window.addEventListener('editSchedule', event => {
            $('#schedule-popup').modal("show");
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
    });
    document.addEventListener("livewire:load", function(event) {
        Livewire.hook('message.processed', (el, component) => {
            $('.filing-form-select').select2({
                placeholder: 'Select an option',
                matcher: function(params, data) {
                    return matchStart(params, data);
                }
            }).on("change", function(e) {
                var mod = $(e.target).attr('wire:model.defer');
                @this.set(mod, e.target.value, true);


            });

            $('.filing-form-datepicker').datetimepicker({
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