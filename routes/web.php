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
    //Route::get('/users', 'UserController@index')->name('users');
    Route::post('/interests', 'InterestController@index')->name('interests');
    Route::get('/profile/{ user_id? }', 'ProfileController@index');

    //Route::any('/profile/{{}}', 'ProfileController@index');
    
    
    Route::resource('interests', 'InterestController');
    Route::resource('users', 'UserController'); 
    Route::resource('home', 'HomeController');
    Route::resource('profile', 'ProfileController');
});





