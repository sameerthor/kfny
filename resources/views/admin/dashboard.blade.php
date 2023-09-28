@extends('layouts.app')
@section('content')
<div class="Dashboard">
  <div class="row">
    <div class="col-md-9">
      <div class="top_ssection">
        <div class="col-7">
          <div class="serch_input">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          </div>

          <div class="button_two">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Case Number
              </button>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="#">Action</a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">Another action</a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-3">
          <div class="button_one">
            <button class="btn">
              <i class="bi bi-plus-lg"></i> Add New case
            </button>
          </div>
        </div>
      </div>
      <div class="case_data">
        <div class="col-2">
          <div class="case_data_title">Total Cases</div>
          <div class="case_data_num">37</div>
        </div>
        <div class="col-2">
          <div class="case_data_title">Total Cases</div>
          <div class="case_data_num">37</div>
        </div>
        <div class="col-2">
          <div class="case_data_title">Total Cases</div>
          <div class="case_data_num">37</div>
        </div>
        <div class="col-2">
          <div class="case_data_title">Total Cases</div>
          <div class="case_data_num">37</div>
        </div>
      </div>

      <div class="data_chart">
        <div class="row">
          <div class="col-md-6">
            <img src="/images/Other/Frame 1738.jpg" />
          </div>
          <div class="col-md-6">
            <img src="/images/Other/Earning Report.jpg" />
          </div>
        </div>
      </div>

      <div class="bottom_section">
        <div class="col-md-6">
          <div class="bottom_section_header">
            <div class="bottom_section_title">Hearings</div>
            <div class="bottom_section_day">
              <div class="button_two">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Last 30 Days
                  </button>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="#">Action</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Another action</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                Upcoming
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                History
              </button>
            </li>
          </ul>

          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <div class="bottom_section_list">
                <div class="bottom_list">
                  <div class="bottom_list_title">Jim Collins</div>
                  <div class="bottom_list_data">
                    07 Apr 2023, at 08:44 AM
                  </div>
                </div>
                <div class="bottom_list">
                  <div class="bottom_list_title">Jim Collins</div>
                  <div class="bottom_list_data">
                    07 Apr 2023, at 08:44 AM
                  </div>
                </div>
                <div class="bottom_list">
                  <div class="bottom_list_title">Jim Collins</div>
                  <div class="bottom_list_data">
                    07 Apr 2023, at 08:44 AM
                  </div>
                </div>
                <div class="bottom_list">
                  <div class="bottom_list_title">Jim Collins</div>
                  <div class="bottom_list_data">
                    07 Apr 2023, at 08:44 AM
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <div class="bottom_section_list">
                <div class="bottom_list">
                  <div class="bottom_list_title">Jim Collins</div>
                  <div class="bottom_list_data">
                    07 Apr 2023, at 08:44 AM
                  </div>
                </div>
                <div class="bottom_list">
                  <div class="bottom_list_title">Jim Collins</div>
                  <div class="bottom_list_data">
                    07 Apr 2023, at 08:44 AM
                  </div>
                </div>
                <div class="bottom_list">
                  <div class="bottom_list_title">Jim Collins</div>
                  <div class="bottom_list_data">
                    07 Apr 2023, at 08:44 AM
                  </div>
                </div>
                <div class="bottom_list">
                  <div class="bottom_list_title">Jim Collins</div>
                  <div class="bottom_list_data">
                    07 Apr 2023, at 08:44 AM
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <img src="/images/Other/Group 34603.png" />
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="Calendar">
        <div class="Calender_header">
          <div class="Month">Jan, 2023</div>
          <div class="Claender_button">
            <ul>
              <li class="prev">
                <i class="bi bi-arrow-left"></i>
              </li>
              <li class="next">
                <i class="bi bi-arrow-right"></i>
              </li>
            </ul>
          </div>
        </div>

        <ul class="weekdays">
          <li>Mo</li>
          <li>Tu</li>
          <li>We</li>
          <li>Th</li>
          <li>Fr</li>
          <li>Sa</li>
          <li>Su</li>
        </ul>

        <ul class="days">
          <li>1</li>
          <li>2</li>
          <li>3</li>
          <li>4</li>
          <li>5</li>
          <li>6</li>
          <li>7</li>
          <li>8</li>
          <li>9</li>
          <li><span class="active">10</span></li>
          <li>11</li>
          <li>12</li>
          <li>13</li>
          <li>14</li>
          <li>15</li>
          <li>16</li>
          <li>17</li>
          <li>18</li>
          <li>19</li>
          <li>20</li>
          <li>21</li>
          <li>22</li>
          <li>23</li>
          <li>24</li>
          <li>25</li>
          <li>26</li>
          <li>27</li>
          <li>28</li>
          <li>29</li>
          <li>30</li>
          <li>31</li>
        </ul>
      </div>

      <div class="task_section">
        <div class="task_section_header">
          <div class="task_section_title">Tasks</div>
          <div class="task_section_button">See All</div>
        </div>
        <div class="task_section_body">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <div class="task_accordion_title">
                    Create Invoices
                  </div>
                  <div class="task_accordion_dsc">
                    Check our new best offers
                  </div>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  It is shown by default, until the collapse
                  plugin adds the appropriate classe.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <div class="task_accordion_title">
                    Create Invoices
                  </div>
                  <div class="task_accordion_dsc">
                    Check our new best offers
                  </div>
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  It is shown by default, until the collapse
                  plugin adds the appropriate classe.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <div class="task_accordion_title">
                    Create Invoices
                  </div>
                  <div class="task_accordion_dsc">
                    Check our new best offers
                  </div>
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  his is the third item's accordion body
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection