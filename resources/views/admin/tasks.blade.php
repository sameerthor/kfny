@extends('layouts.app')
@section('content')
<!-- main contaienr html start -->
<div class="main_container">
  <div class="invoic_section_header">
    <div class="row">
      <div class="col-6 daylist_row">
        <div class="day_list">
          <button class="day_button day_next">
            <i class="bi bi-arrow-left"></i>
          </button>
          <div class="day">
            Jan,2023
          </div>

          <button class="day_button day_prev">
            <i class="bi bi-arrow-right"></i>
          </button>
        </div>
        <div class="button_two">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Month
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">sun</a></li>
              <li><a class="dropdown-item" href="#">mon</a></li>
              <li><a class="dropdown-item" href="#">Tus</a></li>
            </ul>
          </div>
        </div>

        <div class="button_one">
          <button class="btn"><i class="bi bi-plus-lg"></i> Add Task</button>
        </div>


      </div>
      <div class="col-6">
        <div class="day_span">
          <span> Today</span>
          <span>Today</span>
          <span>Today</span>
          <span>Today</span>
        </div>
      </div>
    </div>
  </div>
  <div class="invoic_section  list_hr">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
          Important
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
          Normal
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
          Client
        </button>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="invoice_table">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Task No</th>
                <th scope="col">Comments</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Status</th>
                <th scope="col">Assigned To</th>
                <th scope="col">Progress</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>01.</td>
                <td>Prepare Documentation</td>
                <td>01/05/2023</td>
                <td>01/12/2023</td>
                <td>
                  <span class="status_Complete">Complete</span>
                </td>
                <td>Zoshua</td>
                <td>
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </td>

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
                <td>02.</td>
                <td>Meet Sam</td>
                <td>01/05/2023</td>
                <td>01/12/2023</td>
                <td>
                  <span class="status_pending">Pending</span>
                </td>
                <td>Zoshua</td>
                <td>
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </td>

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
                <td>02.</td>
                <td>Meet Sam</td>
                <td>01/05/2023</td>
                <td>01/12/2023</td>
                <td>
                  <span class="status_Complete">Complete</span>
                </td>
                <td>Zoshua</td>
                <td>
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </td>

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
                <td>02.</td>
                <td>Meet Sam</td>
                <td>01/05/2023</td>
                <td>01/12/2023</td>
                <td>
                  <span class="status_pending">Pending</span>
                </td>
                <td>Zoshua</td>
                <td>
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </td>

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
                <td>02.</td>
                <td>Meet Sam</td>
                <td>01/05/2023</td>
                <td>01/12/2023</td>
                <td>
                  <span class="status_pending">Pending</span>
                </td>
                <td>Zoshua</td>
                <td>
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </td>

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
                <td>02.</td>
                <td>Meet Sam</td>
                <td>01/05/2023</td>
                <td>01/12/2023</td>
                <td>
                  <span class="status_pending">Pending</span>
                </td>
                <td>Zoshua</td>
                <td>
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </td>

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
      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="invoice_table">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Task No</th>
                <th scope="col">Comments</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Status</th>
                <th scope="col">Assigned To</th>
                <th scope="col">Progress</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>01.</td>
                <td>Prepare Documentation</td>
                <td>01/05/2023</td>
                <td>01/12/2023</td>
                <td>
                  <span class="status_Complete">Complete</span>
                </td>
                <td>Zoshua</td>
                <td>
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </td>
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
                <td>02</td>
                <td>Prepare Documentation</td>
                <td>01/05/2023</td>
                <td>01/12/2023</td>
                <td>
                  <span class="status_pending">Pending</span>
                </td>
                <td>Zoshua</td>
                <td>
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </td>
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
                <td>02</td>
                <td>Prepare Documentation</td>
                <td>01/05/2023</td>
                <td>01/12/2023</td>
                <td>
                  <span class="status_pending">Pending</span>
                </td>
                <td>Zoshua</td>
                <td>
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </td>
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
                <td>02</td>
                <td>Prepare Documentation</td>
                <td>01/05/2023</td>
                <td>01/12/2023</td>
                <td>
                  <span class="status_pending">Pending</span>
                </td>
                <td>Zoshua</td>
                <td>
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </td>
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
                <td>02</td>
                <td>Prepare Documentation</td>
                <td>01/05/2023</td>
                <td>01/12/2023</td>
                <td>
                  <span class="status_pending">Pending</span>
                </td>
                <td>Zoshua</td>
                <td>
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </td>
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
                <td>02</td>
                <td>Prepare Documentation</td>
                <td>01/05/2023</td>
                <td>01/12/2023</td>
                <td>
                  <span class="status_pending">Pending</span>
                </td>
                <td>Zoshua</td>
                <td>
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </td>
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
                <td>02</td>
                <td>Prepare Documentation</td>
                <td>01/05/2023</td>
                <td>01/12/2023</td>
                <td>
                  <span class="status_pending">Pending</span>
                </td>
                <td>Zoshua</td>
                <td>
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </td>
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
      <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <div class="invoice_table">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Task No</th>
                <th scope="col">Comments</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Status</th>
                <th scope="col">Assigned To</th>
                <th scope="col">Progress</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>01.</td>
                <td>Prepare Documentation</td>
                <td>01/05/2023</td>
                <td>01/12/2023</td>
                <td>
                  <span class="status_Complete">Complete</span>
                </td>
                <td>Zoshua</td>
                <td>
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </td>
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
                <td>02</td>
                <td>Prepare Documentation</td>
                <td>01/05/2023</td>
                <td>01/12/2023</td>
                <td>
                  <span class="status_pending">Pending</span>
                </td>
                <td>Zoshua</td>
                <td>
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </td>
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
                <td>02</td>
                <td>Prepare Documentation</td>
                <td>01/05/2023</td>
                <td>01/12/2023</td>
                <td>
                  <span class="status_pending">Pending</span>
                </td>
                <td>Zoshua</td>
                <td>
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </td>
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
                <td>02</td>
                <td>Prepare Documentation</td>
                <td>01/05/2023</td>
                <td>01/12/2023</td>
                <td>
                  <span class="status_pending">Pending</span>
                </td>
                <td>Zoshua</td>
                <td>
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </td>
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
                <td>02</td>
                <td>Prepare Documentation</td>
                <td>01/05/2023</td>
                <td>01/12/2023</td>
                <td>
                  <span class="status_pending">Pending</span>
                </td>
                <td>Zoshua</td>
                <td>
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </td>
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
                <td>02</td>
                <td>Prepare Documentation</td>
                <td>01/05/2023</td>
                <td>01/12/2023</td>
                <td>
                  <span class="status_pending">Pending</span>
                </td>
                <td>Zoshua</td>
                <td>
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </td>
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
                <td>02</td>
                <td>Prepare Documentation</td>
                <td>01/05/2023</td>
                <td>01/12/2023</td>
                <td>
                  <span class="status_pending">Pending</span>
                </td>
                <td>Zoshua</td>
                <td>
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </td>
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
  </div>
</div>

<!-- main  container html end -->
@endsection