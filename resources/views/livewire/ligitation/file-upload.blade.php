<div class="basic-detail-form-wrap py-3">
    <div class="row">
        <div class="basic-detail-adv col-6">
            <form class="form" id="uploadForm" wire:submit.prevent="submitForm">
                <h5>File Upload</h5>
                <div class="form-data row">
                    <div class="form-group row col-12">
                        <input name="document" required multiple wire:model="documents" type="file" class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="form-edit-button general-form-edit">
                    <div class="form-group row">
                        <div class=" col-3 submit-button">
                            <button type="submit" wire:loading.attr="disabled" class="btn btn-dark">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if(!empty($basic_intake_id))
    <div class="table-responsive basic-inteke-table py-3">
        <table class="table accordion bill-data-table-d ">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">File Name</th>
                    <th scope="col">Upload Date</th>
                    <th scope="col">Actions</th>
            </thead>
            <tbody>
                @if(count($files)>0)
                @foreach($files as $res)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$res->name}}</td>
                    <td>{{$res->created_at}}</td>
                    <td><button class="btn btn-sm btn-dark" wire:loading.attr="disabled" wire:click.prevent="downloadFile({{$res->id}})" type="button" id="view-settlement-check-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z" fill="white"></path>
                            </svg></button>
                        <button class="btn btn-sm sky-btn" onclick="confirm('Are you sure you want to delete this file?') || event.stopImmediatePropagation()" wire:loading.attr="disabled" wire:click.prevent="deleteFile({{$res->id}})" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z" fill="#1B1D21"></path>
                            </svg> </button>
                    </td>
                </tr>
                @endforeach
                @else
                <tr style="text-align: center;">
                    <td colspan="4">No file available.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    @endif
</div>
@push("custom-scripts")
<script>
    window.addEventListener('fileUploaded', event => {

        $('#uploadForm')[0].reset();
    })
</script>
@endpush