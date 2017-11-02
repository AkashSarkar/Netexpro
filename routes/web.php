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

Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::get('/interests', 'InterestController@update'); 

    Route::post('/interests', 'InterestController@index')->name('interests');
 
    Route::resource('interests', 'InterestController');
    Route::resource('users', 'UserController'); 
    Route::resource('home', 'HomeController');
    Route::resource('profile', 'ProfileController');
    Route::resource('jobpost', 'JobpostController');

   // Route::get('profile', 'ProfileController@index');
    Route::post('profile', 'ProfileController@update_avatar');
});





