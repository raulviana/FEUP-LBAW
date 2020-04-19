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

// Static pages
Route::view('faq' , 'pages.static.faq')->name('faq');
Route::view('aboutus', 'pages.static.aboutus')->name('aboutus');


//Events
Route::resource('events', 'EventController');
//Route::get('events', 'EventController@list');
//Route::get('events/{id}', 'EventController@show');
//Route::get('events/create', 'EventController@create');
Route::post('/events/create', 'EventController@store');


//Route::delete('api/events/{id}', 'EventController@delete')->name('delete_evnt');


