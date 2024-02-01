@extends('layouts.app')
@section('content')
<!-- main container htnl start -->
<div class="main_container">
  <div class="invoic_section">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
          Provider Invoices
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
          Provider Payment
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
          Filing Invoices
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-contacts-tab" data-bs-toggle="pill" data-bs-target="#pills-contacts" type="button" role="tab" aria-controls="pills-contacts" aria-selected="false">
          Filing Fee Payment
        </button>
      </li>
      <li>
        <div class="serch_input">
          <select id="search_provider">
            <option value="" selected disabled>Select Provider</option>
            @foreach($provider_information as $res)
            <option value="{{$res->id}}">{{$res->name}}</option>
            @endforeach
          </select>
        </div>
        <br>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="invoice_table  invoic_active" id="provide_invoice_table">

        </div>
      </div>
      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="invoice_table">
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
                <td>50833</td>
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
      <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <div class="invoice_table">
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
                <td>60833</td>
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
      <div class="tab-pane fade" id="pills-contacts" role="tabpanel" aria-labelledby="pills-contacts-tab">
        <div class="invoice_table">
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
                <td>70032</td>
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
  </div>
</div>
<!-- main container htnl end-->
@endsection
@section('javascript')
<script>
  $('#search_provider').select2();

  $(document).on("change", "#search_provider", function() {
    var id = $(this).val();

    $.ajax({
      url: "/provider-invoices",
      method: "GET",
      data: {
        id: id
      },
      beforeSend: function() {
        $(".loader").fadeIn(300);
      },
      success: function(response) {
        $("#provide_invoice_table").html(response.table);
        if (response.status == "notfound") {
          alert("No Invoice found for this Provider.");
        }

      },
      error: function(xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });
</script>
@endsection