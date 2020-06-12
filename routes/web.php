<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


//routes for admin
Route::get('/home', 'AdminController@home')->name('admin.home')->middleware('auth');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', 'AdminController@home');

    Route::resource('company', 'CompanyController');
    Route::resource('employee', 'EmployeeController');
});
