@extends('layouts.app')
@section('content')
<!-- main container html start -->
<div class="main_container">
  <div class="Patientinfo">
    <div class="page_title">
      Reports
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="top_ssection reports_section">
          <div class="col-9">
            <div class="serch_input">
              <input class="form-control me-2" type="text" aria-label="" />
            </div>

            <div class="button_two">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  File No.
                </button>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="#">1092</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">1234</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">9893</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="button_two  larg_button_two">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  By Case Status
                </button>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="#">1092</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">1234</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">9893</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="button_one">
              <button class="btn">
                <i class="bi bi-plus-lg"></i> Add New
              </button>
            </div>
            <div class="button_one">
              <button class="btn">
                <i class="bi bi-pencil-square"></i>Edit
              </button>
            </div>
          </div>
        </div>
        <div class="bottom_section">
          <div class="patient_data_table">
            <div class="pati_col">
              <div class="pati_data">
                <div class="patinet_input">First Name</div>
                <div class="patinet_output">Molock</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Last Name</div>
                <div class="patinet_output">Jeanty</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">Street Address</div>
                <div class="patinet_output">1191 Dorchester Rd</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">City</div>
                <div class="patinet_output">Brooklyn</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">Zip Code</div>
                <div class="patinet_output">11226</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">DOB</div>
                <div class="patinet_output">12/17/1985</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Contact Number</div>
                <div class="patinet_output">+11231234567</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Insured Name</div>
                <div class="patinet_output">Molock</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Date Of Accident</div>
                <div class="patinet_output">12/17/2016</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Claim No</div>
                <div class="patinet_output">BU2016121700070</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Policy No.</div>
                <div class="patinet_output">123456789</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Insurance Company</div>
                <div class="patinet_output">
                  NYC Transit Authority
                </div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Self Insured</div>
                <div class="patinet_checkbox">
                  <label class="con">
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                  </label>
                </div>

              </div>
            </div>
            <div class="pati_col">
              <div class="pati_data">
                <div class="patinet_input">Litigation</div>
                <div class="patinet_output">Molock</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Self Insured</div>
                <div class="patinet_output">Molock</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">Venue Court</div>
                <div class="patinet_output">Molock</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">File</div>
                <div class="patinet_output">1408</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">Index No</div>
                <div class="patinet_output">987456</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">AAA Number</div>
                <div class="patinet_output">123456</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Appeal Docket</div>
                <div class="patinet_output">Lorem</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Case Status</div>
                <div class="patinet_output">Setteled- Paid</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Provider</div>
                <div class="patinet_output">Jamaica Wellness</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Carrier’s Attorney</div>
                <div class="patinet_output">Molock</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Attorney Notes</div>
                <div class="patinet_output">
                  Lorem ipsum dolor sit amet, consectetur adipiscing
                  elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua.
                </div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Notes</div>
                <div class="patinet_output">
                  Lorem ipsum dolor sit amet, consectetur adipiscing
                  elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="footer_section">
      <div class="footer_title">Bill Data</div>

      <ul>
        <li>DOS From</li>
        <li>DOS To</li>
        <li>Amount</li>
        <li>Partial Pay</li>
        <li>Outstanding</li>
        <li>POM Date</li>
        <li>Verif Resp</li>
        <li>Denial Date</li>
      </ul>

    </div>
  </div>
</div>

<!-- main container html end -->
@endsection