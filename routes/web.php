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

//Home buttons
Route::get('/home/create/condo', 'HomeController@createCondo');
Route::post('/home/store/condo', 'HomeController@storeCondo');

//Billing statement
Route::get('/billing/consult', 'BillingStatementController@consult');
Route::get('/billing/consult/pdf', 'BillingStatementController@pdf');

//Financial statement
Route::get('/financial/consult', 'FinancialStatementController@consult');
Route::get('/financial/consult/pdf', 'FinancialStatementController@pdf');

//Fill formats
Route::get('/fillformats/select', 'FillFormatController@select');
Route::post('/fillformats/write', 'FillFormatController@write');
Route::post('/fillformats/write/pdf/{format}', 'FillFormatController@pdf');

//CRUD routes
Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('condos', 'CondoController');
Route::resource('typeofestates', 'TypeOfEstateController');
Route::resource('estates', 'EstateController');
Route::resource('typeoftransactions', 'TypeOfTransactionController');
Route::resource('transactions', 'TransactionController');
Route::resource('receipts', 'ReceiptController');
Route::resource('announcements', 'AnnouncementController');
Route::resource('typeofvisitors', 'TypeOfVisitorController');
Route::resource('visitors', 'VisitorController');
Route::resource('typeofresources', 'TypeOfResourceController');
Route::resource('resources', 'ResourceController');
Route::resource('assets', 'AssetController');
Route::resource('incidences', 'IncidenceController');
Route::resource('typeofincidences', 'TypeOfIncidenceController');
Route::resource('formats', 'FormatController');
Route::resource('typeofformats', 'TypeOfFormatController');



//ajax routes

Route::prefix('ajax')->group(function () {
    Route::get('users', 'AjaxController@users');
    Route::get('estatesCondo', 'AjaxController@estatesCondo');
    Route::get('transactionEstate', 'AjaxController@transactionEstate');
});


