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
//
Route::get('/home', 'HomeController@index')->name('home');
//
Route::get('/edit', 'HomeController@edit')->name('editUser');
Route::post('/edit', 'HomeController@update')->name('updateUser');
//
Route::get('/editcareers', 'CareersController@edit')->name('editCareers');
Route::post('/editcareers', 'CareersController@update')->name('updateCareers');
//
Route::get('/preview', 'HomeController@previewResume')->name('preview');
Route::get('/previewCareers', 'CareersController@preview')->name('previewCareers');
//
Route::get('/resume/{code}', 'OpenResumesController@openResume');
Route::get('/career/{code}', 'OpenResumesController@openCareer');
