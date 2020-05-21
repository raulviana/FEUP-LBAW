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

use App\Http\Controllers\PostController;

Route::get('/', 'HomepageController@display')->name('home');



// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// User 
Route::get('profile/{id}', 'UserController@show');
Route::get('profile/{id}/edit', 'UserController@edit');
Route::post('profile/{id}/edit', 'UserController@update');
Route::delete('api/users/{id}/delete', 'UserController@delete');
Route::post('api/users/{id}/restore', 'UserController@restore');
Route::get('api/users/search', 'UserController@search');

// Static pages
Route::get('faq' , 'HomepageController@faq')->name('faq');
Route::get('aboutus', 'HomepageController@about')->name('aboutus');

//Admin
//Route::get('/admin/users', 'AdminController@display')->name('admin');
Route::get('/admin/users', 'AdminController@users')->name('admin-users');
//Route::delete('api/admin/users/{id}', 'AdminController@deleteUser')->name('admin-del-user');
Route::get('/admin/events', 'AdminController@events')->name('admin-events');



//Events
//Route::resource('events', 'EventController');
Route::get('/events', 'EventController@list');
Route::get('/events/create', 'EventController@create');
Route::post('/events/create', 'EventController@store');
Route::get('/events/{id}/edit', 'EventController@edit');
Route::post('/events/{id}/edit', 'EventController@update');
Route::get('/events/{id}', 'EventController@show');
Route::delete('api/events/{id}/delete', 'EventController@delete');
Route::post('/api/events/{id}/restore', 'EventController@restore');
Route::delete('api/events/{event_id}/remove/{user_id}', 'EventController@removeCollaborator');
Route::put('api/events/{event_id}/add/{user_id}', 'EventController@addCollaborator');



//Tags
Route::get('/tags/{name}', 'TagController@show');
 

//Posts
Route::put('api/events/{id}/posts/create', 'PostController@store');
Route::get('api/events/{id}/posts/get', 'PostController@get');
Route::post('api/events/{eventid}/posts/{postid}/edit', 'PostController@edit');
Route::delete('/api/posts/{postid}/delete', 'PostController@delete');

//Reviews
Route::put('api/events/{id}/up', 'ReviewController@likeVote');
Route::put('api/events/{id}/down', 'ReviewController@dislikeVote');

//Search
Route::get('/search','EventController@search')->name('search');
Route::get('/searchLocation','EventController@searchLocation')->name('searchLocation');