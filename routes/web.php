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

Route::post('/make-payment/{student_id}', 'PaymentsController@store');
Route::post('/students/{id}/change-pic', 'StudentsController@changePic');
Route::post('/students/{id}/join-group', 'StudentsController@joinGroup');
Route::resource('students', 'StudentsController');
Route::resource('groups', 'GroupsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
