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
    Route::post('/hire_employee','Hire_infoController@store');
    Route::post('/hire_employee/{id}','Hire_infoController@update')->name('acceptInvite');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    
    Route::get('/interests', 'InterestController@update'); 
    
    Route::get('/availableforjob', 'AvailableForJobController@index')->name('availableforjob');
    Route::get('/jobpost/{post_id}/user/{employer_id}/type/{notification_type}/id/{id}', 'Hire_infoController@show')->name('getJobpost');
    Route::get('/public_view/{id}/jobposts/{jobpost_id?}/employer/{employer_id?}', 'PublicprofileController@index')->name('public_view');
   

    //Route::post('/post', 'PostController@store');
 
    Route::resource('interests', 'InterestController');
    Route::resource('users', 'UserController'); 
    Route::resource('home', 'HomeController');
    Route::resource('profile', 'ProfileController');
    Route::resource('jobpost', 'JobpostController');
    Route::resource('hire_employee', 'Hire_infoController');
    Route::resource('availableforjob', 'AvailableForJobController');


    Route::post('search', 'SearchController@search');
    Route::get('search', 'SearchController@index');

   // Route::post('search', 'JobpostController@index');
  //  Route::get('search', 'JobpostController@index');
   // Route::post('/search', 'JobpostController@search');
   

    Route::post('/desire','InterestController@insertdesire');

    Route::post('/rating', 'RatingController@store');

    Route::get('/rating/showlikedPost','RatingController@isLiked');
    Route::get('/rating/getdata', 'RatingController@getdata');
   // Route::get('profile', 'ProfileController@index');
   // Route::post('profile', 'ProfileController@update_avatar');
   Route::post('/comment/postComment', 'CommentsController@postComment');
   Route::post('/comment/getComment', 'CommentsController@getComment');


    Route::resource('post', 'PostController');
    Route::resource('comment', 'CommentsController');
    Route::resource('reply', 'ReplyController');
    Route::resource('applicants', 'ApplicantsController');
  //  Route::any('/search', 'JobpostController@search');
     

     
     
     
    //Route::any('/search', 'JobpostController@search');
    
});





