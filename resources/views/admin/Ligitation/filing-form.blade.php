<div class="kfnythemes_modal">
  <div class="card">
    <div class="card-header">
      <h5 class="card-title">Filing Info</h5>
    </div>
    <div class="card-body">
      <form id="addFillingForm" action="{{ route('ligitation.create') }}" method="POST">
        @csrf
        @method('post')
        <div class="examAlertMsg"></div>
        <!-- Rest of your form content -->
        <div class="examAlertMsg"></div>
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label class="mb-1">Filling Date s&c<span class="text-danger">*</span></label>
              <input type="date" class="form-control" name="filling_date_s_c" value="{{$fillingInfo['filling_date_s_c'] }}" id="filling_date_s_c" data-rule-required="true">
              <span class="text-danger error filling_date_s_c-error"></span>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label class="mb-1">Amended s&c<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="amended_s_c" value="{{$fillingInfo['amended_s_c'] }}" id="amended_s_c" data-rule-required="true">
              <span class="text-danger error amended_s_c-error"></span>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label class="mb-1">Date Serve s&c<span class="text-danger">*</span></label>
              <input type="date" class="form-control" name="date_serve_s_c" value="{{$fillingInfo['date_serve_s_c'] }}" id="date_serve_s_c" data-rule-required="true">
              <span class="text-danger error date_serve_s_c-error"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label class="mb-1">Service Complaint s&c<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="service_complaint_s_c" value="{{$fillingInfo['service_complaint_s_c'] }}" id="service_complaint_s_c" data-rule-required="true">
              <span class="text-danger error service_complaint_s_c-error"></span>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label class="mb-1">Answer Rec<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="answer_rec" value="{{$fillingInfo['answer_rec'] }}" id="answer_rec" data-rule-required="true">
              <span class="text-danger error answer_rec-error"></span>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label class="mb-1">Answer Due By<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="answer_due_by" value="{{$fillingInfo['answer_due_by'] }}" id="answer_due_by" data-rule-required="true">
              <span class="text-danger error answer_due_by-error"></span>
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label class="mb-1">Answer Extentiom<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="answer_extension" value="{{$fillingInfo['answer_extension'] }}" id="answer_extension" data-rule-required="true">
              <span class="text-danger error answer_extension-error"></span>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label class="mb-1">Default Letter<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="default_letter" value="{{$fillingInfo['default_letter'] }}" id="default_letter" data-rule-required="true">
              <span class="text-danger error default_letter-error"></span>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label class="mb-1">Country<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="country" value="{{$fillingInfo['country'] }}" id="country" data-rule-required="true">
              <span class="text-danger error country-error"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label class="mb-1">Filling Date Ar<span class="text-danger">*</span></label>
              <input type="date" class="form-control" name="filling_date_ar" value="{{$fillingInfo['filling_date_ar'] }}" id="filling_date_ar" data-rule-required="true">
              <span class="text-danger error filling_date_ar-error"></span>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label class="mb-1">Date Serve Ar<span class="text-danger">*</span></label>
              <input type="date" class="form-control" name="date_serve_ar" value="{{$fillingInfo['date_serve_ar'] }}" id="date_serve_ar" data-rule-required="true">
              <span class="text-danger error date_serve_ar-error"></span>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label class="mb-1">Response Rec<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="response_rec" value="{{$fillingInfo['response_rec'] }}" id="response_rec" data-rule-required="true">
              <span class="text-danger error response_rec-error"></span>
            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label class="mb-1">Adjuster Name<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="adjuster_name" value="{{$fillingInfo['adjuster_name'] }}" id="adjuster_name" data-rule-required="true">
              <span class="text-danger error adjuster_name-error"></span>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label class="mb-1">Adjuster Phone<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="adjuster_phone" value="{{$fillingInfo['adjuster_phone'] }}" id="adjuster_phone" data-rule-required="true">
              <span class="text-danger error adjuster_phone-error"></span>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="form-group">
              <label class="mb-1">Reason to pay<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="reason_to_pay" value="{{$fillingInfo['reason_to_pay'] }}" id="reason_to_pay" data-rule-required="true">
              <span class="text-danger error reason_to_pay-error"></span>
            </div>
          </div>
        </div>
        <input type="hidden" class="form-control" name="fil_id" value="{{$fillingInfo['id'] }}" id="fil_id" value="{{$fillingInfo['id'] }}">

        <div class="modal-footer">
          <button type="button" class="btn btn-primary save-filling-info-form" data-url="{{ route('filling-info.store') }}">Save</button>
        </div>
      </form>
    </div>
  </div>

</div>