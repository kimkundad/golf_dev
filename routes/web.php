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

Route::get('search/data2', 'HomeController@search_data2');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/regis_tech', 'HomeController@regis_tech')->name('regis_tech');
Route::post('/search', 'HomeController@search')->name('search');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('single_tech/{id}', 'HomeController@single_tech')->name('single_tech');
Route::get('search_tag/{id}', 'HomeController@search_tag');

Route::get('/terms_conditions', 'HomeController@terms_conditions')->name('terms_conditions');
Route::get('/privacy', 'HomeController@privacy')->name('privacy');
Route::post('/post_to_tech', 'HomeController@post_to_tech')->name('post_to_tech');
Route::post('/regis_tech_submit', 'HomeController@regis_tech_submit')->name('regis_tech_submit');

Route::post('/contact_us', 'HomeController@contact_us')->name('contact_us');

Route::get('/map_api', 'HomeController@map_api')->name('map_api');
Route::get('/email_success', 'HomeController@email_success')->name('email_success');

// Social Auth

Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');

Route::group(['middleware' => 'auth'], function () {

  });

Route::group(['middleware' => 'admin'], function() {
  Route::resource('admin/user', 'StudentController');

  Route::get('admin/tech_search', 'TechController@tech_search');

  Route::post('api/api_user_status', 'StudentController@api_user_status');

  Route::get('admin/dashboard', 'DashboardController@index')->name('dashboard');
  Route::resource('admin/category', 'CategoryController');
  Route::resource('admin/skill', 'SkillController');
  Route::resource('admin/tech_list', 'TechController');
  Route::get('admin/tech_gallery/{id}', 'TechController@tech_gallery');
  Route::get('admin/tech_job/{id}', 'TechController@tech_job');
  Route::post('admin/add_gallery/', 'TechController@add_gallery');
  Route::get('admin/new_tech/', 'TechController@new_tech');

  Route::post('api/api_tech_status', 'TechController@api_tech_status');
  Route::post('admin/file/posts', 'TechController@imagess');
  Route::resource('admin/contact_admin', 'ContactAdController');

  Route::get('admin/edit_job/{id}', 'TechController@edit_job');
  Route::post('admin/add_jobs_tech/', 'TechController@add_jobs_tech');
  Route::post('admin/jobs_tech_edit/', 'TechController@jobs_tech_edit');
  Route::post('admin/job_image_del/', 'TechController@job_image_del');

  Route::post('admin/del_job_tech/', 'TechController@del_job_tech');

  Route::post('admin/tech_image_del', 'TechController@tech_image_del');
  Route::post('api/api_contact_us_status', 'ContactContraller@api_contact_us_status');
  Route::post('api/api_contact_status', 'ContactAdController@api_contact_status');
  Route::resource('admin/us_contact', 'ContactContraller');
  Route::post('admin/text_tech/{id}', 'TechController@delete_text');

  Route::post('admin/่job_tech_del/{id}', 'TechController@่job_tech_del');

  Route::resource('admin/setting', 'SettingController');
  Route::post('admin/setting/update', 'SettingController@update');

  });
