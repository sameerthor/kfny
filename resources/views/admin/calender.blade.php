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
</div>

<!-- main  container html end -->
@endsection