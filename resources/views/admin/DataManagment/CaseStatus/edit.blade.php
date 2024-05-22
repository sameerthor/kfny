<div class="kfnythemes_modal">
<div class="modal fade" id="editCaseStatusModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Case Status</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal_main_body">
        <form id="editCaseStatusForm">
        <div class="modal-body">
            @csrf
            @method('put')
            <div class="examAlertMsg"></div>
            <div class="row">

              <div class="col-lg-12 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Case Status Name<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="status" value="{{$info['status']}}" id="status" data-rule-required="true">
                  <span class="text-danger error status-error"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary update-case-status" data-url="{{route('case-status.update',$info['id'])}}">SUBMIT</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
</div>