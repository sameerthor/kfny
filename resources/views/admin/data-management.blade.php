@extends('layouts.app')
@section('content')
<!-- main container  html start -->

<div class="main_container">
  <div class="invoic_section list_hr">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <!-- Venue County -->

      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-VenueCounty-tab" data-bs-toggle="pill" data-bs-target="#pills-VenueCounty" type="button" role="tab" aria-controls="pills-VenueCounty" aria-selected="true">
          Venue County
        </button>
      </li>

      <!-- Provider Information -->

      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-ProviderInformation-tab" data-bs-toggle="pill" data-bs-target="#pills-ProviderInformation" type="button" role="tab" aria-controls="pills-ProviderInformation" aria-selected="false">
          Provider Information
        </button>
      </li>

      <!-- Insurance Company -->

      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-InsuranceCompany-tab" data-bs-toggle="pill" data-bs-target="#pills-InsuranceCompany" type="button" role="tab" aria-controls="pills-InsuranceCompany" aria-selected="false">
          Insurance Company
        </button>
      </li>

      <!-- Defense Firm -->

      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-DefenseFirm-tab" data-bs-toggle="pill" data-bs-target="#pills-DefenseFirm" type="button" role="tab" aria-controls="pills-DefenseFirm" aria-selected="true">
          Defense Firm
        </button>
      </li>

      <!-- Judge -->

      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-Judge-tab" data-bs-toggle="pill" data-bs-target="#pills-Judge" type="button" role="tab" aria-controls="pills-Judge" aria-selected="false">
          Judge
        </button>
      </li>

      <!-- Arbitrator -->
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-Arbitrator-tab" data-bs-toggle="pill" data-bs-target="#pills-Arbitrator" type="button" role="tab" aria-controls="pills-Arbitrator" aria-selected="false">
          Arbitrator
        </button>
      </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
      <!-- Venue County start -->

      <div class="tab-pane fade show active" id="pills-VenueCounty" role="tabpanel" aria-labelledby="pills-VenueCounty-tab">
        <div class="datamangement_tab">
          <div class="kfnythemes_modal">
            <!-- Button trigger modal  html start-->
            <div class="button_one">
              <button class="btn" data-bs-toggle="modal" data-bs-target="#ArbitratorModal">
                <i class="bi bi-plus-lg"></i> Add New
              </button>
            </div>
            <!-- Button trigger modal  html start-->



            <!-- Modal body  html start-->
            <div class="modal fade" id="ArbitratorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add To-do</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal_main_body">
                    <form>

                      <div class="modal-body">


                      </div>
                      <div class="modal-footer float-start">
                        <button type="button" class="btn btn-primary">SUBMIT</button>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
            <!-- Modal body html end-->

          </div>


          <div class="kfnythemes_table mt-4">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">File No</th>
                  <th scope="col">Date</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Assignor</th>
                  <th scope="col">Provider</th>
                  <th scope="col">Principle Amount</th>
                  <th scope="col">Interest Amount</th>
                  <th scope="col">Filing Fees</th>
                  <th scope="col">Legal Fees Due</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>49833</td>
                  <td>01/12/2020</td>
                  <td>$1234</td>
                  <td>Margie Londono</td>
                  <td>Liny Medicine & Acupuncture</td>
                  <td>$2,280.11</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                  <td>$288</td>
                  <td class="table_button">
                    <div class="dropdown">
                      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                      </a>

                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li>
                          <a class="dropdown-item" href="#">View</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">Add</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">Generate</a>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>49833</td>
                  <td>01/12/2020</td>
                  <td>$1234</td>
                  <td>Margie Londono</td>
                  <td>Liny Medicine & Acupuncture</td>
                  <td>$2,280.11</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                  <td>$288</td>
                  <td class="table_button">
                    <div class="dropdown">
                      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li>
                          <a class="dropdown-item" href="#">View</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">Add</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">Generate</a>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>49833</td>
                  <td>01/12/2020</td>
                  <td>$1234</td>
                  <td>Margie Londono</td>
                  <td>Liny Medicine & Acupuncture</td>
                  <td>$2,280.11</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                  <td>$288</td>
                  <td class="table_button">
                    <div class="dropdown">
                      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                      </a>

                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li>
                          <a class="dropdown-item" href="#">View</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">Add</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">Generate</a>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>49833</td>
                  <td>01/12/2020</td>
                  <td>$1234</td>
                  <td>Margie Londono</td>
                  <td>Liny Medicine & Acupuncture</td>
                  <td>$2,280.11</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                  <td>$288</td>
                  <td class="table_button">
                    <div class="dropdown">
                      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                      </a>

                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li>
                          <a class="dropdown-item" href="#">View</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">Add</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">Generate</a>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>49833</td>
                  <td>01/12/2020</td>
                  <td>$1234</td>
                  <td>Margie Londono</td>
                  <td>Liny Medicine & Acupuncture</td>
                  <td>$2,280.11</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                  <td>$288</td>
                  <td class="table_button">
                    <div class="dropdown">
                      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                      </a>

                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li>
                          <a class="dropdown-item" href="#">View</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">Add</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">Generate</a>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Venue County end -->

      <!-- Provider Information start -->

      <div class="tab-pane fade" id="pills-ProviderInformation" role="tabpanel" aria-labelledby="pills-ProviderInformation-tab">
        Provider Information
      </div>

      <!-- Provider Information end -->

      <!-- Insurance Company start -->

      <div class="tab-pane fade" id="pills-InsuranceCompany" role="tabpanel" aria-labelledby="pills-InsuranceCompany-tab">
        Insurance Company
      </div>

      <!-- Insurance Company end -->

      <!-- Defense Firm start -->

      <div class="tab-pane fade" id="pills-DefenseFirm" role="tabpanel" aria-labelledby="pills-DefenseFirm-tab">
        Defense Firm
      </div>

      <!-- Defense Firm end -->

      <!-- Judge  start -->

      <div class="tab-pane fade" id="pills-Judge" role="tabpanel" aria-labelledby="pills-Judge-tab">
        Judge
      </div>

      <!-- Judge Firm end -->

      <!-- Arbitrator  start -->

      <div class="tab-pane fade" id="pills-Arbitrator" role="tabpanel" aria-labelledby="pills-Arbitrator-tab">
        Arbitrator
      </div>

      <!-- Arbitrator Firm end -->
    </div>
  </div>
</div>

<!-- main container  html end -->

@endsection