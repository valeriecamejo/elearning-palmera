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
Route::get('roles/permission/{id}', 'RoleController@permission')->name('permission');
Route::get('roles/permission/create/{id}', 'RoleController@indexPermission')->name('roles/permission');
Route::post('roles/permission/store/{id}', 'RoleController@storePermission');

// User Routes...
Route::get('/users', 'UserController@index')->name('users');
Route::get('/users/create', 'UserController@create')->name('users/create');
Route::post('/users/create', 'UserController@store')->name('users/create');
Route::get('/users/profile', 'UserController@profile')->name('users/profile');
Route::post('/users/profile', 'UserController@saveProfile')->name('users/profile');
Route::get('/users/edit/{id}', 'UserController@edit')->name('users/edit/{id}');
Route::post('/users/edit/{id}', 'UserController@saveUpdate')->name('users/edit');
Route::get('/users/show/{id}', 'UserController@show')->name('users/show');
Route::get('/users/active_deactive/{id}', 'UserController@activeDeactive')->name('users/active_deactive');

// Brand Routes...
Route::get('/brands', 'BrandController@index')->name('brands');
Route::get('/brands/create', 'BrandController@create')->name('brands/create');
Route::post('/brands/create', 'BrandController@store')->name('brands/create');

// Country Routes...
Route::get('/countries', 'CountryController@index')->name('countries');
Route::get('/countries/create', 'CountryController@create')->name('countries/create');
Route::post('/countries/create', 'CountryController@store')->name('countries/create');

// Category Routes...
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories/create', 'CategoryController@create')->name('categories/create');
Route::post('/categories/create', 'CategoryController@store')->name('categories/create');

// Product Routes...
Route::get('/products', 'ProductController@index')->name('products');
Route::get('/products/list', 'ProductController@list')->name('products/list');
Route::get('/products/create', 'ProductController@create')->name('products/create');
Route::post('/products/create', 'ProductController@store')->name('products/create');

// Evaluation Routes...
Route::get('/evaluations', 'EvaluationController@index')->name('evaluations');
Route::get('/evaluations/list', 'EvaluationController@list')->name('evaluations/list');
Route::get('/evaluations/create', 'EvaluationController@create')->name('evaluations/create');
Route::post('/evaluations/create', 'EvaluationController@store')->name('evaluations/create');
Route::get('/evaluations/show/{id}', 'EvaluationController@show')->name('evaluations/show');
Route::get('/evaluations/{id}/questions/create', 'QuestionController@create')->name('questions/create');
Route::post('/evaluations/{id}/questions/create', 'QuestionController@store')->name('questions/create');

// Modules Routes...
Route::get('modules/list', 'ModuleController@index')->name('modules');
