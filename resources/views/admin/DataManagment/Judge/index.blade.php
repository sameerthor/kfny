<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Vanue</th>
            <th scope="col">Court</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
     
            <th scope="col">Address</th>
            <th scope="col">Court Attorney Name</th>
            <th scope="col">Court Attorney Name Email</th>
            <th scope="col">Court Attorney Name Phone</th>
            <th scope="col" class="action-wrap text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($JudgeInformation as $info)
        <tr>
            <td>{{$info['name']}}</td>
            <td>{{$info['vanue']}}</td>
            <td>{{$info['court']}}</td>
            <td>{{$info['email']}}</td>
            <td>{{$info['phone_number']}}</td>
            <td>{{$info['address']}}</td>
            <td>{{$info['court_attorney_name']}}</td>
            <td>{{$info['court_attorney_email']}}</td>
            <td>{{$info['court_attorney_phone_number']}}</td>

            <td class="action-wrap text-center">

                <a class="btn edit-judge-modal" data-url="{{ route('judge.edit',$info['id']) }}" data-bs-toggle="modal" data-bs-target="#ArbitratorModal"><i class="fa fa-edit"></i></a>

                <a class="delete-judge  btn button-danger btn-xs tooltip-top" data-id="{{ $info['id'] }}" data-url="{{ route('judge.destroy',$info['id']) }}" data-tooltip="Delete Webinar"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>