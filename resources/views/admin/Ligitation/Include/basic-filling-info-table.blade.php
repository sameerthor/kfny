<div class="basic-intakes-table">

<table class="table">
  <thead>
    <tr>
      <th scope="col">File</th>
      <th scope="col">Index</th>
      <th scope="col">Status</th>
      <th scope="col">Defence Firm</th>
      <th scope="col">Provider</th>
      <th scope="col">Filling S&C </th>
      <th scope="col">Total Out</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($basicIntakes as $basic)
    <tr>
      <td>{{$basic['file_number']}}</td>
      <td>{{$basic['created_at']}}</td>
      <td>{{$basic['status']}}</td>
      <td>{{$basic->defenseFirm['name']}}</td>
      <td>{{$basic->provoiderInformation['name']}}</td>
      <td>$0.00</td>
      <td>$288</td>
      <td class="action-wrap text-center">
        <a class="btn edit-ProviderInformation-modal" data-url="{{ route('ligitation.edit',$basic['id']) }}" data-bs-toggle="modal" data-bs-target="#ArbitratorModal"><i class="fa fa-edit"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>