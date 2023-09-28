@extends('layouts.app')
@section('content')
<div class="main_container">
  <div class="Patientinfo settements">
    <div class="row">
      <div class="page_title">
        Case Settlement
      </div>
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
                <div class="patinet_input">Decision Date</div>
                <div class="patinet_output">24/11/2022</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Settlement Date</div>
                <div class="patinet_output">24/11/2022</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">Person Settled with</div>
                <div class="patinet_output">Jeanty</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">Email</div>
                <div class="patinet_output">jnty@gml.com</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">Phone Number</div>
                <div class="patinet_output">+914567896547</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Principle. %</div>
                <div class="patinet_output">5%</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Principle Amount</div>
                <div class="patinet_output">$256</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Interest %</div>
                <div class="patinet_output">2%</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Interest Amount</div>
                <div class="patinet_output">$324</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">New Total</div>
                <div class="patinet_output">$2356</div>
              </div>
              <div class="pati_data more_data">
                <div class="patinet_input">Interest from</div>
                <div class="patinet_output ">
                  <p>
                    24/11/2022
                  </p>
                  <p>
                    24/11/2022
                  </p>
                  <p>
                    7 days due
                  </p>
                  <p>
                    24/11/2022
                  </p>

                </div>
              </div>
            </div>
            <div class="pati_col">
              <div class="pati_data">
                <div class="patinet_input">Attorney's fees</div>
                <div class="patinet_output">$324</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Costs/Filing Fees</div>
                <div class="patinet_output">$123</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">Disbursements</div>
                <div class="patinet_output">Molock</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">Judgment Date</div>
                <div class="patinet_output">24/11/2022</div>
              </div>

              <div class="pati_data">
                <div class="patinet_input">Sent To Marshal</div>
                <div class="patinet_output">Yes</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Marshal Fees</div>
                <div class="patinet_output">$78</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Additional Interst</div>
                <div class="patinet_output">3%</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Additional Attorney Fees</div>
                <div class="patinet_output">$200</div>
              </div>
              <div class="pati_data">
                <div class="patinet_input">Additional Costs</div>
                <div class="patinet_output">$32.00</div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="footer_section">
      <div class="footer_title">Bill Data</div>

      <ul>
        <li>Date Received</li>
        <li>Date Received</li>
        <li>Principle</li>
        <li>Interest</li>
        <li>Attorney Fees</li>
        <li>Filing Fees</li>
        <li>Disbursements</li>
        <li>Other</li>
        <li>Check </li>
        <li>Check Date</li>
      </ul>

    </div>
  </div>
</div>
</div>
@endsection