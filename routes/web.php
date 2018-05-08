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
Route::get('/roles', 'RoleController@list')->name('roles');
Route::get('/roles/create', 'RoleController@create')->name('roles/create');
Route::post('/roles/create', 'RoleController@store')->name('roles/create');
Route::get('/roles/permission/{id}', 'RoleController@permission')->name('permission');
Route::get('/roles/permission/create/{id}', 'RoleController@indexPermission')->name('roles/permission');
Route::post('/roles/permission/store/{id}', 'RoleController@storePermission');
Route::get('/roles/permission/show/{id}', 'RoleController@showPermission')->name('roles/permission/show/{id}');
Route::post('/roles/permission/edit/{id}', 'RoleController@storeEditedPermission')->name('roles/permission/edit/{id}');
Route::get('/roles/edit/{id}', 'RoleController@editRole')->name('roles/edit/{id}');
Route::post('/roles/edit/{id}', 'RoleController@saveEditRole')->name('roles/edit');
Route::get('/roles/show/{id}', 'RoleController@showRole')->name('roles/show/{id}');

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
Route::get('/countries/edit/{id}', 'CountryController@edit')->name('countries/edit/{id}');
Route::post('/countries/edit/{id}', 'CountryController@saveEdit')->name('countries/edit/{id}');
Route::get('/countries/show/{id}', 'CountryController@show')->name('countries/show/{id}');
Route::get('/countries/active_deactive/{id}', 'CountryController@activeDeactive')->name('countries/active_deactive');
Route::get('/countries/all', 'CountryController@allCountries')->name('/countries/all');

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

// State Routes...
Route::get('states', 'StateController@index')->name('states');
Route::get('/states/create', 'StateController@create')->name('states/create');
Route::post('/states/create', 'StateController@store')->name('states/create');
Route::get('/states/show/{id}', 'StateController@show')->name('/states/show/{id}');
Route::get('/states/edit/{id}', 'StateController@edit')->name('/states/edit/{id}');
Route::post('/states/edit/{id}', 'StateController@saveEdit')->name('/states/edit/{id}');
Route::get('/states/active_deactive/{id}', 'StateController@active_deactive')->name('/states/active_deactive/{id}');
Route::get('/states/all/{id}', 'StateController@states')->name('/states/all/{id}');


// Cities Routes...
Route::get('cities', 'CityController@index')->name('cities');
Route::get('/cities/create', 'CityController@create')->name('cities/create');
Route::post('/cities/create', 'CityController@store')->name('cities/create');
Route::get('/cities/show/{id}', 'CityController@show')->name('/cities/show/{id}');
Route::get('/cities/edit/{id}', 'CityController@edit')->name('/cities/edit/{id}');
Route::post('/cities/edit/{id}', 'CityController@saveEdit')->name('/cities/edit/{id}');
Route::get('/cities/active_deactive/{id}', 'CityController@activeDeactive')->name('cities/active_deactive/{id}');

// Contents Routes...
Route::get('contents', 'ContentController@index')->name('contents');
Route::get('/contents/create', 'ContentController@create')->name('/contents/create');