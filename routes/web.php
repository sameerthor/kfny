<?php

use App\Http\Controllers\Admin\DataManagement\DefenseFirmController;
use App\Http\Controllers\Admin\DataManagement\InsuranceCompanyController;
use App\Http\Controllers\Admin\DataManagement\JudgeController;
use App\Http\Controllers\Admin\DataManagement\VenueController;
use App\Http\Controllers\Admin\DataManagement\DenialReasonController;
use App\Http\Controllers\Admin\DataManagement\ArbitratorController;
use App\Http\Controllers\Admin\DataManagement\ProvoiderInformationController;
use App\Http\Controllers\Admin\DataManagement\CaseStatusController;
use App\Http\Controllers\Admin\DataManagement\SettledPersonController;
use App\Http\Controllers\Admin\Ligitation\LigitationController;
use App\Http\Controllers\Admin\Invoice\InvoiceController;
use App\Http\Controllers\Admin\CalenderController;
use Spatie\Permission\Models\Role;
use App\Http\Livewire\Ligitation\BasicIntake\Search;
use App\Models\Arbitrator;
use App\Models\CaseStatus;
use App\Models\DenialReason;
use App\Models\SettledPerson;
use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/trials', function () {
        return view('admin.trials');
    })->name('trials');


    Route::get('/reports', function () {
        return view('admin.reports');
    })->name('reports');

    Route::get('/calender', [CalenderController::class, 'index'])->name('calender');
    Route::get('/calender-data', [CalenderController::class, 'calenderData'])->name('calender.data');
    Route::post('/update-calender-event', [CalenderController::class, 'updateCalenderEvent'])->name('update.calender.data');



    // Route::get('/data-management',function(){
    //     return view('admin.data-management');
    // })->name('data-management');

    Route::get('/eou', function () {
        return view('admin.EOU');
    })->name('eou');

    Route::get('/tasks', function () {
        return view('admin.tasks');
    })->name('tasks');

    Route::get('/settlements', function () {
        return view('admin.settlements');
    })->name('settlements');
});



Route::resource('data-management', ProvoiderInformationController::class, ['names' => [
    'index' => 'data-management',
]]);
Route::get('provider-search/{q?}', [ProvoiderInformationController::class, 'search']);
Route::resource('insurance-company', InsuranceCompanyController::class);
Route::get('insurance-search/{q?}', [InsuranceCompanyController::class, 'search']);
Route::resource('defense-firm', DefenseFirmController::class);
Route::get('firm-search/{q?}', [DefenseFirmController::class, 'search']);

Route::resource('judge', JudgeController::class);
Route::get('judge-search/{q?}', [JudgeController::class, 'search']);

Route::resource('venue', VenueController::class);
Route::get('venue-search/{q?}', [VenueController::class, 'search']);
Route::resource('case-status', CaseStatusController::class);
Route::get('case-status-search/{q?}', [CaseStatusController::class, 'search']);
Route::resource('arbitrator', ArbitratorController::class);
Route::get('arbitrator-search/{q?}', [ArbitratorController::class, 'search']);
Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices');
Route::get('/provider-invoices', [InvoiceController::class, 'providerInvoices']);
Route::get('/print-invoice', [InvoiceController::class, 'printInvoice'])->name('print_invoice');

Route::resource('denial-reason', DenialReasonController::class, ['names' => 'denial_reason']);
Route::resource('settled-person', SettledPersonController::class, ['names' => 'settled_person']);
Route::get('settled-person-search/{q?}', [SettledPersonController::class, 'search']);


Route::get('ligitation', [LigitationController::class, 'livewireView']);

Route::get('ligitation-search', [LigitationController::class, 'search']);
Route::get('ligitation-react', function () {
    return view('admin.Ligitation.ligitation-react');
});

Route::get('filling-info', [LigitationController::class, 'editFillingInfo']);
Route::post('advance-search', [LigitationController::class, 'advanceSearch'])->name('ligitation.advance_search');
Route::post('filling-info', [LigitationController::class, 'updateFillingInfo'])->name('filling-info.store');
Route::get('settlement-info', [LigitationController::class, 'editsettlementInfo']);
Route::post('settlement-info', [LigitationController::class, 'savesettlementInfo'])->name('settlement.store');
Route::post('add-sheet/{id}', function (Request $request, $id) {
    $file_id = $request->get('file_id');
    $name = empty($file_id) ? date("m/d/Y h_i_s A") : 'File#' . $file_id;
    try {
        Sheets::spreadsheet($id)->addSheet($name);
        Sheets::sheet($name)->append($request->get('sheet_data'));
    } catch (Exception $e) {
        Sheets::sheet($name)->update($request->get('sheet_data'));
    }
})->name('exportSpread');

Route::get('/employee-management', [App\Http\Controllers\Admin\EmployeeController::class, 'index'])->name('employee.list');
Route::post('/employee', [App\Http\Controllers\Admin\EmployeeController::class, 'employees'])->name('employee.get');
Route::post('/add-employee', [App\Http\Controllers\Admin\EmployeeController::class, 'add_employee'])->name('employee.add');
Route::post('/edit-employee', [App\Http\Controllers\Admin\EmployeeController::class, 'edit_employee'])->name('employee.edit');
Route::post('/update-employee', [App\Http\Controllers\Admin\EmployeeController::class, 'update_employee'])->name('employee.update');
Route::post('/delete-employee', [App\Http\Controllers\Admin\EmployeeController::class, 'delete_employee'])->name('employee.delete');

Route::get('/add-role', function () {

    $role = Role::create(['name' => 'employee']);
});


Auth::routes();
Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
