<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EOU;

use App\Http\Controllers\Controller;
use App\Models\EOULetter;
use App\Models\EmployeeCalenderRelation;
use App\Models\TaskAssigned;
use Illuminate\Support\Arr;
use Auth;

class CalenderController extends Controller
{

  public function index()
  {
    $employees = User::role('employee')->select("id", "name")->get()->toArray();
    $employees[count($employees)] = ['id' => 10001, 'name' => 'Unassigned'];

    return view('admin.calender', compact('employees'));
  }

  public function calenderData()
  {
    $EOUs = EOU::all();
    $data = array();

    foreach ($EOUs as $res) {
      if (!empty($res['eou_date']))
        $data[] = array("appearance_model" => "App\Models\EOU", "appearance_type" => 1, "appearance_column" => "eou_date", "appearance_id" => $res['id'], "start" => date('Y-m-d', strtotime($res['eou_date'])) . 'T00:00', "end" => date('Y-m-d', strtotime($res['eou_date'])) . 'T23:59', "title" => 'EOU', "resource" => count($res->assignedTo(1, 'eou_date')->get()) > 0 ? $res->assignedTo(1, 'eou_date')->first()->employee_id  : 10001, "color" => "yellow", "data" => ['time' => $res['eou_time'], 'location' => $res['eou_location'], 'insurance_company' => $res->insuranceCompany?->name, 'provider' => $res->provoiderInformation?->name, 'status' => $res['eou_status']]);
      if (!empty($res['response_deadline']))
        $data[] = array("appearance_model" => "App\Models\EOU", "appearance_type" => 1, "appearance_column" => "response_deadline", "appearance_id" => $res['id'], "start" => date('Y-m-d', strtotime($res['response_deadline'])) . 'T00:00', "end" => date('Y-m-d', strtotime($res['response_deadline'])) . 'T23:59', "title" => 'EOU-Response Deadlne', "resource" => count($res->assignedTo(1, 'response_deadline')->get()) > 0 ? $res->assignedTo(1, 'response_deadline')->first()->employee_id  : 10001, "color" => "yellow", "data" => ['insurance_company' => $res->insuranceCompany?->name, 'provider' => $res->provoiderInformation?->name, 'carrier_attorney' => $res['carrier_attorney'], 'status' => $res['eou_status']]);
    }

    $EOULetter = EOULetter::all();
    foreach ($EOULetter as $res) {
      if (!empty($res['adjourned_date']))
        $data[] = array("appearance_model" => "App\Models\EOULetter", "appearance_type" => 1, "appearance_column" => "adjourned_date", "appearance_id" => $res['id'], "start" => date('Y-m-d', strtotime($res['adjourned_date'])) . 'T00:00', "end" => date('Y-m-d', strtotime($res['adjourned_date'])) . 'T23:59', "title" => 'EOU-Adjourned', "resource" => count($res->assignedTo(1, 'adjourned_date')->get()) > 0 ? $res->assignedTo(1, 'adjourned_date')->first()->employee_id  : 10001, "color" => "yellow", "data" => ['insurance_company' => $res->eou->insuranceCompany?->name, 'provider' => $res->eou->provoiderInformation?->name, 'carrier_attorney' => $res->carrier_attorney]);
    }



    if (in_array('employee', Auth::user()->roles->pluck('name')->toArray())) {
      $tasks = TaskAssigned::where(['assigned_calender' => '1', 'employee_id' => Auth::id()])->get();

      foreach ($tasks as $res) {
        if (!empty($res['task_deadline']))
          $data[] = array("dragInTime" => false, "dragBetweenResources" => false, "appearance_model" => "App\Models\TaskAssigned", "appearance_type" => 7, "appearance_column" => "task_deadline", "appearance_id" => $res['id'], "start" => date('Y-m-d', strtotime($res['task_deadline'])) . 'T00:00', "end" => date('Y-m-d', strtotime($res['task_deadline'])) . 'T23:59', "title" => '#' . $res['file_no'] . 'Task-' . $res['task_type'], "resource" => $res['employee_id'], "color" => "#FC8D68", "data" => ["Note" => $res['task_notes'], "Status" => ucfirst($res['task_status'])]);
      }
    }

    EmployeeCalenderRelation::upsert(array_map(function ($item) {
      return ["employee_id" => $item["resource"], "appearance_model" => $item["appearance_model"], "appearance_type" => $item["appearance_type"], "appearance_column" => $item["appearance_column"], "appearance_id" => $item["appearance_id"]];
    }, $data), ['appearance_type', 'appearance_column', 'appearance_id']);



    echo json_encode($data);
  }

  public function updateCalenderEvent(Request $request)
  {
    EmployeeCalenderRelation::where(["appearance_type" => $request->get('appearance_type'), "appearance_column" => $request->get('appearance_column'), "appearance_id" => $request->get('appearance_id')])->update(['employee_id' => $request->get('employee_id')]);
    $model = $request->get('appearance_model');
    $model::where('id', $request->get('appearance_id'))->update([$request->get('appearance_column') => $request->get('from_date')]);
  }
}
