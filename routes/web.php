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
Route::get('/edit', 'HomeController@editUser')->name('editUser');
Route::post('/edit', 'HomeController@updateUser')->name('updateUser');
Route::get('/editcareers', 'HomeController@editCareers')->name('editCareers');
Route::post('/editcareers', 'HomeController@updateCareers')->name('updateCareers');

Route::get('/preview', 'HomeController@previewResume')->name('preview');

Route::get('/{code}', 'HomeController@openResume')->name('openResume');
