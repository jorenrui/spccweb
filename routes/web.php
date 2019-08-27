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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/news', 'PagesController@news');
Route::get('/articles/{article}', 'PagesController@articles');
Route::get('/contact', 'PagesController@contact');
Route::get('/admission', 'PagesController@admission');
Route::get('/team', 'PagesController@team');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Route::group(['middleware' => ['role:admin|writer']], function () {
	Route::resource('posts','PostsController');
});

Route::group(['middleware' => ['role:admin|moderator']], function () {
	Route::get('/posts/mod/published', 'PostsController@published');
	Route::get('/posts/mod/{post}/publish', 'PostsController@publish');
	Route::get('/posts/mod/approval', 'PostsController@approval');
});

Route::group(['middleware' => ['role:admin']], function () {
	Route::resource('events','EventsController')->except('show');
	Route::resource('acad_terms','AcadTermController')->except('show');
	Route::put('settings/set_cur_acad_term/{setting}','SettingsController@setCurAcadTerm');
	Route::resource('curriculums','CurriculumController');
});
