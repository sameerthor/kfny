<div class="col-md-12" id="employees">
          @if(count($employees)>0)
          <table class="table table-w-80">
            <thead class="border-n">
              <tr>
                <th>Name</th>
                <th>Email ID</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="tr-border td-styles tr-hover">
              @foreach($employees as $employee)
              <tr>
                <td><b>{{ucfirst($employee->name)}}</b></td>
                <td>{{$employee->email}}</td>
                <td>
                <a href="javascript:void(0)" class="btn" data-id='{{$employee->id}}' class="edit dropdown-item"><i class="fa fa-edit"></i></a>
                <a href="javascript:void(0)" class="btn" data-id='{{$employee->id}}' class="delete dropdown-item"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
          <p>No employee found here.</p>
          @endif
        </div>