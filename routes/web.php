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

Route::get('/', 'MainController@index');
Route::post('double', 'MainController@postDouble');

Route::get('admin', 'AdminController@getLogin');
Route::post('admin', 'AdminController@postLogin');
Route::get('admin/dashboard', 'AdminController@getDashboard');
Route::get('admin/deposits', 'AdminController@getDeposits');
Route::post('admin/change-deposit-status', 'AdminController@postChangeDepositStatus');
Route::get('admin/payouts', 'AdminController@getPayouts');
Route::post('admin/add-payout', 'AdminController@postAddPayout');

Route::get('admin/logout', 'AdminController@getLogout');
