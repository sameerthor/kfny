<table class="table">
    <thead>
        <tr>
            <th scope="col">Firm Name</th>
            <th scope="col">Name</th>
            <th scope="col">City</th>
            <th scope="col">State</th>
            <th scope="col">Zip Code</th>
            <th scope="col">Phone Number</th>
     
            <th scope="col">Fax Number</th>
            <th scope="col">Best Contact Person</th>
            <th scope="col">Known Email</th>
            <th scope="col" class="action-wrap text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($DefenseInformation as $info)
        <tr>
            <td>{{$info['firm_name']}}</td>
            <td>{{$info['name']}}</td>
            <td>{{$info['city']}}</td>
            <td>{{$info['state']}}</td>
            <td>{{$info['zip_code']}}</td>
            <td>{{$info['phone_number']}}</td>
            <td>{{$info['fax_number']}}</td>
            <td>{{$info['best_contact_person']}}</td>
            <td>{{$info['known_email']}}</td>

            <td class="action-wrap text-center">

                <a class="btn edit-defence-modal" data-url="{{ route('defense-firm.edit',$info['id']) }}" data-bs-toggle="modal" data-bs-target="#ArbitratorModal"><i class="fa fa-edit"></i></a>

                <a class="delete-defence  btn button-danger btn-xs tooltip-top" data-id="{{ $info['id'] }}" data-url="{{ route('defense-firm.destroy',$info['id']) }}" data-tooltip="Delete Webinar"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>