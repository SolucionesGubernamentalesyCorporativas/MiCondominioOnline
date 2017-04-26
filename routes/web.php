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

Route::get('/home', 'HomeController@index');

//Billing statement
Route::get('/billing/consult', 'BillingStatementController@consult');
Route::get('/billing/consult/pdf', 'BillingStatementController@pdf');

//Financial statement
Route::get('/financial/consult', 'FinancialStatementController@consult');
Route::get('/financial/consult/pdf', 'FinancialStatementController@pdf');

//CRUD routes
Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('condos', 'CondoController');
Route::resource('estates', 'EstateController');
Route::resource('typeoftransactions', 'TypeOfTransactionController');
Route::resource('transactions', 'TransactionController');
Route::resource('receipts', 'ReceiptController');
Route::resource('announcements', 'AnnouncementController');
Route::resource('typeofvisitors', 'TypeOfVisitorController');
Route::resource('visitors', 'VisitorController');
Route::resource('typeofresources', 'TypeOfResourceController');
Route::resource('resources', 'ResourceController');
