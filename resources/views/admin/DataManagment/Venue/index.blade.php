<table class="table">
    <thead>
        <tr>
            <th scope="col">County Name</th>
            <th scope="col" class="action-wrap text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($venueInformation as $info)
        <tr>
            <td>{{$info['venue_name']}}</td>
            <td class="action-wrap text-center">

                <a class="btn edit-venue-modal" data-url="{{ route('venue.edit',$info['id']) }}" data-bs-toggle="modal" data-bs-target="#ArbitratorModal"><i class="fa fa-edit"></i></a>

                <a class="delete  btn button-danger btn-xs tooltip-top" data-id="{{ $info['id'] }}" data-url="{{ route('venue.destroy',$info['id']) }}" data-tooltip="Delete Webinar"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>