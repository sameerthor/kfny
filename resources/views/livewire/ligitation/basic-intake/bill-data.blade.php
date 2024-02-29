<div>
    <div classs="bill-data-wrap">
        <div class="col-12 patient_info_heading py-3 d-flex align-items-center justify-content-between">
            <h4 class="m-0">Bill Data</h4>
            <div class="bill-edit-buttons">

                <button type="button" wire:click.prevent="addBill()"   @if(empty($basic_intake_id)) disabled @endif id="add-bill"
                     class="btn sky-btn"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_956_2256)">
                            <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z" fill="#1B1D21" />
                        </g>
                        <defs>
                            <clipPath id="clip0_956_2256">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg> Add</button>

            </div>
        </div>
        <div class="bill-data-table-wrap">
            <div class="bill-data-table-button">
            </div>
            <div class="bill-data-table">
                <div class="table-responsive">
                    <table class="table accordion bill-data-table-d">
                        <thead>
                            <tr>
                                <th scope="col">DOS From</th>
                                <th scope="col">DOS To</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Partial Pay</th>
                                <th scope="col">Outstanding</th>
                                <th scope="col">POM Date</th>
                                <th scope="col">Verif Resp.</th>
                                <th scope="col">Denial Date</th>
                                <th scope="col">Verif Req.</th>
                                <th scope="col">Denial Reason</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="r1">
                            @if(!empty($billing_data))
                            @foreach($billing_data as $res)
                            <tr>
                                <td>{{$res['dos_from']}}</td>
                                <td>{{$res['dos_to']}}</td>
                                <td>${{$res['amount']}}</td>
                                <td>${{$res['partial_pay']}}</td>
                                <td>${{$res['out_st']}}</td>
                                <td>{{$res['pom']}}</td>
                                <td>{{$res['ver_resp']}}</td>
                                <td>{{$res['denial_date']}}</td>
                                <td>{{$res['ver_req']}}</td>
                                <td>{{$res['denial_reason']}}</td>
                                <td><button class="btn btn-dark" wire:click.prevent="editBill({{$res['id']}})" type="button" id="view-bill-{{$res['id']}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z"
                                                fill="white" />
                                        </svg> View</button>
                                    <button class="btn sky-btn" id="delete-bill"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z"
                                                fill="#1B1D21" />
                                        </svg> Delete</button>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="bill-add-table-popup" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              
            </button>
          </div> -->
                <div class="modal-body">
                    <div class="add-bill-popup-form-wrap">
                        <div class="add-bill-popup-form-inner">
                            <div class="add-bill-popup-form">
                                <form wire:submit.prevent="submitForm" id="billForm">
                                    <div class="form-fields d-flex">
                                        <div class="form-group col-5 d-flex">
                                            <label for="dos_from" class="col-4 col-form-label">DOS From</label>
                                            <div class="col-8">
                                                <input id="dos_from" name="dos_from"
                                                    wire:model.defer="modalData.dos_from" type="date"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-5 d-flex">
                                            <label for="pom" class="col-4 col-form-label">POM Date</label>
                                            <div class="col-8">
                                                <input id="pom" name="pom" wire:model.defer="modalData.pom" type="date"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-5 d-flex">
                                            <label for="dos_to" class="col-4 col-form-label">DOS To</label>
                                            <div class="col-8">
                                                <input id="dos_to" name="dos_to" wire:model.defer="modalData.dos_to"
                                                    type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-5 d-flex">
                                            <label for="ver_resp" class="col-4 col-form-label">Verif Resp.</label>
                                            <div class="col-8">
                                                <input id="ver_resp" name="ver_resp"
                                                    wire:model.defer="modalData.ver_resp" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-5 d-flex">
                                            <label for="amount" class="col-4 col-form-label">Amount</label>
                                            <div class="col-8">
                                                <input id="amount" name="amount" wire:model.defer="modalData.amount"
                                                    type="number" min="1" step="any" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-5 d-flex">
                                            <label for="denial_date" class="col-4 col-form-label">Denial Date</label>
                                            <div class="col-8">
                                                <input id="denial_date" name="denial_date"
                                                    wire:model.defer="modalData.denial_date" type="date"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-5 d-flex">
                                            <label for="partial_pay" class="col-4 col-form-label">Partial Pay</label>
                                            <div class="col-8">
                                                <input id="partial_pay" name="partial_pay"
                                                    wire:model.defer="modalData.partial_pay" type="number" min="1"
                                                    step="any" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-5 d-flex">
                                            <label for="ver_req" class="col-4 col-form-label">Verif Req.</label>
                                            <div class="col-8">
                                                <input id="ver_req" name="ver_req" wire:model.defer="modalData.ver_req"
                                                    type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-5 d-flex">
                                            <label for="popup-outstanding"
                                                class="col-4 col-form-label">Outstanding</label>
                                            <div class="col-8">
                                                <input id="popup-outstanding" name="popup-outstanding" readonly
                                                    type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-5 d-flex">
                                            <label for="denial_reason" class="col-4 col-form-label">Denial
                                                Reason</label>
                                            <div class="col-8">
                                                <input id="denial_reason" name="denial_reason"
                                                    wire:model.defer="modalData.denial_reason" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-buttons">
                                        <div class=" d-flex">

                                            <button class="btn btn-dark" id="save-bill" type="submit">Save
                                                changes</button>
                                            <button type="button" class="btn sky-btn"
                                                data-bs-dismiss="modal">Cancel</button>

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
    $(document).ready(function () {
        window.addEventListener('billSaved', event => {
           
            $('#bill-add-table-popup').modal("hide");
        })

        window.addEventListener('addbill', event => {
            $("#billForm")[0].reset()
            $('#bill-add-table-popup').modal("show");
        })

        window.addEventListener('editbill', event => {
            $('#bill-add-table-popup').modal("show");
        })

        $(document).on('show.bs.modal', '.modal', function () {
        if ($(".modal-backdrop").length > 1) {
            $(".modal-backdrop").not(':first').remove();
        }
    });
    // Remove all backdrop on close
    $(document).on('hide.bs.modal', '.modal', function () {
        if ($(".modal-backdrop").length > 1) {
            $(".modal-backdrop").remove();
        }
    });

    $(document).on('blur', '#amount,#partial_pay', function () {
        var amount=$("#amount").val()!=""?$("#amount").val():0.00;
        var partial_pay=$("#partial_pay").val()!=""?$("#partial_pay").val():0.00;
        $("#popup-outstanding").val(amount-partial_pay)
    });

    });
</script>
@endpush