@extends('layouts.app')
@section('content')
<!-- main container  html start -->
<div class="main_container">
  <div class="Patientinfo settements">
    <div class="page_title">Information</div>

    <div class="row">
      <div class="col-md-9">
        <div class="top_ssection">
          <div class="col-7">
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
          </div>

          <div class="col-4">
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
                <div class="patinet_input">Insurance Company</div>
                <div class="patinet_output">Name</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Law Firm Reprs.</div>
                <div class="patinet_output">Lawfirm</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">Provider</div>
                <div class="patinet_output">Molock</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">Amount in Dispute</div>
                <div class="patinet_output">Amount</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">EUO Patients</div>
                <div class="patinet_output">50</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">EUO Claim #s</div>
                <div class="patinet_output">12365478</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">1st Letter Date</div>
                <div class="patinet_output">+11231234567</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">1st Request Date</div>
                <div class="patinet_output">12/17/2016</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">
                  1st EUO Response Letter
                </div>
                <div class="patinet_output">12/17/2016</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">1st Adjourned Date</div>
                <div class="patinet_output">12/17/2016</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">2nd Letter Date</div>
                <div class="patinet_output">12/17/2016</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">2nd Request Date</div>
                <div class="patinet_output">12/17/2016</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">2nd Adjourned Date</div>
                <div class="patinet_output">12/17/2016</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">3rd Letter Date</div>
                <div class="patinet_output">12/17/2016</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">3rd Request Date</div>
                <div class="patinet_output">12/17/2016</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">3rd Adjourned Date</div>
                <div class="patinet_output">Molock</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">EUO Withdrawl Date</div>
                <div class="patinet_output">Molock</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">3rd Adjourned Date</div>
                <div class="patinet_output">Molock</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">EUO Date</div>
                <div class="patinet_output">Molock</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">EUO Time</div>
                <div class="patinet_output">09:21 AM</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">EUO Witness</div>
                <div class="patinet_output">Molock</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">EUO Location</div>
                <div class="patinet_output">Brooklyn</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">1st Post EUO</div>
                <div class="patinet_output">Lorem</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">2nd Post EUO</div>
                <div class="patinet_output">Lorem ipsum</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">Response Deadline</div>
                <div class="patinet_output">12/17/2016</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">
                  Response to Post EUO
                </div>
                <div class="patinet_output">12/17/2016</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">Denial Date</div>
                <div class="patinet_output">12/17/2016</div>
              </div>
            </div>

            <div class="pati_col">
              <div class="pati_data">
                <div class="patinet_input">Status</div>
                <div class="patinet_output status_done">
                  Settled- Paid
                </div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Person Settled with</div>
                <div class="patinet_output">Jeanty</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">Email Contact</div>
                <div class="patinet_output">mlk@gmail.com</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">Phone Contact</div>
                <div class="patinet_output">+917894563214</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">
                  Settllement Principle
                </div>
                <div class="patinet_output">$123</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Attorney Fees</div>
                <div class="patinet_output">$123</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Received Principle</div>
                <div class="patinet_output">$50</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">
                  Settllement Principle
                </div>
                <div class="patinet_output">$226</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">
                  Received Attorney Fees
                </div>
                <div class="patinet_output">$1236</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- main container  html end -->
@endsection