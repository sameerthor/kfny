<table class="table">
    <thead>
        <tr>
            <th scope="col">Index #</th>
            <th scope="col">Claim #</th>
            <th scope="col">Appeal Docket No.</th>
            <th scope="col">Patient Last Name</th>
            <th scope="col">Patient First Name</th>
            <th scope="col">Insured Name</th>
            <th scope="col">Court Attorney Name</th>
            <th scope="col">Policy #</th>
            <th scope="col">Venue County</th>
            <th scope="col">DOA</th>
            <th scope="col">Carrier Attorney</th>
            <th scope="col">Insurance Company</th>
            <th scope="col">Status</th>
            <th scope="col" class="action-wrap text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @if(count($basicIntakeData)>0)
        @foreach($basicIntakeData as $info)
        <tr>
            <td>{{$info['index_no']}}</td>
            <td>{{$info['claim_number']}}</td>
            <td>{{$info['appeal_docket']}}</td>
            <td>{{$info['last_name']}}</td>
            <td>{{$info['first_name']}}</td>
            <td>{{$info['insured']}}</td>
            <td>{{$info['carrier_attorney']}}</td>
            <td>{{$info['policy_number']}}</td>     
            <td>{{$info->venueCounty->venue_name}}</td>
            <td>{{date('Y-m-d',strtotime($info['doa']))}}</td>
            <td>{{$info->defenseFirm->name}}</td>
            <td>{{$info->insuranceCompany->name}}</td>
            <td>
                {{$info['status']=="1" ?"Active":""}}
                {{$info['status']=="2" ?"Appeal":""}}
                {{$info['status']=="3" ?"Archived":""}}
                {{$info['status']=="4" ?"Decison - Denied":""}}
                {{$info['status']=="5" ?"Decison - Lost":""}}
                {{$info['status']=="6" ?"Decison - Paid":""}}
                {{$info['status']=="7" ?"Decison - Trial":""}}
            </td>
            <td class="action-wrap text-center">

                <a class="btn btn-info view_case" data-id="{{$info['id']}}">View</a>

            </td>
        </tr>
        @endforeach
        @else
        <td colspan="14" style="text-align:center"><p>No Data Found.</p></td>
        @endif
    </tbody>
</table>