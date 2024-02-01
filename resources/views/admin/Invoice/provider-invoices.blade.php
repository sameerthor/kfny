<div class="float-end mb-3">
  <a class="btn btn-primary">Sent Email</a>
  <a href="{{route('print_invoice')}}" target="_blank" class="btn btn-primary">Print</a>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">File No</th>
      <th scope="col">Date Created</th>
      <th scope="col">Amount($)</th>
      <th scope="col">Provider</th>
      <th scope="col">Claim</th>
      <th scope="col">Check#</th>
      <th scope="col">Principle Amount($)</th>
      <th scope="col">Interest Amount($)</th>
      <th scope="col">Filing Fees($)</th>
      <th scope="col">Legal Fees Due($)</th>
    </tr>
  </thead>
  <tbody>
    @foreach($details as $res)

    <tr>
      <td>{{$res->basic_intake_id}}</td>
      <td>{{$res->date_rec}}</td>
      <td>{{$res->total}}</td>
      <td>{{$res->provider->name}}</td>
      <td>{{$res->basicIntake->claim_number}}</td>
      <td>{{$res->check_number}}</td>
      <td class="principle text-center">{{$res->principle}}</td>
      <td class="interest text-center">{{$res->interest}}</td>
      <td class="filling_fees text-center">{{$res->filling_fees}}</td>
      <td class="legal_fees text-center">0.00</td>
    </tr>
    @endforeach

  </tbody>
</table>

<div class="total_data_row">
  <div class="total_data">
    <span class="total_data_title">Total </span>
    <div class="total_data_amount" id="principle">
    </div>
  </div>
  <div class="total_data">
    <span class="total_data_title">Total </span>
    <div class="total_data_amount" id="interest">
    </div>
  </div>
  <div class="total_data">
    <span class="total_data_title">Total </span>
    <div class="total_data_amount " id="filling_fees">
    </div>
  </div>
  <div class="total_data">
    <span class="total_data_title">Total </span>
    <div class="total_data_amount" id="legal_fees">
    </div>
  </div>
</div>
<script>
  var principle = 0.00;
  $(".principle").each(function() {
    principle = principle + parseFloat($(this).html());
  });
  $("#principle").html("$" + principle);


  var interest = 0.00;
  $(".interest").each(function() {
    interest = interest + parseFloat($(this).html());
  });
  $("#interest").html("$" + interest);

  var filling_fees = 0.00;
  $(".filling_fees").each(function() {
    filling_fees = filling_fees + parseFloat($(this).html());
  });
  $("#filling_fees").html("$" + filling_fees);

  var legal_fees = 0.00;
  $(".legal_fees").each(function() {
    legal_fees = legal_fees + parseFloat($(this).html());
  });
  $("#legal_fees").html("$" + legal_fees);

  console.log(principle)
  console.log(interest)

  console.log(filling_fees)

  console.log(legal_fees)
</script>