@extends('layouts.app')

@section('content')

<div id="main_container">
  <div class="row">
    <div class="col-md-12">
      <div class="page_title">
        Employee Management
      </div>
    </div>
  </div>
  <div class="kfnythemes_modal mt-4">
    <div class="col-md-2 serch_input">
      <input type="seach" name="search" id="search" placeholder="Search">
    </div>
    <!-- Button trigger modal  html start-->
    <div class="button_one">
      +<span id="add_employee">Add New Employee</span>

    </div>
    <!-- Button trigger modal  html start-->
  </div>
  <div class="row">
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
  </div>

</div>

<div class="modal fade" tabindex="-1" role="dialog" id="employee_form">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><span id="modal_title"></span> employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div style="display:none" id="modal_employee_id"></div>
          <div class="form-group">
            <label for="name" class="col-form-label">Name:</label>
            <input type="text" name="name" class="form-control" id="name">
          </div>
          <div class="form-group">
            <label for="email" class="col-form-label">Email:</label>
            <input type="email" name="email" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label for="contact" class="col-form-label">Contact:</label>
            <input type="text" name="contact" class="form-control" id="contact">
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">Password:</label>
            <input type="password" name="new_password" autocomplete="off" class="form-control" id="password">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="submit_employee" class="save_button btn btn-secondary">Save</button>
      </div>
    </div>
  </div>
</div>

<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#search').on('keyup change', function() {
    refreshtable();
  });

  function refreshtable() {
    var search = $("#search").val();
    $.ajax({
      type: 'POST',
      url: "{{ route('employee.get') }}",
      data: {
        search: search,
      },
      success: function(data) {
        $("#employees").html(data)
      }
    });
  }


  $(document).on("click", ".edit", function() {
    let id = $(this).data('id');
    jQuery.ajax({
      type: 'POST',
      url: "{{ route('employee.edit') }}",
      data: {
        id: id,
      },
      success: function(data) {
        $("#modal_title").html("Edit");
        $("#modal_employee_id").text(data.id);
        $("#name").val(data.name);
        $("#email").val(data.email);
        $("#contact").val(data.contact);
        $("#password").val("");


        $(".save_button").attr("id", "update_employee")
        $("#employee_form").modal('show');

      }
    })

  });

  $(document).on("click", "#add_employee", function() {
    $(".save_button").attr("id", "submit_employee")
    $("#modal_employee_id").text("");
    $("#modal_title").html("Add");
    $("#name").val("");
    $("#email").val("");
    $("#contact").val("");
    $("#password").val("");
    $("#employee_form").modal('show');
  });

  $(document).on("click", ".close", function() {
    $("#employee_form").modal('hide');
  });




  $(document).ready(function() {

    $(document).on('click', "#submit_employee", function() {
      var name = $("#name").val();
      var email = $("#email").val();
      var contact = $("#contact").val();
      var password = $("#password").val();
      if (name == "") {
        alert("Please enter name.");
        return false;
      }
      if (email == "") {
        alert("Please enter email.");
        return false;
      }

      jQuery.ajax({
        type: 'POST',
        url: "{{ route('employee.add') }}",
        data: {
          name: name,
          email: email,
          contact: contact,
          password: password,
        },
        success: function(data) {
          $("#employee_form").modal('hide');
          $("#name").val("");
          $("#email").val("");
          $("#contact").val("");
          $("#password").val("");

          toastr.success('Employee has been saved successfully', 'Success!', {
            timeOut: '4000',
          })
          refreshtable();

        }
      });
    });
    $(document).on('click', "#update_employee", function() {
      console.log("yes");
      var name = $("#name").val();
      var email = $("#email").val();
      var contact = $("#contact").val();
      var password = $("#password").val();
      var id = $("#modal_employee_id").text();

      jQuery.ajax({
        type: 'POST',
        url: "{{ route('employee.update') }}",
        data: {
          id: id,
          name: name,
          email: email,
          contact: contact,
          password: password,
        },
        success: function(data) {
          $("#employee_form").modal('hide');
          $("#name").val("");
          $("#email").val("");
          $("#contact").val("");
          $("#password").val("");
          $("#modal_employee_id").text("");
          toastr.success('Employee has been updated successfully', 'Success!', {
            timeOut: '4000',
          })
          refreshtable();
        }
      });
    });
  });

  $(document).on("click", ".delete", function() {
    let id = $(this).data('id');
    if (confirm("Do you want to delete this employee ?")) {
      jQuery.ajax({
        type: 'POST',
        url: "{{ route('employee.delete') }}",
        data: {
          id: id,
        },
        success: function(data) {
          refreshtable();

        }
      })
    }
  });
</script>
@endsection