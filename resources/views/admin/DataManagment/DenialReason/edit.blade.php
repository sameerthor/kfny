<div class="kfnythemes_modal">
<div class="modal fade" id="editDenialReasonModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Denial Reason</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal_main_body">
        <form id="editdenial-reasonForm">
        <div class="modal-body">
            @csrf
            @method('put')
            <div class="examAlertMsg"></div>
            <div class="row">

            <div class="col-lg-12 col-md-12">
                <div class="form-group">
                  <label class="mb-1">Title<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " value="{{$info['title']}}" name="title" id="title" data-rule-required="true">
                  <span class="text-danger error title-error"></span>
                </div>
              </div>
              <div class="col-lg-12 col-md-12">
                <div class="form-group">
                  <label class="mb-1">Description</label>
                  <input type="text" class="form-control " name="description" value="{{$info['description']}}" id="description" >
                 
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary update-denial-reason" data-url="{{route('denial_reason.update',$info['id'])}}">SUBMIT</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
</div>