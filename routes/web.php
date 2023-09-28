<?php

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

Route::get('/invoices',function(){
    return view('admin.invoices');
})->name('invoices');

Route::get('/reports',function(){
    return view('admin.reports');
})->name('reports');

Route::get('/calender',function(){
    return view('admin.calender');
})->name('calender');

Route::get('/data-management',function(){
    return view('admin.data-management');
})->name('data-management');

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

Auth::routes();
