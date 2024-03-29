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

Route::post('/lessons/{id}/update-status', 'LessonsController@updateStatus');
Route::get('/lessons/{id}/mark-attendance', 'LessonsController@markAttendance');
Route::post('/lessons/{id}/store-attendance', 'LessonsController@storeAttendance');
Route::post('/students/{id}/change-pic', 'StudentsController@changePic');
Route::post('/students/{id}/join-group', 'StudentsController@joinGroup');
Route::post('/students/{id}/receive-report', 'StudentsController@receiveReport');
Route::resource('students', 'StudentsController');
Route::resource('groups', 'GroupsController');

Route::post('/make-payment/{student_id}', 'PaymentsController@store');
Route::post('/interactions', 'InteractionsController@store')->name('interactions.store');

Route::post('assignments/assign/store', 'AssignmentsController@assignStore')->name('assignments.assign.store'); // is this even necessary???
Route::get('assignments/assign/{group_id}', 'AssignmentsController@assign')->name('assignments.assign');


Route::resource('assignments', 'AssignmentsController');

Route::get('/schools', 'SchoolsController@index')->name('schools.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
