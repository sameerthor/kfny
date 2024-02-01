<table class="table">
    <thead>
        <tr>
            <th scope="col">Insurance Company</th>
            <th scope="col">Name</th>
            <th scope="col">City</th>
            <th scope="col">State</th>
            <th scope="col">Zip Code</th>
            <th scope="col">Phone Number</th>
            <th scope="col">NAIC</th>
            <th scope="col">DMV</th>
            <th scope="col">Fax Number</th>
            <th scope="col" class="action-wrap text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($insuranceInformation as $info)
        <tr>
            <td>{{$info['insurance_company']}}</td>
            <td>{{$info['name']}}</td>
            <td>{{$info['city']}}</td>
            <td>{{$info['state']}}</td>
            <td>{{$info['zip_code']}}</td>
            <td>{{$info['phone_number']}}</td>
            <td>{{$info['NAIC']}}</td>
            <td>{{$info['DMV']}}</td>
            <td>{{$info['fax_number']}}</td>

            <td class="action-wrap text-center">

                <a class="btn edit-ProviderInformation-modal" data-url="{{ route('insurance-company.edit',$info['id']) }}" data-bs-toggle="modal" data-bs-target="#ArbitratorModal"><i class="fa fa-edit"></i></a>

                <a class="delete-insurance  btn button-danger btn-xs tooltip-top" data-id="{{ $info['id'] }}" data-url="{{ route('insurance-company.destroy',$info['id']) }}" data-tooltip="Delete Webinar"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>