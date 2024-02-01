<table class="table">
    <thead>
        <tr>
            <th scope="col">Provider Type</th>
            <th scope="col">Name</th>
            <th scope="col">City</th>
            <th scope="col">State</th>
            <th scope="col">Zip Code</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Tax Id</th>
            <th scope="col">Owner Name</th>
            <th scope="col" class="action-wrap text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($provoiderInformation as $info)
        <tr>
            <td>{{$info['provider_type']}}</td>
            <td>{{$info['name']}}</td>
            <td>{{$info['city']}}</td>
            <td>{{$info['state']}}</td>
            <td>{{$info['zip_code']}}</td>
            <td>{{$info['phone_number']}}</td>
            <td>{{$info['tax_id']}}</td>
            <td>{{$info['owner_name']}}</td>
            <td class="action-wrap text-center">

                <a class="btn edit-ProviderInformation-modal" data-url="{{ route('data-management.edit',$info['id']) }}" data-bs-toggle="modal" data-bs-target="#ArbitratorModal"><i class="fa fa-edit"></i></a>

                <a class="delete  btn button-danger btn-xs tooltip-top" data-id="{{ $info['id'] }}" data-url="{{ route('data-management.destroy',$info['id']) }}" data-tooltip="Delete Webinar"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>