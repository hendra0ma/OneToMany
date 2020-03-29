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

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home/newTask/{id}','HomeController@newTask');


//customTask
Route::post('home/change/{id}','HomeController@change');
Route::get('/home/deleteCustomTask/{id}','HomeController@deleteCustomTask');
Route::get('/home/delete/{id}','HomeController@deleteCard');
Route::post('/home/newCard','HomeController@newCard');
Route::get('/deleteAll','HomeController@deleteAll');
Route::get('/returncard/{id}','HomeController@returncard');
Route::post('/sendEmail','HomeController@sendEmail');


//history & calendar
Route::get('/home/history','secondController@index');
Route::get('/deleteHistory/{id}','secondController@deleteHistory');
Route::get('/home/ChangeDate','HomeController@ChangeDate');
Route::get('/home/kalender','secondController@calendar');
Route::get('/home/create','HomeController@insertTaskCalendar');
//ajax
Route::get('/home/ajax','secondController@tampil');
Route::get('/home/tampil','secondController@ajax');
Route::get('/calendarjson','secondController@jsonCalendar')->name('routeLoadEvents');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
