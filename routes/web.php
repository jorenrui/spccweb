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

	Route::get('dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('posts/{post}', 'PostsController@show');
	Route::get('events', 'EventsController@index');
});

Route::group(['middleware' => ['auth', 'role:admin|writer']], function () {
	Route::resource('posts','PostsController')->except('show');
});

Route::group(['middleware' => ['auth', 'role:admin|moderator']], function () {
	Route::get('posts/mod/published', 'PostsController@published');
	Route::get('posts/mod/{post}/publish', 'PostsController@publish');
	Route::get('posts/mod/approval', 'PostsController@approval');
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
	Route::resource('events','EventsController')->except([
		'show', 'index'
	]);

	Route::resource('classes','SClassController');
	Route::get('classes/enroll_students/{class}','GradeController@enrollStudent');
	Route::resource('grades','GradeController')->except([
		'create', 'index', 'show'
	]);

	Route::resource('faculties','FacultyController');
	Route::get('faculties/{faculty}/load','FacultyController@load');
	Route::get('faculties/{faculty}/load/{class}','FacultyController@classGrades');
	Route::get('faculties/{faculty}/load/{class}/encode','FacultyController@encodeGrades');

	Route::get('students/{student}/enlist','StudentController@enlist');
	Route::delete('students/enlistment/{grade}/drop','StudentController@dropClass');
	Route::post('students/enlist_class','StudentController@enlistClass');
});

Route::group(['middleware' => ['auth', 'role:admin|registrar']], function () {
	Route::resource('acad_terms','AcadTermController')->except('show');
	Route::put('settings/set_cur_acad_term/{setting}','SettingsController@setCurAcadTerm');

	Route::resource('curriculums','CurriculumController');
	Route::resource('curriculum_details','CurriculumDetailsController')->except([
		'index', 'create', 'show'
	]);
	Route::get('curriculum_details/create/{curriculum}','CurriculumDetailsController@create');
	Route::resource('courses','CourseController')->except('show');
	Route::put('settings/set_cur_curriculum/{setting}','SettingsController@setCurCurriculum');

	Route::resource('students','StudentController');
	Route::get('students/{student}/grades','StudentController@grades');
	Route::get('students/{student}/enlistment','StudentController@enlistment');
	Route::get('students/{student}/curriculum','StudentController@curriculum');
});

Route::group(['middleware' => ['auth', 'role:admin|registrar|head registrar']], function () {
	Route::resource('grades','GradeController')->only([
		'index', 'show'
	]);
});

Route::group(['middleware' => ['auth', 'role:admin|faculty']], function () {
	Route::resource('faculty','FacultyAccessController')->only('update');
});

Route::group(['middleware' => ['auth', 'role:faculty']], function () {
	Route::resource('faculty','FacultyAccessController')->only('index');

	Route::get('faculty/load','FacultyAccessController@load');
	Route::get('faculty/load/{class}','FacultyAccessController@show');
	Route::get('faculty/load/{class}/encode','FacultyAccessController@encodeGrades');
});

Route::group(['middleware' => ['auth', 'role:student']], function () {
	Route::resource('student', 'StudentAccessController')->only('index');

	Route::get('student/enlistment','StudentAccessController@enlistment');
	Route::get('student/curriculum','StudentAccessController@curriculum');
});