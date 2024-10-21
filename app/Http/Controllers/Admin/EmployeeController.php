<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
  {
    $employees = User::role('employee')->get();
    return view('employee', compact('employees'));
  }

  public function edit_employee(Request $request)
  {
    return  User::find($request->get('id'));
  }

  public function employees(Request $request)
  {
    $search = $request->get('search');
    $employees = User::where('name', 'like', $search . '%')->role('employee')->get();
    return view('employeetable', compact('employees'))->render();
  }

  public function add_employee(Request $request)
  {
    $employee = new User();
    $employee->name = $request->name;
    $employee->password = bcrypt($request->password);
    $employee->contact = $request->contact;
    $employee->email = $request->email;
    $employee->save();
    $employee = $employee->fresh();
    $employee->assignRole('employee');
    return true;
  }



  public function update_employee(Request $request)
  {
    $employee = User::find($request->get('id'));
    $employee->name = $request->name;
    if (!empty($request->password)) {
      $employee->password = bcrypt($request->password);
    }
    $employee->contact = $request->contact;
    $employee->email = $request->email;
    $employee->save();

    return  true;
  }

  public function delete_employee(Request $request)
  {
    $id = $request->get('id');
    // $schedules=ProjectSchedule::whereJsonContains('employee_id',$id)->get();
    // foreach($schedules as $res)
    // {
    //   $employee = $res->employee_id;

    //   // find request()->img position inside imgs array
    //   $position = array_search(request()->id, $employee);

    //   // delete request()->img
    //   unset($employee[$position]);

    //   $res->employee_id = array_values($employee);
    //   $res->save();
    // }
    User::find($id)->delete();
  }
}
