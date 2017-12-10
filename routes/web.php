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
    Route::get('/home/get_post', 'HomeController@get_post');
    Route::post('/home', 'HomeController@store');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::get('/public_view', 'ProfileController@public_view');
    Route::get('/interests', 'InterestController@update'); 
    Route::get('/jobpost', 'JobpostController@index')->name('jobpost');
    Route::get('/availableforjob', 'AvailableForJobController@index')->name('availableforjob');
    //Route::delete('profile/{post_id}','PostController@destroy1')->name('post');

    //Route::post('/post', 'PostController@store');
 
    Route::resource('interests', 'InterestController');
    Route::resource('users', 'UserController'); 
    Route::resource('home', 'HomeController');
    Route::resource('profile', 'ProfileController');
    Route::resource('jobpost', 'JobpostController');
    Route::resource('availableforjob', 'AvailableForJobController');

    Route::post('/desire','InterestController@insertdesire');

    Route::post('/rating', 'RatingController@store');

    Route::get('/rating/showlikedPost','RatingController@isLiked');
    Route::get('/rating/getdata', 'RatingController@getdata');
   // Route::get('profile', 'ProfileController@index');
   // Route::post('profile', 'ProfileController@update_avatar');
    Route::resource('post', 'PostController');
    Route::resource('comment', 'CommentsController');
    Route::resource('applicants', 'ApplicantsController');
    //Route::any('/search', 'JobpostController@search');
});





