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

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');
// Home
Route::get('/home', 'HomeController@index')->name('home');

// Roles Routes...
Route::get('roles/list', 'RoleController@list')->name('roles/list');
Route::get('roles/create', 'RoleController@create')->name('roles/create');
Route::post('roles/create', 'RoleController@store')->name('roles/create');

// User Routes...
Route::get('/users', 'UserController@index')->name('users');
Route::get('/users/create', 'UserController@create')->name('users/create');
Route::post('/users/create', 'UserController@store')->name('users/create');
Route::get('/users/profile', 'UserController@profile')->name('users/profile');
Route::post('/users/profile', 'UserController@saveProfile')->name('users/profile');

// Brand Routes...
Route::get('/brands', 'BrandController@index')->name('brands');
Route::get('/brands/create', 'BrandController@create')->name('brands/create');
Route::post('/brands/create', 'BrandController@store')->name('brands/create');

// Country Routes...
Route::get('/countries', 'CountryController@index')->name('countries');
Route::get('/countries/create', 'CountryController@create')->name('countries/create');
Route::post('/countries/create', 'CountryController@store')->name('countries/create');