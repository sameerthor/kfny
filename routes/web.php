<?php

use App\Http\Controllers\Admin\DataManagement\DefenseFirmController;
use App\Http\Controllers\Admin\DataManagement\InsuranceCompanyController;
use App\Http\Controllers\Admin\DataManagement\JudgeController;
use App\Http\Controllers\Admin\DataManagement\VenueController;
use App\Http\Controllers\Admin\DataManagement\ArbitratorController;
use App\Http\Controllers\Admin\DataManagement\ProvoiderInformationController;
use App\Http\Controllers\Admin\Ligitation\LigitationController;
use App\Http\Controllers\Admin\Invoice\InvoiceController;
use App\Models\Arbitrator;
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

Route::get('/',function(){
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/trials',function(){
    return view('admin.trials');
})->name('trials');


Route::get('/reports',function(){
    return view('admin.reports');
})->name('reports');

Route::get('/calender',function(){
    return view('admin.calender');
})->name('calender');

// Route::get('/data-management',function(){
//     return view('admin.data-management');
// })->name('data-management');

Route::get('/eou',function(){
    return view('admin.EOU');
})->name('eou');

Route::get('/tasks',function(){
    return view('admin.tasks');
})->name('tasks');

Route::get('/settlements',function(){
    return view('admin.settlements');
})->name('settlements');
});



Route::resource('data-management',ProvoiderInformationController::class,['names' => [
        'index' => 'data-management',
    ]]);    
Route::resource('insurance-company',InsuranceCompanyController::class);    
Route::resource('defense-firm',DefenseFirmController::class);    
Route::resource('judge',JudgeController::class);    
Route::resource('venue',VenueController::class);    
Route::resource('arbitrator',ArbitratorController::class);    
Route::get('/invoices',[InvoiceController::class, 'index'])->name('invoices');
Route::get('/provider-invoices',[InvoiceController::class, 'providerInvoices']);
Route::get('/print-invoice',[InvoiceController::class, 'printInvoice'])->name('print_invoice');



Route::get('ligitation', [LigitationController::class, 'livewireView']);

Route::get('ligitation-search', [LigitationController::class, 'search']);
Route::get('ligitation-react',function(){
    return view('admin.Ligitation.ligitation-react');
});

Route::get('filling-info', [LigitationController::class, 'editFillingInfo']);
Route::post('advance-search', [LigitationController::class, 'advanceSearch'])->name('ligitation.advance_search');
Route::post('filling-info', [LigitationController::class, 'updateFillingInfo'])->name('filling-info.store');
Route::get('settlement-info', [LigitationController::class, 'editsettlementInfo']);
Route::post('settlement-info', [LigitationController::class, 'savesettlementInfo'])->name('settlement.store');



Auth::routes();
Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
