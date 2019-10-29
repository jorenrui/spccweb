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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/news', 'PagesController@news');
Route::get('/articles/{article}', 'PagesController@articles');
Route::get('/contact', 'PagesController@contact');
Route::get('/admission', 'PagesController@admission');
Route::get('/team', 'PagesController@team');

Auth::routes();

Route::group(['middleware' => ['auth', 'role:admin|writer']], function () {
	Route::resource('posts','PostsController')->except('show');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	Route::get('dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('app/about', 'DashboardController@about');
	Route::get('posts/{post}', 'PostsController@show');
	Route::get('events', 'EventsController@index');
});

Route::group(['middleware' => ['auth', 'role:admin|moderator']], function () {
	Route::get('posts/mod/published', 'PostsController@published');
	Route::get('posts/mod/{post}/publish', 'PostsController@publish');
	Route::get('posts/mod/approval', 'PostsController@approval');
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
	Route::resource('user', 'UserController', ['only' => ['index', 'destroy']]);
	Route::get('user/create/employee','UserController@createEmployee');
	Route::get('user/create/student','UserController@createStudent');
	Route::post('user/store/employee','UserController@storeEmployee');
	Route::post('user/store/student','UserController@storeStudent');
	Route::get('user/show/employees/{employee}','UserController@showEmployee');
	Route::get('user/show/students/{student}','UserController@showStudent');
	Route::get('user/edit/employees/{employee}','UserController@editEmployee');
	Route::get('user/edit/students/{student}','UserController@editStudent');
	Route::put('user/update/employees/{employee}','UserController@updateEmployee');
	Route::put('user/update/students/{student}','UserController@updateStudent');
	Route::get('user/log','UserController@log');

	Route::get('users/{user}/set_writer','UserController@setAsWriter');
	Route::get('users/{user}/unset_writer','UserController@unsetAsWriter');
	Route::get('users/{user}/set_moderator','UserController@setAsModerator');
	Route::get('users/{user}/unset_moderator','UserController@unsetAsModerator');
	Route::get('users/{user}/set_admin','UserController@setAsAdmin');
	Route::get('users/{user}/unset_admin','UserController@unsetAsAdmin');

	Route::resource('classes','SClassController');
	Route::post('classes/lock_grades','SClassController@lockGrades');
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
	Route::resource('events','EventsController')->except([
		'show', 'index'
	]);

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

	Route::resource('students/{student}/credited_courses','CreditedCoursesController');
	Route::resource('students/{student}/{credit}/credit_course',
					'CreditedCoursesDetailsController')->except([ 'index', 'show' ]);
	Route::get('students/{student}/tor','StudentController@showTOR');

	Route::get('settings', 'DashboardController@settings');
	Route::post('settings', 'DashboardController@updateSettings');
	Route::get('annoucement', 'DashboardController@annoucement');
	Route::post('annoucement', 'DashboardController@updateAnnoucement');
});

Route::group(['middleware' => ['auth', 'role:admin|registrar|head registrar|student']], function () {
	Route::resource('grades','GradeController')->only([
		'index', 'show'
	]);

	Route::get('students/{student}/grade_slip/{acad_term}','StudentController@showGradeSlip');
});


Route::group(['middleware' => ['auth', 'role:admin|registrar|student']], function () {
	Route::get('students/{student}/curriculum_with_grades','StudentController@showCurriculumWithGrades');
});

Route::group(['middleware' => ['auth', 'role:admin|head registrar']], function () {
	Route::resource('registrars','RegistrarController')->except('show');
});

Route::group(['middleware' => ['auth', 'role:admin|faculty']], function () {
	Route::resource('faculty','FacultyAccessController')->only(['index', 'update']);

	Route::get('faculty/load','FacultyAccessController@load');
	Route::get('faculty/load/{class}','FacultyAccessController@show');
	Route::get('faculty/load/{class}/encode','FacultyAccessController@encodeGrades');
	Route::get('faculty/load/{class}/students','FacultyAccessController@showStudentMasterlist');

	Route::get('summary_grades/{class}/{period}','FileSummaryOfGrades@index');
	Route::put('summary_grades/{class}/{period}/store','FileSummaryOfGrades@store');
	Route::get('summary_grades/{class}/{period}/download','FileSummaryOfGrades@download');
	Route::get('summary_grades/{class}/{period}/view','FileSummaryOfGrades@view');
	Route::get('summary_grades/{class}/{period}/remove','FileSummaryOfGrades@remove');
});

Route::group(['middleware' => ['auth', 'role:student']], function () {
	Route::resource('student', 'StudentAccessController')->only('index');

	Route::get('student/enlistment','StudentAccessController@enlistment');
	Route::get('student/curriculum','StudentAccessController@curriculum');
});