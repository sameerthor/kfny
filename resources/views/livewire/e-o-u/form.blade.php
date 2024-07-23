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
                <input wire:model.live.debounce.250ms="search" type="text" class="d-inline pi_fil_number mx-1 col-2" id="file_number">
                <label for="index_search" class="px-1 d-inline pi_fil_number_label col-1 col-form-label btn sky-btn">Provider
                    no.</label>
                <!-- <span class="pi_fil_number">27558</span> -->
                <input wire:change="updateIndex($event.target.value)" type="text" value="{{@$data['index_number']}}" class="d-inline pi_fil_number mx-1 col-2" id="index_search">
                <button class="pi_fil_search_button  btn btn-dark col-1 d-inline" id="advance-search" aria-controls="patient-info-form-popup"><span class="search_icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M12.5233 11.4626L15.7353 14.6746L14.6746 15.7353L11.4626 12.5233C10.3077 13.4473 8.843 14 7.25 14C3.524 14 0.5 10.976 0.5 7.25C0.5 3.524 3.524 0.5 7.25 0.5C10.976 0.5 14 3.524 14 7.25C14 8.843 13.4473 10.3077 12.5233 11.4626ZM11.0185 10.9061C11.9356 9.96095 12.5 8.6717 12.5 7.25C12.5 4.34938 10.1506 2 7.25 2C4.34938 2 2 4.34938 2 7.25C2 10.1506 4.34938 12.5 7.25 12.5C8.6717 12.5 9.96095 11.9356 10.9061 11.0185L11.0185 10.9061Z" fill="white"></path>
                        </svg></span> Search</button>
                        <div class="col-2"></div>
                        <button class="pi_fil_search_button  btn btn-dark col-2 d-inline" id="advance-search" aria-controls="patient-info-form-popup"><span class="search_icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M12.5233 11.4626L15.7353 14.6746L14.6746 15.7353L11.4626 12.5233C10.3077 13.4473 8.843 14 7.25 14C3.524 14 0.5 10.976 0.5 7.25C0.5 3.524 3.524 0.5 7.25 0.5C10.976 0.5 14 3.524 14 7.25C14 8.843 13.4473 10.3077 12.5233 11.4626ZM11.0185 10.9061C11.9356 9.96095 12.5 8.6717 12.5 7.25C12.5 4.34938 10.1506 2 7.25 2C4.34938 2 2 4.34938 2 7.25C2 10.1506 4.34938 12.5 7.25 12.5C8.6717 12.5 9.96095 11.9356 10.9061 11.0185L11.0185 10.9061Z" fill="white"></path>
                        </svg></span> Advanced Search</button>
                <button class="btn btn-dark col-1" wire:click.prevent="addNew">Add New</button>
            </div>
   
            <livewire:ligitation.basic-intake.advance-search />
        </div>

        <form class="patient-info-detail-form mx-3 mt-3" wire:submit.prevent="submitForm">
            <div class="row">
                <div class="form-group row col-4">
                    <label for="first_name" class="col-4 col-form-label">Insurance Company*</label>
                    <div class="col-7">
                        <input id="first_name" name="first_name" @if($formStatus=="readonly" ) readonly @endif wire:model="leftForm.first_name" type="text" class="form-control">
                    </div>
                </div>

                <div class="form-group row col-4">
                    <label for="first_name" class="col-4 col-form-label">Provider*</label>
                    <div class="col-7">
                        <input id="first_name" name="first_name" @if($formStatus=="readonly" ) readonly @endif wire:model="leftForm.first_name" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row col-4">
                    <label for="first_name" class="col-4 col-form-label">Carier Attorney*</label>
                    <div class="col-7">
                        <input id="first_name" name="first_name" @if($formStatus=="readonly" ) readonly @endif wire:model="leftForm.first_name" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row col-4">
                    <label for="first_name" class="col-4 col-form-label">EOU Status*</label>
                    <div class="col-7">
                        <input id="first_name" name="first_name" @if($formStatus=="readonly" ) readonly @endif wire:model="leftForm.first_name" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row col-4">
                    <label for="first_name" class="col-4 col-form-label">Amount in Dispute</label>
                    <div class="col-7">
                        <input id="first_name" name="first_name" @if($formStatus=="readonly" ) readonly @endif wire:model="leftForm.first_name" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row col-4">
                    <label for="first_name" class="col-4 col-form-label">Dates of Service</label>
                    <div class="col-7">
                        <input id="first_name" name="first_name" @if($formStatus=="readonly" ) readonly @endif wire:model="leftForm.first_name" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row col-4">
                    <label for="first_name" class="col-4 col-form-label">Assignor(s)</label>
                    <div class="col-7">
                        <input id="first_name" name="first_name" @if($formStatus=="readonly" ) readonly @endif wire:model="leftForm.first_name" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row col-4">
                    <label for="first_name" class="col-4 col-form-label">Claim #</label>
                    <div class="col-7">
                        <input id="first_name" name="first_name" @if($formStatus=="readonly" ) readonly @endif wire:model="leftForm.first_name" type="text" class="form-control">
                    </div>
                </div>
            </div>
        </form>
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
                        <td><input @if($formStatus=="readonly" ) readonly @endif type="text" class="form-control"> </td>
                        <td><input @if($formStatus=="readonly" ) readonly @endif type="text" class="form-control"> </td>
                        <td><input @if($formStatus=="readonly" ) readonly @endif type="text" class="form-control"></td>
                        <td><input @if($formStatus=="readonly" ) readonly @endif type="text" class="form-control"></td>
                        <td><input @if($formStatus=="readonly" ) readonly @endif type="text" class="form-control"></td>
                        <td><input @if($formStatus=="readonly" ) readonly @endif type="text" class="form-control"></td>
                        <td><input @if($formStatus=="readonly" ) readonly @endif type="text" class="form-control"></td>
                        <td><input @if($formStatus=="readonly" ) readonly @endif type="text" class="form-control"></td>
                        <td><input @if($formStatus=="readonly" ) readonly @endif type="text" class="form-control"></td>
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
                        <td><input @if($formStatus=="readonly" ) readonly @endif type="text" class="form-control"> </td>
                        <td><input @if($formStatus=="readonly" ) readonly @endif type="text" class="form-control"> </td>
                        <td><input @if($formStatus=="readonly" ) readonly @endif type="text" class="form-control"></td>
                        <td><input @if($formStatus=="readonly" ) readonly @endif type="text" class="form-control"></td>
                        <td><input @if($formStatus=="readonly" ) readonly @endif type="text" class="form-control"></td>
                        <td><input @if($formStatus=="readonly" ) readonly @endif type="text" class="form-control"></td>
                        <td><input @if($formStatus=="readonly" ) readonly @endif type="text" class="form-control"></td>
                        <td><input @if($formStatus=="readonly" ) readonly @endif type="text" class="form-control"></td>
                    </tr>
                </tbody>
            </table>

        </div>
        <form class="patient-info-detail-form mx-3 mt-3" wire:submit.prevent="submitForm">
            <div class="row">
                <div class="form-group row col-4">
                    <label for="first_name" class="col-4 col-form-label">Person Settled with</label>
                    <div class="col-7">
                        <input id="first_name" name="first_name" @if($formStatus=="readonly" ) readonly @endif wire:model="leftForm.first_name" type="text" class="form-control">
                    </div>
                </div>

                <div class="form-group row col-4">
                    <label for="first_name" class="col-4 col-form-label">Settlement Date</label>
                    <div class="col-7">
                        <input id="first_name" name="first_name" @if($formStatus=="readonly" ) readonly @endif wire:model="leftForm.first_name" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row col-4">
                    <label for="first_name" class="col-4 col-form-label">Email Contact</label>
                    <div class="col-7">
                        <input id="first_name" name="first_name" @if($formStatus=="readonly" ) readonly @endif wire:model="leftForm.first_name" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row col-4">
                    <label for="first_name" class="col-4 col-form-label">Phone Contact</label>
                    <div class="col-7">
                        <input id="first_name" name="first_name" @if($formStatus=="readonly" ) readonly @endif wire:model="leftForm.first_name" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row col-4">
                    <label for="first_name" class="col-4 col-form-label"> Principle Settled</label>
                    <div class="col-7">
                        <input id="first_name" name="first_name" @if($formStatus=="readonly" ) readonly @endif wire:model="leftForm.first_name" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row col-4">
                    <label for="first_name" class="col-4 col-form-label">Attorney's Fees Settled</label>
                    <div class="col-7">
                        <input id="first_name" name="first_name" @if($formStatus=="readonly" ) readonly @endif wire:model="leftForm.first_name" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row col-4">
                    <label for="first_name" class="col-4 col-form-label">Principle Received</label>
                    <div class="col-7">
                        <input id="first_name" name="first_name" @if($formStatus=="readonly" ) readonly @endif wire:model="leftForm.first_name" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row col-4">
                    <label for="first_name" class="col-4 col-form-label">Principle Received Date</label>
                    <div class="col-7">
                        <input id="first_name" name="first_name" @if($formStatus=="readonly" ) readonly @endif wire:model="leftForm.first_name" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row col-4">
                    <label for="first_name" class="col-4 col-form-label">Attorney's Fees Received</label>
                    <div class="col-7">
                        <input id="first_name" name="first_name" @if($formStatus=="readonly" ) readonly @endif wire:model="leftForm.first_name" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row col-4">
                    <label for="first_name" class="col-4 col-form-label">Attorney's Fees Received Date
                    </label>
                    <div class="col-7">
                        <input id="first_name" name="first_name" @if($formStatus=="readonly" ) readonly @endif wire:model="leftForm.first_name" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row col-4">
                    <label for="first_name" class="col-4 col-form-label">Notes
                    </label>
                    <div class="col-7">
                        <textarea class="form-control" @if($formStatus=="readonly" ) readonly @endif> </textarea>
                    </div>
                </div>
        </form>
    </div>
</div>