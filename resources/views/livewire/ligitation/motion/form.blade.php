<div>
    <br>
    @if(!$motionVisible)
    <button type="button" @if(empty($basic_intake_id)) disabled @endif wire:click="$set('motionVisible', true)" class="btn btn-dark">Add Motion</button>
    @endif
    @if(!$trialVisible)
    <button type="button" @if(empty($basic_intake_id)) disabled @endif wire:click="$set('trialVisible', true)" class="btn btn-dark">Add Trial</button>
    @endif
    @if(!$arbsVisible)
    <button type="button" @if(empty($basic_intake_id)) disabled @endif wire:click="setArbVisible" class="btn btn-dark">Add Arbs</button>
    @endif
    @if(!$appealsVisible)
    <button type="button" @if(empty($basic_intake_id)) disabled @endif wire:click="setAppealVisible" class="btn btn-dark">Add Appeals</button>
    @endif
    <br>
    @if($motionVisible)

    <div class="basic-detail-form-wrap py-3">
        @if(!empty($motions))
        <div class="table-responsive basic-inteke-table py-3">
            <table class="table accordion bill-data-table-d ">
                <thead>
                    <tr>
                        <th scope="col">Motion Type</th>
                        <th scope="col">X-Motion Type</th>
                        <th scope="col">Return Date</th>
                        <th scope="col">Decision/Results</th>
                        <th scope="col">Decision Date</th>
                        <th scope="col">Prima Facie</th>
                        <th scope="col">Judge</th>
                        <th scope="col">Part</th>
                        <th scope="col">Motion NOE Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($motions as $motion)
                    <tr>
                        <td>{{$motion->motion_type}}</td>
                        <td>{{$motion->x_motion_type}}</td>
                        <td>{{$motion->return_date}}</td>
                        <td>{{$motion->decisions}}</td>
                        <td>{{$motion->decision_date}}</td>
                        <td>{{$motion->prima_facie}}</td>
                        <td>{{$motion->judgeData?->name}}</td>
                        <td>{{$motion->part}}</td>
                        <td class="motion_noe_date">{{$motion->noe_date}}</td>
                        <td><button class="btn btn-sm btn-dark" wire:click.prevent="editMotion({{$motion['id']}})" type="button" id="view-motion-{{$motion['id']}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z" fill="white" />
                                </svg></button>
                            <button class="btn btn-sm sky-btn" id="delete-motion-{{$motion['id']}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z" fill="#1B1D21" />
                                </svg> </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
        <div class="row">
            <div class="basic-detail-general col-12">
                <form class="patient-info-detail-form" wire:submit.prevent="submitLeftMotionForm">

                    <div class="row">
                        <h5>Motion</h5>
                        <div class="form-group row col-4">
                            <label for="motion_type" class="col-4 col-form-label">Motion Type</label>
                            <div class="col-7 other-select-div">
                                <select data-model="leftMotionForm.motion_type" id="motion_type" name="motion_type" wire:model.defer="leftMotionForm.motion_type" @if($leftMotionFormStatus=="readonly" ) disabled @endif class="custom-select motion-form-select ">
                                    <option></option>
                                    <option value="D-SJMC">D-SJMC</option>
                                    <option value="P-SJM">P-SJM</option>
                                    <option value="D-CMPL">D-CMPL</option>
                                    <option value="D-CMPL">D-CMPL</option>
                                    <option value="P-DFLT JGMT">P-DFLT JGMT</option>
                                    <option value="D-DISM">D-DISM</option>
                                    <option value="D-OSC">D-OSC</option>
                                    <option value="P-RSTR">P-RSTR</option>
                                    <option value="P-VAC NOT">P-VAC NOT</option>
                                    <option value="D-VAC NOT">D-VAC NOT</option>
                                    <option value="P-REA">P-REA</option>
                                    <option value="D-REA">D-REA</option>
                                    <option value="P-REN">P-REN</option>
                                    <option value="D-REN">D-REN</option>
                                    <option value="P-STK">P-STK</option>
                                    <option value="D-STK">D-STK</option>
                                    <option value="D-CNSLD">D-CNSLD</option>
                                    <option value="P-CNSLD">P-CNSLD</option>
                                    <option value="D-SVR">D-SVR</option>
                                    <option value="P-SVR">P-SVR</option>
                                    <option value="P-VAC">P-VAC</option>
                                    <option value="D-VAC">D-VAC</option>
                                    <option value="P-AMND">P-AMND</option>
                                    <option value="D-AMND">D-AMND</option>
                                    <option value="Other">Other</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row col-4">
                            <label for="x_motion_type" class="col-4 col-form-label">X-Motion Type</label>
                            <div class="col-7 other-select-div">
                                <select data-model="leftMotionForm.x_motion_type" id="x_motion_type" name="x_motion_type" wire:model.defer="leftMotionForm.x_motion_type" @if($leftMotionFormStatus=="readonly" ) disabled @endif class="custom-select motion-form-select ">
                                    <option></option>
                                    <option value="D-SJMC">D-SJMC</option>
                                    <option value="P-SJM">P-SJM</option>
                                    <option value="D-CMPL">D-CMPL</option>
                                    <option value="D-CMPL">D-CMPL</option>
                                    <option value="P-DFLT JGMT">P-DFLT JGMT</option>
                                    <option value="D-DISM">D-DISM</option>
                                    <option value="D-OSC">D-OSC</option>
                                    <option value="P-RSTR">P-RSTR</option>
                                    <option value="P-VAC NOT">P-VAC NOT</option>
                                    <option value="D-VAC NOT">D-VAC NOT</option>
                                    <option value="P-REA">P-REA</option>
                                    <option value="D-REA">D-REA</option>
                                    <option value="P-REN">P-REN</option>
                                    <option value="D-REN">D-REN</option>
                                    <option value="P-STK">P-STK</option>
                                    <option value="D-STK">D-STK</option>
                                    <option value="D-CNSLD">D-CNSLD</option>
                                    <option value="P-CNSLD">P-CNSLD</option>
                                    <option value="D-SVR">D-SVR</option>
                                    <option value="P-SVR">P-SVR</option>
                                    <option value="P-VAC">P-VAC</option>
                                    <option value="D-VAC">D-VAC</option>
                                    <option value="P-AMND">P-AMND</option>
                                    <option value="D-AMND">D-AMND</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row col-4">
                            <label for="return_date" class="col-4 col-form-label">Return Date</label>
                            <div class="col-7">
                                <input id="return_date" @if($leftMotionFormStatus=="readonly" ) readonly @endif name="return_date" wire:model.defer="leftMotionForm.return_date" type="text" class="form-control motion-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-4">
                            <label for="decisions" class="col-4 col-form-label">Decision/Result</label>
                            <div class="col-7 other-select-div">
                                <select data-model="leftMotionForm.decisions" id="decisions" name="decisions" wire:model.defer="leftMotionForm.decisions" @if($leftMotionFormStatus=="readonly" ) disabled @endif class="custom-select motion-form-select ">
                                    <option></option>
                                    <option value="Granted">Granted</option>
                                    <option value="Denied">Denied</option>
                                    <option value="Partially Granted">Partially Granted</option>
                                    <option value="Partially Denied">Partially Denied</option>
                                    <option value="On Submission">On Submission</option>
                                    <option value="Withdrawn">Withdrawn</option>
                                    <option value="Stipulation">Stipulation</option>
                                    <option value="Appeal">Appeal</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row col-4">
                            <label for="decision_date" class="col-4 col-form-label">Decision Date</label>
                            <div class="col-7">
                                <input id="decision_date" @if($leftMotionFormStatus=="readonly" ) readonly @endif name="decision_date" wire:model.defer="leftMotionForm.decision_date" type="text" class="form-control motion-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-4">
                            <label for="prima_facie" class="col-4 col-form-label">Prima Facie</label>
                            <div class="col-7 other-select-div">
                                <select data-model="leftMotionForm.prima_facie" id="prima_facie" name="prima_facie" wire:model.defer="leftMotionForm.prima_facie" @if($leftMotionFormStatus=="readonly" ) disabled @endif class="custom-select motion-form-select ">
                                    <option></option>
                                    <option value="Both">Both</option>
                                    <option value="P-PF">P-PF</option>
                                    <option value="P-PF">D-PF</option>
                                    <option value="No-PF">No-PF</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row col-4">
                            <label for="judge" class="col-4 col-form-label">Judge</label>
                            <div class="col-7 other-select-div">
                                <select data-model="leftMotionForm.judge" id="judge" name="judge" wire:model.defer="leftMotionForm.judge" @if($leftMotionFormStatus=="readonly" ) disabled @endif class="custom-select motion-form-select ">
                                    <option></option>
                                    @foreach($judges as $judge)
                                    <option value="{{$judge->id}}">{{$judge->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row col-4">
                            <label for="part" class="col-4 col-form-label">Part</label>
                            <div class="col-7">
                                <input id="part" @if($leftMotionFormStatus=="readonly" ) readonly @endif name="part" wire:model.defer="leftMotionForm.part" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row col-4">
                            <label for="noe_date" class="col-4 col-form-label">Motion NOE Date</label>
                            <div class="col-7">
                                <input id="noe_date" @if($leftMotionFormStatus=="readonly" ) readonly @endif name="noe_date" wire:model.defer="leftMotionForm.noe_date" type="text" class="form-control motion-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    @if(!empty($basic_intake_id))
                    <div class="form-edit-button general-form-edit">
                        <div class="form-group row">

                            <div class=" col-3 submit-button">
                                <button id="save-left-button" @if($leftMotionFormStatus=="readonly" ) disabled @endif type="submit" class="btn btn-dark">Save
                                    Changes</button>
                            </div>
                            <div class="add-del-button col-4">
                                @if($leftMotionFormStatus=="readonly")
                                <button type="button" wire:click.prevent="addNewMotion('left')" id="add-left-button" class="btn d-flex  justify-content-between"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0_956_2256)">
                                            <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z" fill="#1B1D21" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_956_2256">
                                                <rect width="24" height="24" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg> Add</button>
                                <button wire:click.prevent="editableMotion('left')" @if(empty($motion_id)) disabled @endif id="update-left-button" type="button" class="btn d-flex  justify-content-between"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0_956_2256)">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z" fill="#1B1D21" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_956_2256">
                                                <rect width="24" height="24" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg> Update</button>
                                <button type="button" @if(empty($motion_id)) disabled @endif class="btn d-flex  justify-content-between"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z" fill="#1B1D21" />
                                    </svg> Delete</button>
                                @else
                                <button id="cancel-left-button" wire:click.prevent="readonlyMotion('left')" type="button" class="btn btn-dark">Cancel</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                </form>
            </div>
        </div>
        @if(!empty($motion_id))
        <div class="row">
            <div class="col-md-2">
                <button type="button" class="btn sky-btn" wire:click.prevent="addNewMotion('right')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_956_2256)">
                            <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z" fill="#1B1D21"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0_956_2256">
                                <rect width="24" height="24" fill="white"></rect>
                            </clipPath>
                        </defs>
                    </svg> Add Motion Adj.</button>
            </div>
            <div class="col-md-10">
            </div>
        </div>
        <div class="table-responsive basic-inteke-table py-3">
            <table class="table accordion bill-data-table-d ">
                <thead>
                    <tr>
                        <th scope="col">Adj. Date</th>
                        <th scope="col">Time On</th>
                        <th scope="col">Calendar #</th>
                        <th scope="col">X-Mot. Due</th>
                        <th scope="col">X-Mot. Filed</th>
                        <th scope="col">Opp Due</th>
                        <th scope="col">Opp Filed</th>
                        <th scope="col">Reply Due</th>
                        <th scope="col">Reply Filed</th>
                        <th scope="col">X-Mot. Reply Due</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($motions as $motion)
                    @if($motion->id==$motion_id)
                    @foreach($motion->adjourneds as $adjmotion)
                    <tr>
                        <td>{{$adjmotion->adj_date}}</td>
                        <td>{{$adjmotion->time_on}}</td>
                        <td>{{$adjmotion->calender}}</td>
                        <td>{{$adjmotion->x_mot_due}}</td>
                        <td>{{$adjmotion->x_mot_filed}}</td>
                        <td>{{$adjmotion->opp_due}}</td>
                        <td>{{$adjmotion->opp_filed}}</td>
                        <td>{{$adjmotion->reply_due}}</td>
                        <td>{{$adjmotion->reply_filed}}</td>
                        <td>{{$adjmotion->x_mot_reply_due}}</td>
                        <td><button class="btn btn-sm btn-dark" wire:click.prevent="editAdjMotion({{$adjmotion['id']}})" type="button" id="view-motion-{{$motion['id']}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z" fill="white" />
                                </svg></button>
                            <button class="btn btn-sm sky-btn" id="delete-adjmotion-{{$adjmotion['id']}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z" fill="#1B1D21" />
                                </svg> </button>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    @endif
    @if($trialVisible)
    <div class="basic-detail-form-wrap py-3">
        <div class="row">
            <div class="basic-detail-general col-12">
                <form class="patient-info-detail-form" wire:submit.prevent="submitLeftTrialForm">

                    <div class="row">
                        <h5>Trial</h5>
                        <div class="form-group row col-4">
                            <label for="not_filed" class="col-4 col-form-label">Not Filed</label>
                            <div class="col-7">
                                <input id="not_filed" @if($leftTrialFormStatus=="readonly" ) readonly @endif name="not_filed" wire:model.defer="leftTrialForm.not_filed" type="text" class="form-control motion-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-4">
                            <label for="not_received" class="col-4 col-form-label">NOT Received</label>
                            <div class="col-7">
                                <input id="not_received" @if($leftTrialFormStatus=="readonly" ) readonly @endif name="not_received" wire:model.defer="leftTrialForm.not_received" type="text" class="form-control motion-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-4">
                            <label for="deadline" class="col-4 col-form-label">90-Day Deadline</label>
                            <div class="col-7">
                                <input id="deadline" @if($leftTrialFormStatus=="readonly" ) readonly @endif name="deadline" wire:model.defer="leftTrialForm.deadline" type="text" class="form-control motion-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-4">
                            <label for="sjm_deadline" class="col-4 col-form-label">SJM Deadline</label>
                            <div class="col-7">
                                <input id="sjm_deadline" @if($leftTrialFormStatus=="readonly" ) readonly @endif name="sjm_deadline" wire:model.defer="leftTrialForm.sjm_deadline" type="text" class="form-control motion-form-datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row col-4">
                            <label for="trial_decision" class="col-4 col-form-label">Trial Decision</label>
                            <div class="col-7 other-select-div">
                                <select data-model="leftTrialForm.trial_decision" id="trial_decision" name="trial_decision" wire:model.defer="leftTrialForm.trial_decision" @if($leftTrialFormStatus=="readonly" ) disabled @endif class="custom-select motion-form-select ">
                                    <option></option>
                                    <option value="Won">Won</option>
                                    <option value="Part. Won">Part. Won</option>
                                    <option value="Lost">Lost</option>
                                    <option value="Reserved">Reserved</option>
                                    <option value="Marked Off">Marked Off</option>
                                    <option value="Settled">Settled</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row col-4">
                            <label for="trial_noe_date" class="col-4 col-form-label">Trial NOE Date</label>
                            <div class="col-7">
                                <input id="trial_noe_date" @if($leftTrialFormStatus=="readonly" ) readonly @endif name="trial_noe_date" wire:model.defer="leftTrialForm.trial_noe_date" type="text" class="form-control motion-form-datepicker trial_noe_date" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    @if(!empty($basic_intake_id))
                    <div class="form-edit-button general-form-edit">
                        <div class="form-group row">

                            <div class=" col-3 submit-button">
                                <button id="save-left-button" @if($leftTrialFormStatus=="readonly" ) disabled @endif type="submit" class="btn btn-dark">Save
                                    Changes</button>
                            </div>
                            <div class="add-del-button col-4">
                                @if($leftTrialFormStatus=="readonly")
                                <button wire:click.prevent="editableTrial('left')"  id="update-left-button" type="button" class="btn d-flex  justify-content-between"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0_956_2256)">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z" fill="#1B1D21" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_956_2256">
                                                <rect width="24" height="24" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg> Update</button>
                                <button type="button" @if(empty($trial_id)) disabled @endif class="btn d-flex  justify-content-between"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z" fill="#1B1D21" />
                                    </svg> Delete</button>
                                @else
                                <button id="cancel-left-button" wire:click.prevent="readonlyTrial('left')" type="button" class="btn btn-dark">Cancel</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                </form>
            </div>

        </div>
        @if(!empty($trial_id))
        <div class="row">
            <div class="col-md-2">
                <button type="button" class="btn sky-btn" wire:click.prevent="addNewTrial('right')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_956_2256)">
                            <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z" fill="#1B1D21"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0_956_2256">
                                <rect width="24" height="24" fill="white"></rect>
                            </clipPath>
                        </defs>
                    </svg> Add Trial Date</button>
            </div>
            <div class="col-md-10">
            </div>
        </div>
        <div class="table-responsive basic-inteke-table py-3">
            <table class="table accordion bill-data-table-d ">
                <thead>
                    <tr>
                        <th scope="col">Trial Date</th>
                        <th scope="col">Time On</th>
                        <th scope="col">Calendar #</th>
                        <th scope="col">Prima Facie</th>
                        <th scope="col">Judge Assigned</th>
                        <th scope="col">Plaintiff Witness</th>
                        <th scope="col">Defense Witness</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($trialDates))
                    @foreach($trialDates as $trial_date)
                    <tr>
                        <td>{{$trial_date->trial_date}}</td>
                        <td>{{$trial_date->time_on}}</td>
                        <td>{{$trial_date->calender}}</td>
                        <td>{{$trial_date->prima_facie}}</td>
                        <td>{{$trial_date->judgeData?->name}}</td>
                        <td>{{$trial_date->plaintiff_witness}}</td>
                        <td>{{$trial_date->defence_witness}}</td>
                        <td><button class="btn btn-sm btn-dark" wire:click.prevent="editTrialDate({{$trial_date['id']}})" type="button" id="view-trial-{{$trial_date['id']}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z" fill="white" />
                                </svg></button>
                            <button class="btn btn-sm sky-btn" id="delete-trial_date-{{$trial_date['id']}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z" fill="#1B1D21" />
                                </svg> </button>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        @endif
    </div>
    @endif
    @if($arbsVisible)
    <div class="basic-detail-form-wrap py-3">
        <div class="row">
            <div class="col-md-2">
                <button type="button" class="btn sky-btn" wire:click.prevent="addNewArbitation"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_956_2256)">
                            <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z" fill="#1B1D21"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0_956_2256">
                                <rect width="24" height="24" fill="white"></rect>
                            </clipPath>
                        </defs>
                    </svg> Add Arbitration</button>
            </div>
            <div class="col-md-10">
            </div>
        </div>
        @if(!empty($arbitrations))
        <div class="table-responsive basic-inteke-table py-3">
            <table class="table accordion bill-data-table-d ">
                <thead>
                    <tr>
                        <th scope="col">Arbitration Date</th>
                        <th scope="col">Arbitrator</th>
                        <th scope="col">Rebuttal Uploaded</th>
                        <th scope="col">Arbitration Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($arbitrations as $arb)
                    <tr>
                        <td>{{$arb->arbitration_date}}</td>
                        <td>{{$arb->arbitratorData?->name}}</td>
                        <td>{{$arb->rebutal_uploaded}}</td>
                        <td>{{$arb->arbitration_status}}</td>
                        <td><button class="btn btn-sm btn-dark" wire:click.prevent="editArbitration({{$arb['id']}})" type="button" id="view-arb-{{$arb['id']}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z" fill="white" />
                                </svg></button>
                            <button class="btn btn-sm sky-btn" id="delete-arb-{{$arb['id']}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z" fill="#1B1D21" />
                                </svg> </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    @endif
    @if($appealsVisible)
    <div class="basic-detail-form-wrap py-3">
        <div class="row">
            <div class="col-md-2">
                <button type="button" class="btn sky-btn" wire:click.prevent="addNewAppeal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_956_2256)">
                            <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z" fill="#1B1D21"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0_956_2256">
                                <rect width="24" height="24" fill="white"></rect>
                            </clipPath>
                        </defs>
                    </svg> Add Appeal</button>
            </div>
            <div class="col-md-10">
            </div>
        </div>
        @if(!empty($appeals))
        <div class="table-responsive basic-inteke-table py-3">
            <table class="table accordion bill-data-table-d ">
                <thead>
                    <tr>
                        <th scope="col">NOA Deadline</th>
                        <th scope="col">NOA Filed</th>
                        <th scope="col">Appeal Type</th>
                        <th scope="col">Appeal Docket #</th>
                        <th scope="col">Appeal By</th>
                        <th scope="col">App. Brief Due</th>
                        <th scope="col">App. Brief Filed</th>
                        <th scope="col">App. Response Due</th>
                        <th scope="col">App. Response Filed</th>
                        <th scope="col">App. Reply Due</th>
                        <th scope="col">App. Reply Filed</th>
                        <th scope="col">CAMP Date</th>
                        <th scope="col">CAMP Time</th>
                        <th scope="col">CAMP Location</th>
                        <th scope="col">Oral Argument Date</th>
                        <th scope="col">Master Arbitrator</th>
                        <th scope="col">App. Decision/Results</th>
                        <th scope="col">Notes</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appeals as $app)
                    <tr>
                        <td>{{$app->noa_deadline}}</td>
                        <td>{{$app->noa_filed}}</td>
                        <td>{{$app->appeal_type}}</td>
                        <td>{{$app->appeal_docket}}</td>
                        <td>{{$app->appeal_by}}</td>
                        <td>{{$app->app_brief_due}}</td>
                        <td>{{$app->app_brief_filed}}</td>
                        <td>{{$app->app_response_due}}</td>
                        <td>{{$app->app_response_filed}}</td>
                        <td>{{$app->app_reply_due}}</td>
                        <td>{{$app->app_reply_filed}}</td>
                        <td>{{$app->camp_date}}</td>
                        <td>{{$app->camp_time}}</td>
                        <td>{{$app->camp_location}}</td>
                        <td>{{$app->oral_argument_date}}</td>
                        <td>{{$app->master_arbitrator}}</td>
                        <td>{{$app->app_decision}}</td>
                        <td>{{$app->notes}}</td>
                        <td><button class="btn btn-sm btn-dark" wire:click.prevent="editAppeal({{$app['id']}})" type="button" id="view-app-{{$app['id']}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z" fill="white" />
                                </svg></button>
                            <button class="btn btn-sm sky-btn" id="delete-app-{{$app['id']}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z" fill="#1B1D21" />
                                </svg> </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    @endif
    <div class="modal fade" id="adj-motion-popup" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
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
                                <form wire:submit.prevent="submitRightMotionForm" id="adjMotionForm">
                                    <div class="form-fields row">
                                        <div class="form-group row col-6">
                                            <label for="adj_date" class="col-4 col-form-label">Adj. Date</label>
                                            <div class="col-7">
                                                <input id="adj_date" @if($rightMotionFormStatus=="readonly" ) readonly @endif name="adj_date" wire:model.defer="rightMotionForm.adj_date" type="text" class="form-control motion-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="time_on" class="col-4 col-form-label">Time On</label>
                                            <div class="col-7 other-select-div">
                                                <select id="time_on" name="time_on" wire:model.defer="rightMotionForm.time_on" @if($rightMotionFormStatus=="readonly" ) disabled @endif class="custom-select motion-modal-select ">
                                                    <option></option>
                                                    <option value="1st Time">1st Time</option>
                                                    <option value="2nd Time">2nd Time</option>
                                                    <option value="3rd Time">3rd Time</option>
                                                    <option value="4th Time">4th Time</option>
                                                    <option value="5th Time">5th Time</option>
                                                    <option value="6th Time">6th Time</option>
                                                    <option value="Final">Final</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="calender" class="col-4 col-form-label">Calender</label>
                                            <div class="col-7">
                                                <input id="calender" @if($rightMotionFormStatus=="readonly" ) readonly @endif name="calender" wire:model.defer="rightMotionForm.calender" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="x_mot_due" class="col-4 col-form-label">X-Mot. Due</label>
                                            <div class="col-7">
                                                <input id="x_mot_due" @if($rightMotionFormStatus=="readonly" ) readonly @endif name="x_mot_due" wire:model.defer="rightMotionForm.x_mot_due" type="text" class="form-control motion-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="x_mot_filed" class="col-4 col-form-label">X-Mot. Filed</label>
                                            <div class="col-7">
                                                <input id="x_mot_filed" @if($rightMotionFormStatus=="readonly" ) readonly @endif name="x_mot_filed" wire:model.defer="rightMotionForm.x_mot_filed" type="text" class="form-control motion-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="opp_due" class="col-4 col-form-label">Opp Due</label>
                                            <div class="col-7">
                                                <input id="opp_due" @if($rightMotionFormStatus=="readonly" ) readonly @endif name="opp_due" wire:model.defer="rightMotionForm.opp_due" type="text" class="form-control motion-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="opp_filed" class="col-4 col-form-label">Opp Filed</label>
                                            <div class="col-7">
                                                <input id="opp_filed" @if($rightMotionFormStatus=="readonly" ) readonly @endif name="opp_filed" wire:model.defer="rightMotionForm.opp_filed" type="text" class="form-control motion-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="reply_due" class="col-4 col-form-label">Reply Due</label>
                                            <div class="col-7">
                                                <input id="reply_due" @if($rightMotionFormStatus=="readonly" ) readonly @endif name="reply_due" wire:model.defer="rightMotionForm.reply_due" type="text" class="form-control motion-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="reply_filed" class="col-4 col-form-label">Reply Filed</label>
                                            <div class="col-7">
                                                <input id="reply_filed" @if($rightMotionFormStatus=="readonly" ) readonly @endif name="reply_filed" wire:model.defer="rightMotionForm.reply_filed" type="text" class="form-control motion-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="x_mot_reply_due" class="col-4 col-form-label">X-Mot. Reply Due</label>
                                            <div class="col-7">
                                                <input id="x_mot_reply_due" @if($rightMotionFormStatus=="readonly" ) readonly @endif name="x_mot_reply_due" wire:model.defer="rightMotionForm.x_mot_reply_due" type="text" class="form-control motion-form-datepicker" autocomplete="off">
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
    <div class="modal fade" id="trial-date-popup" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Trial Date</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="add-bill-popup-form-wrap">
                        <div class="add-bill-popup-form-inner">
                            <div class="add-bill-popup-form">
                                <form wire:submit.prevent="submitRightTrialForm" id="trialDateForm">
                                    <div class="form-fields row">
                                        <div class="form-group row col-6">
                                            <label for="trial_date" class="col-4 col-form-label">Trial Date</label>
                                            <div class="col-7">
                                                <input id="trial_date" @if($rightTrialFormStatus=="readonly" ) readonly @endif name="trial_date" wire:model.defer="rightTrialForm.trial_date" type="text" class="form-control motion-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="time_on" class="col-4 col-form-label">Time On</label>
                                            <div class="col-7 other-select-div">
                                                <select id="time_on" name="time_on" wire:model.defer="rightTrialForm.time_on" @if($rightTrialFormStatus=="readonly" ) disabled @endif class="custom-select trial-modal-select ">
                                                    <option></option>
                                                    <option value="1st Time">1st Time</option>
                                                    <option value="2nd Time">2nd Time</option>
                                                    <option value="3rd Time">3rd Time</option>
                                                    <option value="4th Time">4th Time</option>
                                                    <option value="5th Time">5th Time</option>
                                                    <option value="6th Time">6th Time</option>
                                                    <option value="2nd Final">2nd Final</option>
                                                    <option value="3rd Final">3rd Final</option>
                                                    <option value="4th Final">4th Final</option>
                                                    <option value="5th Final">5th Final</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="calender" class="col-4 col-form-label">Calendar #</label>
                                            <div class="col-7">
                                                <input id="calender" @if($rightTrialFormStatus=="readonly" ) readonly @endif name="calender" wire:model.defer="rightTrialForm.calender" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="prima_facie" class="col-4 col-form-label">Prima Facie</label>
                                            <div class="col-7 other-select-div">
                                                <select id="prima_facie" name="prima_facie" wire:model.defer="rightTrialForm.prima_facie" @if($rightTrialFormStatus=="readonly" ) disabled @endif class="custom-select trial-modal-select ">
                                                    <option></option>
                                                    <option value="Both">Both</option>
                                                    <option value="P-PF">P-PF</option>
                                                    <option value="P-PF">D-PF</option>
                                                    <option value="No-PF">No-PF</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="judge" class="col-4 col-form-label">Judge Assigned</label>
                                            <div class="col-7 other-select-div">
                                                <select id="judge" name="judge" wire:model.defer="rightTrialForm.judge" @if($rightTrialFormStatus=="readonly" ) disabled @endif class="custom-select trial-modal-select ">
                                                    <option></option>
                                                    @foreach($judges as $judge)
                                                    <option value="{{$judge->id}}">{{$judge->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="plaintiff_witness" class="col-4 col-form-label">Plaintiff Witness</label>
                                            <div class="col-7">
                                                <input id="plaintiff_witness" @if($rightTrialFormStatus=="readonly" ) readonly @endif name="plaintiff_witness" wire:model.defer="rightTrialForm.plaintiff_witness" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="defence_witness" class="col-4 col-form-label">Defense Witness</label>
                                            <div class="col-7">
                                                <input id="defence_witness" @if($rightTrialFormStatus=="readonly" ) readonly @endif name="defence_witness" wire:model.defer="rightTrialForm.defence_witness" type="text" class="form-control">
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
    <div class="modal fade" id="arbitration-popup" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Arbitration</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="add-bill-popup-form-wrap">
                        <div class="add-bill-popup-form-inner">
                            <div class="add-bill-popup-form">
                                <form wire:submit.prevent="submitArbitrationForm" id="arbitrationForm">
                                    <div class="form-fields row">
                                        <div class="form-group row col-6">
                                            <label for="arbitration_date" class="col-4 col-form-label">Arbitration Date</label>
                                            <div class="col-7">
                                                <input id="arbitration_date" name="arbitration_date" wire:model.defer="arbitrationForm.arbitration_date" type="text" class="form-control arbitration-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="arbitrator" class="col-4 col-form-label">Arbitator</label>
                                            <div class="col-7 other-select-div">
                                                <select id="arbitrator" name="arbitrator" wire:model.defer="arbitrationForm.arbitrator" class="custom-select arbitration-form-select ">
                                                    <option></option>
                                                    @foreach($arbitration_data as $res)
                                                    <option value="{{$res['id']}}">{{$res['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="rebutal_uploaded" class="col-4 col-form-label">Rebuttal Uploaded</label>
                                            <div class="col-7">
                                                <input id="rebutal_uploaded" name="rebutal_uploaded" wire:model.defer="arbitrationForm.rebutal_uploaded" type="text" class="form-control arbitration-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="arbitration_status" class="col-4 col-form-label">Arbitation Status</label>
                                            <div class="col-7 other-select-div">
                                                <select id="arbitration_status" name="arbitration_status" wire:model.defer="arbitrationForm.arbitration_status" class="custom-select arbitration-form-select ">
                                                    <option></option>
                                                    <option value="Active">Active</option>
                                                    <option value="Settled">Settled</option>
                                                    <option value="Withdraw W/out Prejudice">Withdraw W/out Prejudice</option>
                                                    <option value="Withdrawn W/ Prejudice">Withdrawn W/ Prejudice</option>
                                                    <option value="Decision - Won">Decision - Won</option>
                                                    <option value="Decision - Won Partial">Decision - Won Partial</option>
                                                    <option value="Decision - Lost">Decision - Lost</option>
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
    <div class="modal fade" id="appeal-popup" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Appeal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="add-bill-popup-form-wrap">
                        <div class="add-bill-popup-form-inner">
                            <div class="add-bill-popup-form">
                                <form wire:submit.prevent="submitAppealForm" id="appealForm">
                                    <div class="form-fields row">
                                        <div class="form-group row col-6">
                                            <label for="noa_deadline" class="col-4 col-form-label">NOA Deadline</label>
                                            <div class="col-7">
                                                <input id="noa_deadline" name="noa_deadline" wire:model.defer="appealForm.noa_deadline" type="text" class="form-control appeal-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="noa_filed" class="col-4 col-form-label">NOA Filed</label>
                                            <div class="col-7">
                                                <input id="noa_filed" name="noa_filed" wire:model.defer="appealForm.noa_filed" type="text" class="form-control appeal-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="appeal_type" class="col-4 col-form-label">Appeal Type</label>
                                            <div class="col-7 other-select-div">
                                                <select id="appeal_type" name="appeal_type" wire:model.defer="appealForm.appeal_type" class="custom-select appeal-form-select ">
                                                    <option></option>
                                                    <option value="D-SJMC">D-SJMC</option>
                                                    <option value="P-SJM">P-SJM</option>
                                                    <option value="D-CMPL">D-CMPL</option>
                                                    <option value="D-CMPL">D-CMPL</option>
                                                    <option value="P-DFLT JGMT">P-DFLT JGMT</option>
                                                    <option value="D-DISM">D-DISM</option>
                                                    <option value="D-OSC">D-OSC</option>
                                                    <option value="P-RSTR">P-RSTR</option>
                                                    <option value="P-VAC NOT">P-VAC NOT</option>
                                                    <option value="D-VAC NOT">D-VAC NOT</option>
                                                    <option value="P-REA">P-REA</option>
                                                    <option value="D-REA">D-REA</option>
                                                    <option value="P-REN">P-REN</option>
                                                    <option value="D-REN">D-REN</option>
                                                    <option value="P-STK">P-STK</option>
                                                    <option value="D-STK">D-STK</option>
                                                    <option value="D-CNSLD">D-CNSLD</option>
                                                    <option value="P-CNSLD">P-CNSLD</option>
                                                    <option value="D-SVR">D-SVR</option>
                                                    <option value="P-SVR">P-SVR</option>
                                                    <option value="P-VAC">P-VAC</option>
                                                    <option value="D-VAC">D-VAC</option>
                                                    <option value="P-AMND">P-AMND</option>
                                                    <option value="D-AMND">D-AMND</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="appeal_docket" class="col-4 col-form-label">Appeal Docket #</label>
                                            <div class="col-7">
                                                <input id="appeal_docket" name="appeal_docket" wire:model.defer="appealForm.appeal_docket" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="appeal_by" class="col-4 col-form-label">Appeal Type</label>
                                            <div class="col-7 other-select-div">
                                                <select id="appeal_by" name="appeal_by" wire:model.defer="appealForm.appeal_by" class="custom-select appeal-form-select ">
                                                    <option></option>
                                                    <option value="P-Prov">P-Prov</option>
                                                    <option value="P-Ins">P-Ins</option>
                                                    <option value="D-Prov">D-Prov</option>
                                                    <option value="D-Ins. Co.">D-Ins. Co.</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="app_brief_due" class="col-4 col-form-label">App. Brief Due</label>
                                            <div class="col-7">
                                                <input id="app_brief_due" name="app_brief_due" wire:model.defer="appealForm.app_brief_due" type="text" class="form-control appeal-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="app_brief_filed" class="col-4 col-form-label">App. Brief Filed</label>
                                            <div class="col-7">
                                                <input id="app_brief_filed" name="app_brief_filed" wire:model.defer="appealForm.app_brief_filed" type="text" class="form-control appeal-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="app_response_due" class="col-4 col-form-label">App. Response Due</label>
                                            <div class="col-7">
                                                <input id="app_response_due" name="app_response_due" wire:model.defer="appealForm.app_response_due" type="text" class="form-control appeal-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="app_response_filed" class="col-4 col-form-label">App. Response Filed</label>
                                            <div class="col-7">
                                                <input id="app_response_filed" name="app_response_filed" wire:model.defer="appealForm.app_response_filed" type="text" class="form-control appeal-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="app_reply_due" class="col-4 col-form-label">App. Reply Due</label>
                                            <div class="col-7">
                                                <input id="app_reply_due" name="app_reply_due" wire:model.defer="appealForm.app_reply_due" type="text" class="form-control appeal-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="app_reply_filed" class="col-4 col-form-label">App. Reply Filed</label>
                                            <div class="col-7">
                                                <input id="app_reply_filed" name="app_reply_filed" wire:model.defer="appealForm.app_reply_filed" type="text" class="form-control appeal-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="camp_date" class="col-4 col-form-label">CAMP Date</label>
                                            <div class="col-7">
                                                <input id="camp_date" name="camp_date" wire:model.defer="appealForm.camp_date" type="text" class="form-control appeal-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="camp_time" class="col-4 col-form-label">CAMP Time</label>
                                            <div class="col-7">
                                                <input id="camp_time" name="camp_time" wire:model.defer="appealForm.camp_time" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="camp_location" class="col-4 col-form-label">CAMP Location</label>
                                            <div class="col-7 other-select-div">
                                                <select id="camp_location" name="camp_location" wire:model.defer="appealForm.camp_location" class="custom-select appeal-form-select ">
                                                    <option></option>
                                                    <option value="Kings">Kings</option>
                                                    <option value="Nassau">Nassau</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="oral_argument_date" class="col-4 col-form-label">Oral Argument Date</label>
                                            <div class="col-7">
                                                <input id="oral_argument_date" name="oral_argument_date" wire:model.defer="appealForm.oral_argument_date" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="master_arbitrator" class="col-4 col-form-label">Master Arbitrator</label>
                                            <div class="col-7">
                                                <input id="master_arbitrator" name="master_arbitrator" wire:model.defer="appealForm.master_arbitrator" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="app_decision" class="col-4 col-form-label">App. Decision/Results</label>
                                            <div class="col-7 other-select-div">
                                                <select id="app_decision" name="app_decision" wire:model.defer="appealForm.app_decision" class="custom-select appeal-form-select ">
                                                    <option></option>
                                                    <option value="Won- Reversed">Won- Reversed</option>
                                                    <option value="Won- Affirmed">Won- Affirmed</option>
                                                    <option value="Lost- Reversed">Lost- Reversed</option>
                                                    <option value="Lost- Affirmed">Lost- Affirmed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row col-12">
                                            <label for="notes" class="col-4 col-form-label">Notes</label>
                                            <div class="col-7">
                                                <textarea id="notes" wire:model.defer="appealForm.notes" name="notes" cols="30" rows="2" class="form-control"> </textarea>
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
        window.addEventListener('saveAdjMotion', event => {

            $('#adj-motion-popup').modal("hide");
        })

        window.addEventListener('addAdjMotion', event => {
            $("#adjMotionForm")[0].reset()
            $('#adj-motion-popup').modal("show");
        })

        window.addEventListener('editAdjMotion', event => {
            $('#adj-motion-popup').modal("show");
        })

        window.addEventListener('saveTrialDate', event => {

            $('#trial-date-popup').modal("hide");
        })

        window.addEventListener('addTrialDate', event => {
            $("#trialDateForm")[0].reset()
            $('#trial-date-popup').modal("show");
        })

        window.addEventListener('editTrialDate', event => {
            $('#trial-date-popup').modal("show");
        })

        window.addEventListener('saveTrialDate', event => {

            $('#trial-date-popup').modal("hide");
        })

        window.addEventListener('addArbitration', event => {
            $("#arbitrationForm")[0].reset()
            $('#arbitration-popup').modal("show");
        })

        window.addEventListener('editArbitration', event => {
            $('#arbitration-popup').modal("show");
        })

        window.addEventListener('saveArbitration', event => {

            $('#arbitration-popup').modal("hide");
        })

        window.addEventListener('addAppeal', event => {

            $("#appealForm")[0].reset()
            $('#appeal-popup').modal("show");
            var dateArray = [];
            $(".motion_noe_date").each(function() {
                var val = $(this).text();
                if (val != "") {
                    dateArray.push(val)
                }
            });
            $(".trial_noe_date").each(function() {
                var val = $(this).val();
                if (val != "") {
                    dateArray.push(val)
                }
            });

            if (dateArray.length > 0) {
                format = 'M/D/YY',
                    minDate = moment(dateArray[0], format),
                    minDateKey = 0;

                for (var i = 1; i < dateArray.length; i++) {
                    var date = moment(dateArray[i], format);
                    if (minDate < date) {
                        minDate = date;
                        minDateKey = i;
                    }
                }
                $("#noa_deadline").val(moment(minDate, 'M/D/YY').add(30, 'days').format('M/D/YY')).trigger("change");
                @this.set($("#noa_deadline").attr("wire:model.defer"), $("#noa_deadline").val(), true);

            }

        })

        window.addEventListener('editAppeal', event => {
            $('#appeal-popup').modal("show");
        })

        window.addEventListener('saveAppeal', event => {

            $('#appeal-popup').modal("hide");
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

        $(document).on('change', '#noa_filed', function() {
            var val = $(this).val();
            if (val != "") {
                $("#app_brief_due").val(moment(val, 'M/D/YY').add(6, 'months').format('M/D/YY')).trigger("change");
            } else {
                $("#app_brief_due").val("").trigger("change");
            }
            @this.set($("#app_brief_due").attr("wire:model.defer"), $("#app_brief_due").val(), true);
        });

        $(document).on('change', '#app_brief_filed', function() {
            var val = $(this).val();
            if (val != "") {
                $("#app_response_due").val(moment(val, 'M/D/YY').add(21, 'days').format('M/D/YY')).trigger("change");
            } else {
                $("#app_response_due").val("").trigger("change");
            }
            @this.set($("#app_response_due").attr("wire:model.defer"), $("#app_response_due").val(), true);
        });

        $(document).on('change', '#app_response_filed', function() {
            var val = $(this).val();
            if (val != "") {
                $("#app_reply_due").val(moment(val, 'M/D/YY').add(7, 'days').format('M/D/YY')).trigger("change");
            } else {
                $("#app_reply_due").val("").trigger("change");
            }
            @this.set($("#app_reply_due").attr("wire:model.defer"), $("#app_reply_due").val(), true);
        });
    });
    document.addEventListener("livewire:load", function(event) {
        Livewire.hook('message.processed', (el, component) => {
            $('.motion-form-select').select2({
                placeholder: 'Select an option',
                matcher: function(params, data) {
                    return matchStart(params, data);
                }
            }).on("change", function(e) {
                var mod = $(e.target).attr('wire:model.defer');
                @this.set(mod, e.target.value, true);


            });
            $('.motion-modal-select').select2({
                placeholder: 'Select an option',
                dropdownParent: $("#adj-motion-popup"),
                matcher: function(params, data) {
                    return matchStart(params, data);
                }

            }).on("change", function(e) {
                var mod = $(e.target).attr('wire:model.defer');
                @this.set(mod, e.target.value, true);


            });

            $('.trial-modal-select').select2({
                placeholder: 'Select an option',
                dropdownParent: $("#trial-date-popup"),
                matcher: function(params, data) {
                    return matchStart(params, data);
                }

            }).on("change", function(e) {
                var mod = $(e.target).attr('wire:model.defer');
                @this.set(mod, e.target.value, true);


            });
            $('.motion-form-datepicker').datetimepicker({
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

            $('.arbitration-form-select').select2({
                placeholder: 'Select an option',
                dropdownParent: $("#arbitration-popup"),
                matcher: function(params, data) {
                    return matchStart(params, data);
                }

            }).on("change", function(e) {
                var mod = $(e.target).attr('wire:model.defer');
                @this.set(mod, e.target.value, true);


            });
            $('.arbitration-form-datepicker').datetimepicker({
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

            $('.appeal-form-select').select2({
                placeholder: 'Select an option',
                dropdownParent: $("#appeal-popup"),
                matcher: function(params, data) {
                    return matchStart(params, data);
                }

            }).on("change", function(e) {
                var mod = $(e.target).attr('wire:model.defer');
                @this.set(mod, e.target.value, true);


            });
            $('.appeal-form-datepicker').datetimepicker({
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

    Livewire.on('addArbitration', () => {
        alert('A post was added with the id of:stId');
    })
</script>
@endpush