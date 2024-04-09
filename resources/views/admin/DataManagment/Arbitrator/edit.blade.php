<div class="kfnythemes_modal">
  <div class="modal fade" id="editArbitratorModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Arbitrator</h1>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal_main_body">
          <form id="editarbitratorForm">
            <div class="modal-body">
              @csrf
              @method('put')
              <div class="examAlertMsg"></div>
              <div class="row">

                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Name<span class="text-danger ">*</span></label>
                    <input type="text" class="form-control " name="name" value="{{$info['name']}}" id="name" data-rule-required="true">
                    <span class="text-danger error name-error"></span>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Email</label>
                    <input type="email" class="form-control " name="email" value="{{$info['email']}}" id="email">
                    <span class="text-danger error email-error"></span>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Phone #</label>
                    <input type="text" class="form-control " name="phone_number" value="{{$info['phone_number']}}" id="phone_number">
                    <span class="text-danger error phone_number-error"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary update-arbitrator" data-url="{{route('arbitrator.update',$info['id'])}}">SUBMIT</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>