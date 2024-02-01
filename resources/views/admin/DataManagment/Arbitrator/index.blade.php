<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone #</th>
            <th scope="col" class="action-wrap text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($arbitratorInformation as $info)
        <tr>
            <td>{{$info['name']}}</td>
            <td>{{$info['email']}}</td>
            <td>{{$info['phone_number']}}</td>
            <td class="action-wrap text-center">

                <a class="btn edit-arbitrator-modal" data-url="{{ route('arbitrator.edit',$info['id']) }}" data-bs-toggle="modal" data-bs-target="#ArbitratorModal"><i class="fa fa-edit"></i></a>

                <a class="delete  btn button-danger btn-xs tooltip-top" data-id="{{ $info['id'] }}" data-url="{{ route('arbitrator.destroy',$info['id']) }}" data-tooltip="Delete Webinar"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>