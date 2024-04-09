<div class="kfnythemes_modal">
<div class="modal fade" id="addJudge" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-class">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Judge</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal_main_body">
        <form id="judgeForm">
          <div class="modal-body">
            @csrf
            @method('post')
            <div class="examAlertMsg"></div>
            <div class="row">

              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Name<span class="text-danger ">*</span></label>
                  <input type="text" class="form-control " name="name" id="name" data-rule-required="true">
                  <span class="text-danger error name-error"></span>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Vanue</label>
                  <input type="text" class="form-control " name="vanue" id="vanue">
                  <span class="text-danger error vanue-error"></span>
                </div>

              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Court</label>
                  <input type="text" class="form-control " name="court" id="court">
                  <span class="text-danger error court-error"></span>
                </div>

              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Email</label>
                  <input type="text" class="form-control " name="email" id="email">
                  <span class="text-danger error email-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Phone Number</label>
                  <input type="text" class="form-control " name="phone_number" id="phone_number">
                  <span class="text-danger error phone_number-error"></span>
                </div>

              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Address</label>
                  <input type="text" class="form-control " name="address" id="address">
                  <span class="text-danger error address-error"></span>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Court Attorney Name</label>
                  <input type="text" class="form-control " name="court_attorney_name" id="court_attorney_name">
                  <span class="text-danger error court_attorney_name-error"></span>
                </div>

              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Court Attorney Email</label>
                  <input type="text" class="form-control " name="court_attorney_email" id="court_attorney_email">
                  <span class="text-danger error court_attorney_email-error"></span>
                </div>

              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="mb-1">Court Attorney Phone Number</label>
                  <input type="text" class="form-control " name="court_attorney_phone_number" id="court_attorney_phone_number">
                  <span class="text-danger error court_attorney_phone_number-error"></span>
                </div>

              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary save-judge" data-url="{{route('judge.store')}}">SUBMIT</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

</div>
