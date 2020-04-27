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

// Static pages
Route::get('faq' , 'HomepageController@faq')->name('faq');
Route::get('aboutus', 'HomepageController@about')->name('aboutus');

//Admin
//Route::get('/admin/users', 'AdminController@display')->name('admin');
Route::get('/admin/users', 'AdminController@users')->name('admin-users');
Route::delete('api/admin/users/{id}', 'AdminController@deleteUser')->name('admin-del-user');
Route::get('/admin/events', 'AdminController@events')->name('admin-events');



//Events
//Route::resource('events', 'EventController');
Route::get('/events', 'EventController@list');
Route::get('/events/create', 'EventController@create');
Route::post('/events/create', 'EventController@store');
Route::get('/events/{id}/edit', 'EventController@edit');
Route::post('/events/{id}/edit', 'EventController@update');
Route::get('/events/{id}', 'EventController@show');


Route::get('/tags/{name}', 'TagController@show');
 

//Posts
Route::put('api/events/{id}/posts/create', 'PostController@store');



