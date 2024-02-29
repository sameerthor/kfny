<div>
    <div class="pi_detail_wrap  row py-3">
        <div class="pi_detail  ">
            <div class="pi_detail_one ">
                <div class="pi_detail_list p-1">
                    <span class="pi_detail_label">Index/AAA</span>
                    <span class="pi_detail_text">{{!empty($data)?$data->index_number:'N/A'}}</span>
                </div>
                <div class="pi_detail_list p-1">
                    <span class="pi_detail_label">Status</span>
                    <span
                        class="pi_detail_text ">{{!empty($data)?'':'N/A'}}{{@$data['status']=="1"?"Active":""}}{{@$data['status']=="2"?"Appeal":""}}{{@$data['status']=="3"?"Archived":""}}{{@$data['status']=="4"?"Decison
                            - Denied":""}}{{@$data['status']=="5"?"Decison - Lost":""}}{{@$data['status']=="6"?"Decison -
                            Paid":""}}{{@$data['status']=="7"?"Decison - Trial":""}}</span>
                </div>
                <div class="pi_detail_list p-1">
                    <span class="pi_detail_label">Assignor #</span>
                    <span class="pi_detail_text ">{{!empty($data)?$data['patient_id']:'N/A'}}</span>
                </div>
                <div class="pi_detail_list p-1">
                    <span class="pi_detail_label">Insurance Company</span>
                    <span
                        class="pi_detail_text ">{{!empty($data)?@$data['patient']['insuranceCompany']['name']:'N/A'}}</span>
                </div>
                <div class="pi_detail_list p-1">
                    <span class="pi_detail_label">Provider</span>
                    <span class="pi_detail_text ">{{!empty($data)?@$data['provoiderInformation']['name']:'N/A'}}</span>
                </div>
                <div class="pi_detail_list p-1">
                    <span class="pi_detail_label">Judge</span>
                    <span class="pi_detail_text ">{{!empty($data)?@$data['judge']['name']:'N/A'}}</span>
                </div>
                <div class="pi_detail_list p-1">
                    <span class="pi_detail_label">Total</span>
                    <span class="pi_detail_text ">{{!empty($data)?$data->tableDetails->sum('amount'):'N/A'}}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="pi_advanced_search_and_detail row">
        <div class="pi_advanced_search  row">
            <div class="pi_file_number_and_search col-5">

                <!-- <span class="pi_fil_number_label">File no.</span> -->
                <label for="file_number" class="px-1 d-inline pi_fil_number_label col-2 col-form-label btn sky-btn">File
                    no.</label>
                <!-- <span class="pi_fil_number">27558</span> -->
                <input wire:model.live.debounce.250ms="search" type="text" class="d-inline pi_fil_number mx-1 col-3"
                    id="file_number">
                <label for="index_search"
                    class="px-1 d-inline pi_fil_number_label col-2 col-form-label btn sky-btn">Index
                    no.</label>
                <!-- <span class="pi_fil_number">27558</span> -->
                <input wire:change="updateIndex($event.target.value)" type="text" value="{{@$data['index_number']}}"
                    class="d-inline pi_fil_number mx-1 col-3" id="index_search">
                <button class="pi_fil_search_button  btn btn-dark col-6 d-inline" id="advance-search"
                    aria-controls="patient-info-form-popup"><span class="search_icon"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path
                                d="M12.5233 11.4626L15.7353 14.6746L14.6746 15.7353L11.4626 12.5233C10.3077 13.4473 8.843 14 7.25 14C3.524 14 0.5 10.976 0.5 7.25C0.5 3.524 3.524 0.5 7.25 0.5C10.976 0.5 14 3.524 14 7.25C14 8.843 13.4473 10.3077 12.5233 11.4626ZM11.0185 10.9061C11.9356 9.96095 12.5 8.6717 12.5 7.25C12.5 4.34938 10.1506 2 7.25 2C4.34938 2 2 4.34938 2 7.25C2 10.1506 4.34938 12.5 7.25 12.5C8.6717 12.5 9.96095 11.9356 10.9061 11.0185L11.0185 10.9061Z"
                                fill="white"></path>
                        </svg></span> Advanced Search</button>
                    
            </div>
            <livewire:ligitation.basic-intake.advance-search/>
        </div>
        <div class="table-responsive basic-inteke-table py-3">
            <table class="table accordion bill-data-table-d ">
                <thead>
                    <tr>
                        <th scope="col">File #</th>
                        <th scope="col">Index #</th>
                        <th scope="col">Status</th>
                        <th scope="col">Judge</th>
                        <th scope="col">Provider</th>
                        <th scope="col">Total Out</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siblings as $res)
                    <tr class='clickable-row' wire:click.prevent="changeFile({{$res['id']}})">
                        <td>{{$res['id']}}</td>
                        <td>{{$res['index_number']}}</td>
                        <td>{{$res['status']=="1"?"Active":""}}{{$res['status']=="2"?"Appeal":""}}{{$res['status']=="3"?"Archived":""}}{{$res['status']=="4"?"Decison
                            - Denied":""}}{{$res['status']=="5"?"Decison - Lost":""}}{{$res['status']=="6"?"Decison -
                            Paid":""}}{{$res['status']=="7"?"Decison - Trial":""}}</td>
                        <td>{{@$res['judge']['name']}}</td>
                        <td>{{@$res['provoiderInformation']['name']}}</td>
                        <td>{{$res->tableDetails->sum('amount')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="patient-notes-wrap">
        <div class="patient-notes-inner">
            <div class="d-flex notes-box">
                <div class="form-group  col-6 d-flex">
                    <label for="attorney-notes" class="col-4 col-form-label">Attorney Notes</label>
                    <div class="col-12">
                        <textarea id="attorney-notes"
                            wire:change.defer="updateNotes('attorney_notes',$event.target.value)" name="attorney-notes"
                            cols="30" rows="2"
                            class="form-control"> {{!empty($data)?$data->attorney_notes:""}} </textarea>
                    </div>
                </div>
                <div class="form-group  col-6 d-flex row">
                    <label for="notes" class="col-12 col-form-label">Notes</label>
                    <div class="col-12">
                        <textarea id="notes" wire:change.defer="updateNotes('notes',$event.target.value)" name="notes"
                            cols="30" rows="2" class="form-control"> {{!empty($data)?$data->notes:""}} </textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@push('custom-scripts')
<script>
    $(document).on("click","#advance-search",function(){
        $("#patient-info-form-popup").slideToggle();
    })
</script>    
@endpush