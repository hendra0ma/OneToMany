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


//Process Task
Route::post('/home/newTaskProcess','HomeController@insertTask');
Route::get('/home/deleteTask/{id}','HomeController@deleteTask');
Route::get('/home/updateToProcess/{id}','HomeController@process');
Route::get('/home/updateToFinish/{id}','HomeController@finish');
Route::get('/home/kirimemail','secondController@mailer');
Route::get('/home/ChangeDate','HomeController@ChangeDate');

//customTask
Route::get('/home/custom','HomeController@customPage');
Route::post('home/change/{id}','HomeController@change');
Route::get('/home/deleteCustomTask/{id}','HomeController@deleteCustomTask');
Route::get('/home/delete/{id}','HomeController@deleteCard');
Route::post('/home/newCard','HomeController@newCard');

//history & calendar
Route::get('/home/history','secondController@index');

Route::get('/home/kalender','secondController@calendar');
Route::get('/home/create','HomeController@insertTaskCalendar');
//ajax
Route::get('/home/ajax','secondController@tampil');
Route::get('/home/tampil','secondController@ajax');
Route::get('/calendarjson','secondController@jsonCalendar')->name('routeLoadEvents');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
