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



Route::auth();

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/regis_tech', 'HomeController@regis_tech')->name('regis_tech');
Route::post('/search', 'HomeController@search')->name('search');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('single_tech/{id}', 'HomeController@single_tech')->name('single_tech');

Route::get('/terms_conditions', 'HomeController@terms_conditions')->name('terms_conditions');
Route::get('/privacy', 'HomeController@privacy')->name('privacy');
Route::post('/post_to_tech', 'HomeController@post_to_tech')->name('post_to_tech');

Route::get('/map_api', 'HomeController@map_api')->name('map_api');
Route::get('/email_success', 'HomeController@email_success')->name('email_success');

// Social Auth

Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');

Route::group(['middleware' => 'auth'], function () {

  });

Route::group(['middleware' => 'admin'], function() {
  Route::resource('admin/user', 'StudentController');
  Route::get('admin/dashboard', 'DashboardController@index')->name('dashboard');
  Route::resource('admin/category', 'CategoryController');
  Route::resource('admin/tech_list', 'TechController');
  Route::get('admin/tech_gallery/{id}', 'TechController@tech_gallery');
  Route::post('admin/add_gallery/', 'TechController@add_gallery');
  Route::post('api/api_tech_status', 'TechController@api_tech_status');
  Route::post('admin/file/posts', 'TechController@imagess');
  Route::resource('admin/contact_admin', 'ContactAdController');

  Route::post('api/api_contact_status', 'ContactAdController@api_contact_status');

  });
