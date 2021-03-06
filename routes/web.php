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

// Role Routes...
Route::get('/roles', 'RoleController@list')->name('roles');
Route::get('/roles/create', 'RoleController@create')->name('roles/create');
Route::post('/roles/create', 'RoleController@store')->name('roles/create');
Route::get('/roles/permission/{id}', 'RoleController@permission')->name('permission');
Route::get('/roles/users/permission', 'RoleController@usersPermission')->name('/roles/users/permission');
Route::get('/roles/permission/create/{id}', 'RoleController@indexPermission')->name('roles/permission');
Route::post('/roles/permission/store/{id}', 'RoleController@storePermission');
Route::get('/roles/permission/show/{id}', 'RoleController@showPermission')->name('roles/permission/show/{id}');
Route::post('/roles/permission/edit/{id}', 'RoleController@storeEditedPermission')->name('roles/permission/edit/{id}');
Route::get('/roles/edit/{id}', 'RoleController@editRole')->name('roles/edit/{id}');
Route::post('/roles/edit/{id}', 'RoleController@saveEditRole')->name('roles/edit');
Route::get('/roles/show/{id}', 'RoleController@showRole')->name('roles/show/{id}');
Route::get('/roles/all', 'RoleController@allRoles')->name('evaluations/all_evaluations_product');

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
Route::get('/users/{id}/evaluations', 'UserController@userEvaluations')->name('users/evaluations');

// Brand Routes...
Route::get('/brands', 'BrandController@index')->name('brands');
Route::get('/brands/create', 'BrandController@create')->name('brands/create');
Route::post('/brands/create', 'BrandController@store')->name('brands/create');
Route::get('/brands/edit/{id}', 'BrandController@edit')->name('brands/edit/{id}');
Route::post('/brands/edit/{id}', 'BrandController@saveUpdate')->name('brands/edit');
Route::get('/brands/show/{id}', 'BrandController@show')->name('brands/show');
Route::get('/brands/active_deactive/{id}', 'BrandController@activeDeactive')->name('brands/active_deactive');


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
Route::get('/categories/all', 'CategoryController@allCategories')->name('categories/all');
Route::get('/categories/create', 'CategoryController@create')->name('categories/create');
Route::post('/categories/create', 'CategoryController@store')->name('categories/create');
Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('categories/edit/{id}');
Route::post('/categories/edit/{id}', 'CategoryController@saveUpdate')->name('categories/edit');
Route::get('/categories/show/{id}', 'CategoryController@show')->name('categories/show');
Route::get('/categories/active_deactive/{id}', 'CategoryController@activeDeactive')->name('categories/active_deactive');

// Product Routes...
Route::get('/products', 'ProductController@index')->name('products');
Route::get('/product/{id}', 'ProductController@findProduct')->name('product/{id}');
Route::get('/products/list', 'ProductController@list')->name('products/list');
Route::get('/products/create', 'ProductController@create')->name('products/create');
Route::post('/products/create', 'ProductController@store')->name('products/create');
Route::get('/products/edit/{id}', 'ProductController@edit')->name('products/edit/{id}');
Route::post('/products/edit/{id}', 'ProductController@saveUpdate')->name('products/edit');
Route::get('/products/show/{id}', 'ProductController@show')->name('products/show');
Route::get('/products/active_deactive/{id}', 'ProductController@activeDeactive')->name('products/active_deactive');

// Evaluation Routes...
Route::get('/evaluations', 'EvaluationController@index')->name('evaluations');
Route::get('/evaluations/list', 'EvaluationController@list')->name('evaluations/list');
Route::get('/evaluations/create', 'EvaluationController@create')->name('evaluations/create');
Route::post('/evaluations/create', 'EvaluationController@store')->name('evaluations/create');
Route::get('/evaluations/show/{id}', 'EvaluationController@show')->name('evaluations/show');
Route::get('/evaluations/edit/{id}', 'EvaluationController@edit')->name('evaluations/edit');
Route::post('/evaluations/edit/{id}', 'EvaluationController@saveUpdate')->name('evaluations/edit');
Route::get('/evaluations/active_deactive/{id}', 'EvaluationController@activeDeactive')->name('evaluations/active_deactive');
Route::get('/evaluations/{id}/questions/create', 'QuestionController@create')->name('questions/create');
Route::post('/evaluations/{id}/questions/create', 'QuestionController@store')->name('questions/create');
Route::get('/evaluations/{id}/questions/show/{question_id}', 'QuestionController@show')->name('questions/show');
Route::get('/evaluations/{id}/questions/edit/{question_id}', 'QuestionController@edit')->name('questions/edit');
Route::post('/evaluations/{id}/questions/edit/{question_id}', 'QuestionController@saveUpdate')->name('questions/edit');
Route::get('/evaluations/{id}/questions/{question_id}/answers/edit/{answer_id}', 'QuestionController@answer_edit')->name('answers/edit');
Route::post('/evaluations/{id}/questions/{question_id}/answers/edit/{answer_id}', 'QuestionController@answer_saveUpdate')->name('answers/edit');
Route::get('/evaluations/product/{product_id}', 'EvaluationController@allEvaluationsByProduct')->name('evaluations/all_evaluations_product');
Route::get('/evaluations/all', 'EvaluationController@allEvaluations')->name('evaluations/all_evaluations_product');
Route::get('/evaluations/{id}/{product_id}', 'EvaluationController@EvaluationByProduct')->name('evaluation');
Route::post('/evaluations/{id}/{product_id}', 'EvaluationController@saveEvaluationByProduct')->name('evaluation');
Route::get('/evaluations/user_result/{id}/{product_id}', 'EvaluationController@userResult')->name('user_result');

// Module Routes...
Route::get('/modules', 'ModuleController@index')->name('modules');
Route::get('modules/list', 'ModuleController@list')->name('modules/list');
Route::get('/modules/create', 'ModuleController@create')->name('/modules/create');
Route::post('/modules/create', 'ModuleController@store')->name('/modules/create');
Route::get('/modules/show/{id}', 'ModuleController@show')->name('/modules/show/{id}');
Route::get('/modules/edit/{id}', 'ModuleController@edit')->name('/modules/edit/{id}');
Route::post('/modules/edit/{id}', 'ModuleController@saveEdit')->name('/modules/edit/{id}');
Route::get('/modules/deactive_description/{id}', 'ModuleController@editDeactive')->name('/modules/deactive_description/{id}');
Route::post('/modules/deactive_description', 'ModuleController@saveDeactive')->name('/modules/deactive_description');

// State Routes...
Route::get('/states', 'StateController@index')->name('states');
Route::get('/states/create', 'StateController@create')->name('states/create');
Route::post('/states/create', 'StateController@store')->name('states/create');
Route::get('/states/create/{id}', 'StateController@createByCountry')->name('/states/create/{id}');
Route::get('/states/show/{id}', 'StateController@show')->name('/states/show/{id}');
Route::get('/states/edit/{id}', 'StateController@edit')->name('/states/edit/{id}');
Route::post('/states/edit/{id}', 'StateController@saveEdit')->name('/states/edit/{id}');
Route::get('/states/active_deactive/{id}', 'StateController@active_deactive')->name('/states/active_deactive/{id}');
Route::get('/states/all/{id}', 'StateController@states')->name('/states/all/{id}');
Route::get('/states/all', 'StateController@allStates')->name('/states/all');


// City Routes...
Route::get('/cities', 'CityController@index')->name('cities');
Route::get('/cities/all', 'CityController@allCities')->name('/cities/all');
Route::get('/cities/create', 'CityController@create')->name('cities/create');
Route::post('/cities/create', 'CityController@store')->name('cities/create');
Route::get('/cities/create/{id}', 'CityController@createByState')->name('/cities/create/{id}');
Route::get('/cities/show/{id}', 'CityController@show')->name('/cities/show/{id}');
Route::get('/cities/edit/{id}', 'CityController@edit')->name('/cities/edit/{id}');
Route::post('/cities/edit/{id}', 'CityController@saveEdit')->name('/cities/edit/{id}');
Route::get('/cities/active_deactive/{id}', 'CityController@activeDeactive')->name('cities/active_deactive/{id}');

// Content Routes...
Route::get('/contents/{product_id}', 'ContentController@index')->name('contents/{product_id}');
Route::get('/contents/create/{id}', 'ContentController@create')->name('/contents/create');
Route::post('/contents/create/{id}', 'ContentController@store')->name('/contents/create/{id}');
Route::get('/contents/show/{id}', 'ContentController@show')->name('/contents/show/{id}');
Route::get('/contents/edit/{id}', 'ContentController@edit')->name('/contents/edit/{id}');
Route::post('/contents/edit/{id}', 'ContentController@saveEdit')->name('/contents/edit/{id}');
Route::get('/contents/delete/{content_id}/{product_id}', 'ContentController@delete')->name('/contents/delete');
Route::get('/contents/product/{id}', 'ContentController@contentByProduct')->name('/contents/product/{id}');
Route::get('/contents/images/{id}', 'ContentController@contentImages')->name('/contents/images');
Route::get('/contents/images/add/{id}', 'ContentController@newImage')->name('/contents/images/add');
Route::post('/contents/images/add/{id}', 'ContentController@saveNewImage')->name('/contents/images/add/{id}');

// Catalog Routes...
Route::get('/catalogs', 'CatalogController@index')->name('catalogs');
Route::get('/catalogs/products', 'CatalogController@allProducts')->name('catalogs/products');

// Download Routes...
Route::get('/downloads/{product_id}', 'DownloadController@index')->name('downloads');
Route::get('/downloads/create/{id}', 'DownloadController@create')->name('/downloads/create');
Route::post('/downloads/create/{id}', 'DownloadController@store')->name('/downloads/create/{id}');
Route::get('/downloads/show/{id}', 'DownloadController@show')->name('/downloads/show/{id}');
Route::get('/downloads/delete/{download_id}/{product_id}', 'DownloadController@delete')->name('/downloads/delete/{download_id}/{product_id}');
Route::get('/downloads/edit/{download_id}/{product_id}', 'DownloadController@edit')->name('/downloads/edit');
Route::post('/downloads/edit/{download_id}/{product_id}', 'DownloadController@saveEdit')->name('/downloads/edit/{download_id}/{product_id}');

//Download by product
Route::get('/downloads/product/{id}', 'DownloadController@downloadByProduct')->name('/downloads/product/{id}');


// Sale Routes...
Route::get('/sales', 'SaleController@index')->name('sales');
Route::get('/sales/create', 'SaleController@create')->name('sales/create');
Route::post('/sales/create', 'SaleController@store')->name('sales/create');
Route::get('/sales/show/{id}', 'SaleController@show')->name('sales/show');
Route::get('/sales/approve_disapprove/{id}/{value}', 'SaleController@approveDisapprove')->name('sales/approve_disapprove');


// Store Routes...
Route::get('/stores', 'StoreController@index')->name('stores');
Route::get('/stores/create', 'StoreController@create')->name('stores/create');
Route::post('/stores/create', 'StoreController@store')->name('stores/create');
Route::get('/stores/deactive_description/{id}', 'StoreController@editDeactive')->name('/stores/deactive_description');
Route::post('/stores/deactive_description', 'StoreController@saveDeactive')->name('/stores/deactive_description');
Route::get('/stores/show/{id}', 'StoreController@show')->name('stores/show');
Route::get('/stores/edit/{id}', 'StoreController@edit')->name('/stores/edit/{id}');
Route::post('/stores/edit/{id}', 'StoreController@saveEdit')->name('/stores/edit');


// New Routes...
Route::get('/brand-news', 'BrandNewController@index')->name('news');
Route::get('/brand-news/create', 'BrandNewController@create')->name('/brand-news/create');
Route::post('/brand-news/create', 'BrandNewController@store')->name('/brand-news/create');
Route::get('/brand-news/show/{id}', 'BrandNewController@show')->name('/brand-new/show/{id}');
Route::get('/brand-news/edit/{id}', 'BrandNewController@edit')->name('/brand-new/edit/{id}');
Route::post('/brand-news/edit/{id}', 'BrandNewController@saveEdit')->name('/brand-new/edit/{id}');
Route::get('/brand-news/delete/{id}', 'BrandNewController@delete')->name('/brand-news/delete/{id}');
Route::get('/brand-news/active_deactive/{id}', 'BrandNewController@activeDeactive')->name('/brand-news/active_deactive/{id}');


// Incentive-plan Routes...
Route::get('/incentive-plans', 'IncentivePlanController@index')->name('incentive-plans');
Route::get('/incentive-plans/create', 'IncentivePlanController@create')->name('/incentive_plans/create');
Route::post('/incentive-plans/create', 'IncentivePlanController@store')->name('/incentive_plans/create');
Route::get('/incentive-plans/edit/{id}', 'IncentivePlanController@edit')->name('/incentive_plan/edit/{id}');
Route::post('/incentive-plans/edit/{id}', 'IncentivePlanController@saveEdit')->name('/incentive_plan/edit/{id}');
Route::get('/incentive-plans/show/{id}', 'IncentivePlanController@show')->name('/incentive_plan/edit/{id}');
Route::get('/incentive-plans/dataEdit/{id}', 'IncentivePlanController@dataEdit')->name('/incentive_plans/create');
Route::get('/incentive-plans/deactive_description/{id}', 'IncentivePlanController@activeDeactive')->name('/incentive-plans/deactive_description/{id}');
Route::get('/incentive-plans/content/create/{id}', 'IncentivePlanController@createContent')->name('/incentive-plans/content');
Route::post('/incentive-plans/content/store/{id}', 'IncentivePlanController@storeContent')->name('/incentive-plans/content/{id}');

// E-learning Routes...
Route::get('/e-learnings', 'ElearningController@index')->name('/e-learnings');

//Export Certificate
Route::get('/export/{id}', 'PdfController@exportCertificate')->name('/export');