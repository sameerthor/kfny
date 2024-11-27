<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EOU;

use App\Http\Controllers\Controller;
use App\Models\Appeal;
use App\Models\Arbitration;
use App\Models\EOULetter;
use App\Models\EmployeeCalenderRelation;
use App\Models\TaskAssigned;
use Auth;
use App\Models\Motion;
use App\Models\MotionAdjourned;
use App\Models\TrialDate;
use App\Models\DiscoverAppearance;
use App\Models\Discovery;
use App\Models\DiscoverySchedule;

class CalenderController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
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
        $data[] = array("appearance_model" => "App\Models\EOU", "appearance_type" => 1, "appearance_column" => "eou_date", "appearance_id" => $res['id'], "start" => date('Y-m-d', strtotime($res['eou_date'])) . 'T00:00', "end" => date('Y-m-d', strtotime($res['eou_date'])) . 'T23:59', "title" => 'EOU', "resource" => count($res->assignedTo(1, 'eou_date')->get()) > 0 ? $res->assignedTo(1, 'eou_date')->first()->employee_id  : 10001, "color" => "#6fa8dc", "data" => ['time' => $res['eou_time'], 'location' => $res['eou_location'], 'insurance_company' => $res->insuranceCompany?->name, 'provider' => $res->provoiderInformation?->name, 'status' => $res['eou_status']]);
      if (!empty($res['response_deadline']))
        $data[] = array("appearance_model" => "App\Models\EOU", "appearance_type" => 1, "appearance_column" => "response_deadline", "appearance_id" => $res['id'], "start" => date('Y-m-d', strtotime($res['response_deadline'])) . 'T00:00', "end" => date('Y-m-d', strtotime($res['response_deadline'])) . 'T23:59', "title" => 'EOU-Response Deadlne', "resource" => count($res->assignedTo(1, 'response_deadline')->get()) > 0 ? $res->assignedTo(1, 'response_deadline')->first()->employee_id  : 10001, "color" => "#e06666", "data" => ['insurance_company' => $res->insuranceCompany?->name, 'provider' => $res->provoiderInformation?->name, 'carrier_attorney' => $res['carrier_attorney'], 'status' => $res['eou_status']]);
    }

    $EOULetter = EOULetter::all();
    foreach ($EOULetter as $res) {
      if (!empty($res['adjourned_date']))
        $data[] = array("appearance_model" => "App\Models\EOULetter", "appearance_type" => 1, "appearance_column" => "adjourned_date", "appearance_id" => $res['id'], "start" => date('Y-m-d', strtotime($res['adjourned_date'])) . 'T00:00', "end" => date('Y-m-d', strtotime($res['adjourned_date'])) . 'T23:59', "title" => 'EOU-Adjourned', "resource" => count($res->assignedTo(1, 'adjourned_date')->get()) > 0 ? $res->assignedTo(1, 'adjourned_date')->first()->employee_id  : 10001, "color" => "#e6b8af", "data" => ['insurance_company' => $res->eou->insuranceCompany?->name, 'provider' => $res->eou->provoiderInformation?->name, 'carrier_attorney' => $res->carrier_attorney]);
    }

    $motions = Motion::all();
    foreach ($motions as $res) {
      if (!empty($res['return_date']))
        $data[] = array("appearance_model" => "App\Models\Motion", "appearance_type" => 2, "appearance_column" => "return_date", "appearance_id" => $res['id'], "start" => date('Y-m-d', strtotime($res['return_date'])) . 'T00:00', "end" => date('Y-m-d', strtotime($res['return_date'])) . 'T23:59', "title" => "#" . $res->basic_intake->id . 'Motion-Return Date-' . $res->basic_intake->venue . " " . $res->basic_intake->venueCounty?->venue_name, "resource" => count($res->assignedTo(2, 'return_date')->get()) > 0 ? $res->assignedTo(2, 'return_date')->first()->employee_id  : 10001, "color" => "#c0d2e1", "data" => ['motion_type' => $res->motion_type, 'venue' => $res->basic_intake->venue, 'venue_county' => $res->basic_intake->venueCounty?->venue_name, 'part' => $res->part]);
    }

    $motions_adjourned = MotionAdjourned::all();
    foreach ($motions_adjourned as $res) {
      if (!empty($res['adj_date']))
        $data[] = array("appearance_model" => "App\Models\MotionAdjourned", "appearance_type" => 2, "appearance_column" => "adj_date", "appearance_id" => $res['id'], "start" => date('Y-m-d', strtotime($res['adj_date'])) . 'T00:00', "end" => date('Y-m-d', strtotime($res['adj_date'])) . 'T23:59', "title" => "#" . $res->motion->basic_intake->id . 'Motion-Adjourn Date-' . $res->motion->basic_intake->venue . " " . $res->motion->basic_intake->venueCounty?->venue_name, "resource" => count($res->assignedTo(2, 'adj_date')->get()) > 0 ? $res->assignedTo(2, 'adj_date')->first()->employee_id  : 10001, "color" => "#f4e7c3", "data" => ['time_on' => $res->time_on, 'motion_type' => $res->motion->motion_type, 'Calender #' => $res->calender, 'venue' => $res->motion->basic_intake->venue, 'venue_county' => $res->motion->basic_intake->venueCounty?->venue_name, 'part' => $res->motion->part]);
      if (!empty($res['x_mot_filed']))
        $data[] = array("appearance_model" => "App\Models\MotionAdjourned", "appearance_type" => 2, "appearance_column" => "x_mot_filed", "appearance_id" => $res['id'], "start" => date('Y-m-d', strtotime($res['x_mot_filed'])) . 'T00:00', "end" => date('Y-m-d', strtotime($res['x_mot_filed'])) . 'T23:59', "title" => "#" . $res->motion->basic_intake->id . 'Motion-X-Mot. Filed-' . $res->motion->basic_intake->venue . " " . $res->motion->basic_intake->venueCounty?->venue_name, "resource" => count($res->assignedTo(2, 'x_mot_filed')->get()) > 0 ? $res->assignedTo(2, 'x_mot_filed')->first()->employee_id  : 10001, "color" => "#ffd966", "data" => ['Opp Due' => $res->opp_due, 'Reply Due' => $res->reply_due, 'venue' => $res->motion->basic_intake->venue, 'venue_county' => $res->motion->basic_intake->venueCounty?->venue_name]);
    }

    $trials = TrialDate::all();
    foreach ($trials as $res) {
      if (!empty($res['trial_date']))
        $data[] = array("appearance_model" => "App\Models\TrialDate", "appearance_type" => 3, "appearance_column" => "trial_date", "appearance_id" => $res['id'], "start" => date('Y-m-d', strtotime($res['trial_date'])) . 'T00:00', "end" => date('Y-m-d', strtotime($res['trial_date'])) . 'T23:59', "title" => "#" . $res->trial->basic_intake->id . 'Trial Date-' . $res->trial->basic_intake->venue . " " . $res->trial->basic_intake->venueCounty?->venue_name, "resource" => count($res->assignedTo(3, 'trial_date')->get()) > 0 ? $res->assignedTo(3, 'trial_date')->first()->employee_id  : 10001, "color" => "#8e7cc3", "data" => ['Time On' => $res->time_on, "Calendar" => $res->calender, "Prima Facie" => $res->prima_facie, "Discovery D. 3101(d)" => $res->trial->basic_intake->discovery?->d_3101]);
    }



    $arbitrations = Arbitration::all();
    foreach ($arbitrations as $res) {
      if (!empty($res['arbitration_date']))
        $data[] = array("appearance_model" => "App\Models\Arbitration", "appearance_type" => 4, "appearance_column" => "arbitration_date", "appearance_id" => $res['id'], "start" => date('Y-m-d', strtotime($res['arbitration_date'])) . 'T00:00', "end" => date('Y-m-d', strtotime($res['arbitration_date'])) . 'T23:59', "title" => "#" . $res->basic_intake->id . 'Arbitration', "resource" => count($res->assignedTo(4, 'arbitration_date')->get()) > 0 ? $res->assignedTo(4, 'arbitration_date')->first()->employee_id  : 10001, "color" => "#efefef", "data" => ['Arbitration Status' => $res->arbitration_status]);
    }


    $discovery_appearances = DiscoverAppearance::all();
    foreach ($discovery_appearances as $res) {
      if (!empty($res['date']))
        $data[] = array("appearance_model" => "App\Models\DiscoverAppearance", "appearance_type" => 6, "appearance_column" => "date", "appearance_id" => $res['id'], "start" => date('Y-m-d', strtotime($res['date'])) . 'T00:00', "end" => date('Y-m-d', strtotime($res['date'])) . 'T23:59', "title" => "#" . $res->discovery->basic_intake->id . 'Discovery Appearance' . $res->discovery->basic_intake->venue . " " . $res->discovery->basic_intake->venueCounty?->venue_name, "resource" => count($res->assignedTo(6, 'date')->get()) > 0 ? $res->assignedTo(6, 'date')->first()->employee_id  : 10001, "color" => "#fff2cc", "data" => ["Appearance Type" => $res['appearance_type'], "Date" => $res['date'], "Time" => $res['time'], "Location" => $res['location'], "In Person or Virtual" => $res['inperson_vertual']]);
    }


    $discovery_schedules = DiscoverySchedule::all();
    foreach ($discovery_schedules as $res) {
      if (!empty($res['demand_due']))
        $data[] = array("appearance_model" => "App\Models\DiscoverySchedule", "appearance_type" => 6, "appearance_column" => "demand_due", "appearance_id" => $res['id'], "start" => date('Y-m-d', strtotime($res['demand_due'])) . 'T00:00', "end" => date('Y-m-d', strtotime($res['demand_due'])) . 'T23:59', "title" => "#" . $res->discovery->basic_intake->id . 'Discovery Schedule- Demand Due ' . $res->discovery->basic_intake->venue . " " . $res->discovery->basic_intake->venueCounty?->venue_name, "resource" => count($res->assignedTo(6, 'demand_due')->get()) > 0 ? $res->assignedTo(6, 'demand_due')->first()->employee_id  : 10001, "color" => "#ddc0a5", "data" => []);

      if (!empty($res['resp_due']))
        $data[] = array("appearance_model" => "App\Models\DiscoverySchedule", "appearance_type" => 6, "appearance_column" => "resp_due", "appearance_id" => $res['id'], "start" => date('Y-m-d', strtotime($res['resp_due'])) . 'T00:00', "end" => date('Y-m-d', strtotime($res['resp_due'])) . 'T23:59', "title" => "#" . $res->discovery->basic_intake->id . 'Discovery Schedule - Response Due ' . $res->discovery->basic_intake->venue . " " . $res->discovery->basic_intake->venueCounty?->venue_name, "resource" => count($res->assignedTo(6, 'resp_due')->get()) > 0 ? $res->assignedTo(6, 'resp_due')->first()->employee_id  : 10001, "color" => "#ddc0a5", "data" => []);

      if (!empty($res['ebt_deadlines']))
        $data[] = array("appearance_model" => "App\Models\DiscoverySchedule", "appearance_type" => 6, "appearance_column" => "ebt_deadlines", "appearance_id" => $res['id'], "start" => date('Y-m-d', strtotime($res['ebt_deadlines'])) . 'T00:00', "end" => date('Y-m-d', strtotime($res['ebt_deadlines'])) . 'T23:59', "title" => "#" . $res->discovery->basic_intake->id . 'Discovery Schedule- EBT Deadlines ' . $res->discovery->basic_intake->venue . " " . $res->discovery->basic_intake->venueCounty?->venue_name, "resource" => count($res->assignedTo(6, 'ebt_deadlines')->get()) > 0 ? $res->assignedTo(6, 'ebt_deadlines')->first()->employee_id  : 10001, "color" => "#ddc0a5", "data" => []);

      if (!empty($res['noi_due']))
        $data[] = array("appearance_model" => "App\Models\DiscoverySchedule", "appearance_type" => 6, "appearance_column" => "noi_due", "appearance_id" => $res['id'], "start" => date('Y-m-d', strtotime($res['noi_due'])) . 'T00:00', "end" => date('Y-m-d', strtotime($res['noi_due'])) . 'T23:59', "title" => "#" . $res->discovery->basic_intake->id . 'Discovery Schedule- NOI Due' . $res->discovery->basic_intake->venue . " " . $res->discovery->basic_intake->venueCounty?->venue_name, "resource" => count($res->assignedTo(6, 'noi_due')->get()) > 0 ? $res->assignedTo(6, 'noi_due')->first()->employee_id  : 10001, "color" => "#ddc0a5", "data" => []);
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
