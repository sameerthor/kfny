<div>
    <div class="basic-detail-form-wrap py-3">
        <div class="row">
            <div class="basic-detail-general col-8">
                <form class="patient-info-detail-form" wire:submit.prevent="submitLeftForm">
                    <div class="row">
                        <div class="form-group row col-6">
                            <label for="first_name" class="col-4 col-form-label">EIP First
                                Name</label>
                            <div class="col-7">
                                <input id="first_name" 
                                    @if($leftFormStatus=="readonly" ) readonly @endif name="first_name" wire:model="leftForm.first_name" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="last_name" class="col-4 col-form-label">EIP Last
                                Name</label>
                            <div class="col-7">
                                <input id="last_name" name="last_name" wire:model.defer="leftForm.last_name" value="{{@$info['patient']['last_name']}}"
                                    @if($leftFormStatus=="readonly" ) readonly @endif type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="address" class="col-4 col-form-label">Street
                                Address</label>
                            <div class="col-7">
                                <input id="address" value="{{@$info['patient']['address']}}"
                                    @if($leftFormStatus=="readonly" ) readonly @endif name="address" wire:model.defer="leftForm.address"
                                    type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="city" class="col-4 col-form-label">City</label>
                            <div class="col-7">
                                <input id="city" name="city" wire:model.defer="leftForm.city" value="{{@$info['patient']['city']}}"
                                    @if($leftFormStatus=="readonly" ) readonly @endif type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="state" class="col-4 col-form-label">State</label>
                            <div class="col-7">
                                <input id="state" name="state" wire:model.defer="leftForm.state" value="{{@$info['patient']['state']}}"
                                    @if($leftFormStatus=="readonly" ) readonly @endif type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="zip_code" class="col-4 col-form-label">Zip
                                Code</label>
                            <div class="col-7">
                                <input id="zip_code" name="zip_code" wire:model.defer="leftForm.zip_code" value="{{@$info['patient']['zip_code']}}"
                                    @if($leftFormStatus=="readonly" ) readonly @endif type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="doa" class="col-4 col-form-label">DOA</label>
                            <div class="col-7">
                                <input id="doa" name="doa" wire:model.defer="leftForm.doa"
                                    value="{{!empty($info['patient']['doa'])?date('Y-m-d',strtotime($info['patient']['doa'])):''}}"
                                    @if($leftFormStatus=="readonly" ) readonly @endif type="date" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="phone_number" class="col-4 col-form-label">Contact
                                Number</label>
                            <div class="col-7">
                                <input id="phone_number" value="{{@$info['patient']['phone_number']}}"
                                    @if($leftFormStatus=="readonly" ) readonly @endif name="phone_number" wire:model.defer="leftForm.phone_number"
                                    type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="self_insh" class="col-4 col-form-label">Self Insured</label>
                            <div class="col-7">
                                <input id="self_insh" name="self_insh"  value="1" @if(@$info['patient']['self_insh']==1) checked @endif wire:model.defer="leftForm.self_insh"  @if($leftFormStatus=="readonly" )
                                    disabled @endif type="checkbox">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="insured" class="col-4 col-form-label">Insured
                                Name</label>
                            <div class="col-7">
                                <input id="insured" name="insured" wire:model.defer="leftForm.insured"  @if($leftFormStatus=="readonly" )
                                    readonly @endif value="{{@$info['patient']['insured']}}" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="claim_number" class="col-4 col-form-label">Claim
                                No.</label>
                            <div class="col-7">
                                <input id="claim_number" name="claim_number" wire:model.defer="leftForm.claim_number"  value="{{@$info['patient']['claim_number']}}"
                                    @if($leftFormStatus=="readonly" ) readonly @endif type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="policy_number" class="col-4 col-form-label">Policy
                                No.</label>
                            <div class="col-7">
                                <input id="policy_number" name="policy_number" wire:model.defer="leftForm.policy_number" @if($leftFormStatus=="readonly" )
                                    readonly @endif value="{{@$info['patient']['policy_number']}}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                        <label for="eip" class="col-4 col-form-label">EIP</label>
                        <div class="col-7 other-select-div">
                            <select id="eip" name="eip" wire:model.defer="leftForm.eip" @if($leftFormStatus=="readonly" ) disabled @endif
                                class="custom-select">
                                <option  @if(empty(@$info['patient']['eip'])) selected  @endif></option>
                                <option value="policyholder" {{'policyholder'==@$info['patient']['eip']?"selected":""}}>Policyholder</option>
                                <option value="passenger" {{'passenger'==@$info['patient']['eip']?"selected":""}}>Passenger</option>
                                <option value="pedestrian" {{'pedestrian'==@$info['patient']['eip']?"selected":""}}>Pedestrian</option>
                                <option value="other" {{'other'==@$info['patient']['eip']?"selected":""}}>Other</option>
                            </select>
                            <textarea id="textarea" name="other" placeholder="Enter Description for Other..." cols="40"
                                rows="2" class="form-other-txtarea form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row col-6">
                        <label for="insurance_company_id" class="col-4 col-form-label">Insurance
                            Company</label>
                        <div class="col-7">
                            <select id="insurance_company_id" name="insurance_company_id" wire:model.defer="leftForm.insurance_company_id" @if($leftFormStatus=="readonly" ) disabled @endif
                                class="custom-select">
                                <option  @if(empty(@$info['patient']['insurance_company_id'])) selected  @endif>
                                </option>
                                @foreach($insuranceId as $p)
                                <option {{$p['id']==@$info['patient']['insurance_company_id']?"selected":""}}
                                    value="{{ $p['id'] }}">{{
                                    $p['name'] ??
                                    '-'
                                    }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    </div>
                    <div class="form-edit-button general-form-edit">
                        <div class="form-group row">

                            <div class=" col-3 submit-button">
                                <button id="save-left-button" @if($leftFormStatus=="readonly" )  disabled @endif type="submit"
                                 class="btn btn-dark">Save
                                    Changes</button>
                            </div>
                            <div class="add-del-button col-4">
                                @if($leftFormStatus=="readonly")
                                <button type="button" wire:click.prevent="addNew('left')"  id="add-left-button" class="btn d-flex  justify-content-between"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <g clip-path="url(#clip0_956_2256)">
                                            <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z" fill="#1B1D21" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_956_2256">
                                                <rect width="24" height="24" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg> Add</button>
                                <button wire:click.prevent="editable('left')"  @if(empty($patient_id)) disabled @endif id="update-left-button" type="button"
                                    class="btn d-flex  justify-content-between"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0_956_2256)">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"
                                                fill="#1B1D21" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_956_2256">
                                                <rect width="24" height="24" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg> Update</button>
                                <button type="button" @if(empty($info)) disabled @endif
                                    class="btn d-flex  justify-content-between"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z"
                                            fill="#1B1D21" />
                                    </svg> Delete</button>
                                @else
                                <button id="cancel-left-button" wire:click.prevent="readonly('left')" type="button" class="btn btn-dark">Cancel</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="basic-detail-adv col-4">
                <form class="form" wire:submit.prevent="submitRightForm">
                    <div class="form-data row">
                        <div class="form-group row">
                            <label for="is_ligitation" class="col-4 col-form-label">Lit/Arb/DJ</label>
                            <div class="col-7">
                            <select id="is_ligitation" @if($rightFormStatus=="readonly" ) disabled @endif name="is_ligitation" wire:model.defer="rightForm.is_ligitation" class="custom-select">
                            <option @if(empty(@$info['is_ligitation'])) selected  @endif></option>          
              <option {{'2'==@$info['is_ligitation']?"selected":""}} value="2">Arbitrator</option>
              <option {{'1'==@$info['is_ligitation']?"selected":""}} value="1">Ligitation</option>
              <option {{'3'==@$info['is_ligitation']?"selected":""}} value="3">DJ</option>
                        </select>     
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="venue_county" class="col-4 col-form-label">Venue
                                County</label>
                            <div class="col-7">
                                <select id="venue_county" @if($rightFormStatus=="readonly" ) disabled @endif name="venue_county" wire:model.defer="rightForm.venue_county" class="custom-select">
                                <option @if(empty(@$info['venue_county'])) selected  @endif></option>
              @foreach($venueCounty as $p)
              <option {{$p['id']==@$info['venue_county']?"selected":""}} value="{{ $p['id'] }}">{{ $p['venue_name'] ??
                '-' }}
              </option>
              @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adv-venue" class="col-4 col-form-label">Venue</label>
                            <div class="col-7">
                                <input id="adv-venue" @if($rightFormStatus=="readonly" ) readonly @endif value="{{@$info['venue']}}" name="venue" wire:model.defer="rightForm.venue" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adv-file" class="col-4 col-form-label">File</label>
                            <div class="col-7">
                                <input id="adv-file"  readonly name="adv-file" type="text" value="{{@$info['id']}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="index_number" class="col-4 col-form-label">Index
                                ARB</label>
                            <div class="col-7">
                                <input id="index_number" @if($rightFormStatus=="readonly" ) readonly @endif value="{{@$info['index_number']}}" name="index_number" wire:model.defer="rightForm.index_number" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-4 col-form-label">Case
                                Status</label>
                            <div class="col-7">
                                <select id="status" @if($rightFormStatus=="readonly" ) disabled @endif name="status" wire:model.defer="rightForm.status" class="custom-select">
                                <option @if(empty(@$info['status'])) selected  @endif></option>
                                <option {{@$info['status']=="1" ?"selected":""}} value="1">Active</option>
              <option {{@$info['status']=="2" ?"selected":""}} value="2">Appeal</option>
              <option {{@$info['status']=="3" ?"selected":""}} value="3">Archived</option>
              <option {{@$info['status']=="4" ?"selected":""}} value="4">Decison - Denied</option>
              <option {{@$info['status']=="5" ?"selected":""}} value="5">Decison - Lost</option>
              <option {{@$info['status']=="6" ?"selected":""}} value="6">Decison - Paid</option>
              <option {{@$info['status']=="7" ?"selected":""}} value="7">Decison - Trial</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="provider_id" class="col-4 col-form-label">Provider</label>
                            <div class="col-7">
                                <select @if($rightFormStatus=="readonly" ) disabled @endif name="provider_id" wire:model.defer="rightForm.provider_id" class="custom-select">
                                <option @if(empty(@$info['provider_id'])) selected  @endif></option>
                            @foreach($provoiderId as $p)
              <option {{$p['id']==@$info['provider_id']?"selected":""}} value="{{ $p['id'] }}">{{ $p['name'] ?? '-' }}</option>
              @endforeach
              </select>
                                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="carrier_attorney" class="col-4 col-form-label">Carrier’s Attny</label>
                            <div class="col-7">
                                <input id="carrier_attorney" @if($rightFormStatus=="readonly" ) readonly @endif value="{{@$info['carrier_attorney']}}" name="carrier_attorney" wire:model.defer="rightForm.carrier_attorney" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dj_judge_id" class="col-4 col-form-label">DJ
                                Judge</label>
                            <div class="col-7">
                            <select @if($rightFormStatus=="readonly" ) disabled @endif name="dj_judge_id" wire:model.defer="rightForm.dj_judge_id" class="custom-select">
                                <option @if(empty(@$info['dj_judge_id'])) selected  @endif></option>
                            @foreach($judges as $p)
              <option {{$p['id']==@$info['dj_judge_id']?"selected":""}} value="{{ $p['id'] }}">{{ $p['name'] ?? '-' }}</option>
              @endforeach
              </select>                            </div>
                        </div>
                    </div>
                    <div class="form-edit-button adv-form-edit">
                        <div class="form-group row">

                            <div class=" col-4 submit-button">
                                <button id="save-right-button" @if($rightFormStatus=="readonly" )  disabled @endif type="submit"
                                  class="btn btn-dark">Save
                                    Changes</button>
                            </div>
                            <div class="add-del-button col-7 
                            ;J0 Z nb">
                                @if($rightFormStatus=="readonly")
                                <button type="button" wire:click.prevent="addNew('right')" id="add-right-button" class="btn d-flex  justify-content-between"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <g clip-path="url(#clip0_956_2256)">
                                            <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z" fill="#1B1D21" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_956_2256">
                                                <rect width="24" height="24" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg> Add</button>
                                <button wire:click.prevent="editable('right')"  @if(empty($basic_intake_id)) disabled @endif id="update-right-button" type="button"
                                    class="btn d-flex  justify-content-between"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0_956_2256)">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"
                                                fill="#1B1D21" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_956_2256">
                                                <rect width="24" height="24" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg> Update</button>
                                <button type="button" @if(empty($info)) disabled @endif
                                    class="btn d-flex  justify-content-between"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z"
                                            fill="#1B1D21" />
                                    </svg> Delete</button>
                                @else
                                <button id="cancel-right-button" wire:click.prevent="readonly('right')" type="button" class="btn btn-dark">Cancel</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('custom-scripts')
<script>
 $(document).ready(function () {
    $(document).on('change', '#self_insh', function () {
        if(this.checked) {
            $("#insured").val($("#first_name").val()+" "+$("#last_name").val());
    }else{
        $("#insured").val("");
    }
    document.getElementById("insured").dispatchEvent(new Event('input'));

    });
 });
</script>
@endpush                                        