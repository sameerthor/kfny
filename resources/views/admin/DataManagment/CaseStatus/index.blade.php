<table class="table">
    <thead>
        <tr>
            <th scope="col">Case Status Name</th>
            <th scope="col" class="action-wrap text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($caseStatusInformation as $info)
        <tr>
            <td>{{$info['status']}}</td>
            <td class="action-wrap text-center">

                <a class="btn edit-case-status-modal" data-url="{{ route('case-status.edit',$info['id']) }}" data-bs-toggle="modal" data-bs-target="#ArbitratorModal"><i class="fa fa-edit"></i></a>

                <a class="delete  btn button-danger btn-xs tooltip-top" data-id="{{ $info['id'] }}" data-url="{{ route('case-status.destroy',$info['id']) }}" data-tooltip="Delete Webinar"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>