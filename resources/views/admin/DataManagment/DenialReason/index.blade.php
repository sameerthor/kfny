<table class="table">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col" class="action-wrap text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($denialReasonInformation as $info)
        <tr>
            <td>{{$info['title']}}</td>
            <td>{{$info['description']}}</td>
            <td class="action-wrap text-center">

                <a class="btn edit-denial-reason-modal" data-url="{{ route('denial_reason.edit',$info['id']) }}" data-bs-toggle="modal" data-bs-target="#ArbitratorModal"><i class="fa fa-edit"></i></a>

                <a class="delete  btn button-danger btn-xs tooltip-top" data-id="{{ $info['id'] }}" data-url="{{ route('denial_reason.destroy',$info['id']) }}" data-tooltip="Delete Webinar"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>