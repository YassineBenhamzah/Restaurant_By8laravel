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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(["register" => false , "reset" => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categories' , 'CategoryController');
Route::resource('tables' , 'tableController');
Route::resource('servants' , 'servantController');
Route::resource('menus' , 'MenuController');
Route::get('payments' , 'PaymentController@index')->name("payments.index");
Route::resource('sales' , 'SalesController');
Route::get('reports' , 'ReportController@index')->name("Reports.index");
Route::post('reports/generate' , 'ReportController@generate')->name("Reports.generate");
Route::post('reports/export' , 'ReportController@export')->name("Reports.export");
