<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email/Fax</th>
            <th scope="col">Phone Number</th>
            <th scope="col" class="action-wrap text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($settledPersonInformation as $info)
        <tr>
            <td>{{$info['name']}}</td>
            <td>{{$info['email_fax']}}</td>
            <td>{{$info['phone_number']}}</td>
            <td class="action-wrap text-center">

                <a class="btn edit-settled-person-modal" data-url="{{ route('settled_person.edit',$info['id']) }}" data-bs-toggle="modal" data-bs-target="#ArbitratorModal"><i class="fa fa-edit"></i></a>

                <a class="delete  btn button-danger btn-xs tooltip-top" data-id="{{ $info['id'] }}" data-url="{{ route('settled_person.destroy',$info['id']) }}" data-tooltip="Delete Webinar"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>