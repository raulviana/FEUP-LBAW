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

//ResetPassword
Route::view('verify.mail', 'auth.verify')->name('verify.mail');
Route::post('password.recover', 'Recovery@recover')->name('password.recover');

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
Route::get('profile/users/{id}/events', 'UserController@events');
Route::put('api/wishlist/{user_id}/add', 'WishlistController@add');
Route::delete('api/wishlist/{user_id}/remove', 'WishlistController@remove');


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
Route::get('/events/create', 'EventController@create')->name('new-event');
Route::post('/events/create', 'EventController@store');
Route::get('/events/{id}/edit', 'EventController@edit');
Route::post('/events/{id}/edit', 'EventController@update');
Route::get('/events/{id}', 'EventController@show');
Route::delete('api/events/{id}/delete', 'EventController@delete');
Route::post('/api/events/{id}/restore', 'EventController@restore');
Route::delete('api/events/{event_id}/remove/{user_id}', 'EventController@removeCollaborator');
Route::put('api/events/{event_id}/add/{user_id}', 'EventController@addCollaborator');

//Invitations
Route::delete('api/events/{event_id}/invitations/{invite_id}/delete', 'InvitationController@delete');
Route::put('api/profile/{user_id}/invitations/{inv_id}/accept', 'InvitationController@accept');
Route::put('api/profile/{user_id}/invitations/{inv_id}/reject', 'InvitationController@reject');
Route::post('api/events/{event_id}/invitations/send', 'InvitationController@send');

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