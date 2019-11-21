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
Route::get('/admission', 'PagesController@admission');
Route::get('/team', 'PagesController@team');
Route::get('/forgot_password', 'PagesController@forgotPassword');

Route::resource('contact','MessagesController')->only(['index', 'store']);
Route::get('/contact/sent', 'MessagesController@messageSent');

Auth::routes();

Route::group(['middleware' => ['auth', 'role:admin|writer']], function () {
	Route::resource('posts','PostsController')->only(['index', 'create', 'store']);
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

Route::group(['middleware' => ['auth', 'role:admin|moderator|writer']], function () {
	Route::resource('posts','PostsController')->only(['edit', 'update', 'destroy']);
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
	Route::delete('user/log/{activity}/destroy','UserController@logDestroy');
	Route::delete('user/log/destroy/all','UserController@logDestroyAll');

	Route::get('users/{user}/set_writer','UserController@setAsWriter');
	Route::get('users/{user}/unset_writer','UserController@unsetAsWriter');
	Route::get('users/{user}/set_moderator','UserController@setAsModerator');
	Route::get('users/{user}/unset_moderator','UserController@unsetAsModerator');
	Route::get('users/{user}/set_admin','UserController@setAsAdmin');
	Route::get('users/{user}/unset_admin','UserController@unsetAsAdmin');

	Route::resource('faculties','FacultyController');
	Route::get('archived/faculties','FacultyController@archived');
	Route::get('faculties/{faculty}/archive','FacultyController@setAsArchived');
	Route::get('faculties/{faculty}/unarchive','FacultyController@setAsUnarchived');
	Route::get('faculties/{faculty}/load','FacultyController@load');
	Route::get('faculties/{faculty}/load/{class}','FacultyController@classGrades');
	Route::get('faculties/{faculty}/load/{class}/encode','FacultyController@encodeGrades');

	Route::get('students/{student}/enlist','StudentController@enlist');
	Route::delete('students/enlistment/{grade}/drop','StudentController@dropClass');
	Route::post('students/enlist_class','StudentController@enlistClass');

	Route::resource('messages','MessagesController')->only(['show', 'destroy']);
	Route::get('feedback', 'MessagesController@feedback');
});

Route::group(['middleware' => ['auth', 'role:admin|head registrar']], function () {
	Route::resource('classes','SClassController');
	Route::get('classes/{class}/drop/{grade}','SClassController@dropStudent');
	Route::post('classes/lock_grades','SClassController@lockGrades');
	Route::get('classes/enroll_students/{class}','GradeController@enrollStudent');
	Route::resource('grades','GradeController')->except([
		'create', 'index', 'show'
	]);
	Route::get('faculty/load/completion/{grade}','GradeController@enterCompletionGrade');
	Route::put('faculty/load/completion/{grade}/update','GradeController@storeCompletionGrade');
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
	Route::get('archived/students','StudentController@archived');
	Route::get('students/{student}/archive','StudentController@setAsArchived');
	Route::get('students/{student}/unarchive','StudentController@setAsUnarchived');
	Route::get('unpaid/students','StudentController@unpaidStudents');
	Route::get('students/{student}/paid','StudentController@setAsPaidStudent');
	Route::get('students/{student}/unpaid','StudentController@setAsUnpaidStudent');
	Route::get('graduate/students','StudentController@graduateStudents');

	Route::get('students/{student}/grades','StudentController@grades');
	Route::get('students/{student}/enlistment','StudentController@enlistment');
	Route::get('students/{student}/curriculum','StudentController@curriculum');

	Route::resource('students/{student}/credited_courses','CreditedCoursesController');
	Route::resource('students/{student}/{credit}/credit_course',
					'CreditedCoursesDetailsController')->except([ 'index', 'show' ]);

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
	Route::get('students/{student}/scholastic_record/{acad_term}','StudentController@showScholasticRecord');
});

Route::group(['middleware' => ['auth', 'role:admin|head registrar|faculty']], function () {
	Route::get('faculty/load/inc/{grade}','FacultyAccessController@setAsIncomplete');
});

Route::group(['middleware' => ['auth', 'role:admin|registrar|student']], function () {
	Route::get('students/{student}/curriculum_with_grades','StudentController@showCurriculumWithGrades');
});

Route::group(['middleware' => ['auth', 'role:admin|registrar|head registrar|faculty']], function () {
	Route::get('summary_grades/{class}/{period}/download','FileSummaryOfGrades@download');
	Route::get('summary_grades/{class}/{period}/view','FileSummaryOfGrades@view');
});

Route::group(['middleware' => ['auth', 'role:admin|head registrar|faculty']], function () {
	Route::get('summary_grades/{class}/{period}','FileSummaryOfGrades@index');
	Route::put('summary_grades/{class}/{period}/store','FileSummaryOfGrades@store');
	Route::get('summary_grades/{class}/{period}/remove','FileSummaryOfGrades@remove');
});

Route::group(['middleware' => ['auth', 'role:head registrar']], function () {
	Route::resource('registrars','RegistrarController');
	Route::get('archived/registrars','RegistrarController@archived');
	Route::get('registrars/{registrar}/archive','RegistrarController@setAsArchived');
	Route::get('registrars/{registrar}/unarchive','RegistrarController@setAsUnarchived');
});

Route::group(['middleware' => ['auth', 'role:registrar']], function () {
	Route::get('students/{student}/tor','StudentController@showTOR');
});

Route::group(['middleware' => ['auth', 'role:admin|faculty']], function () {
	Route::resource('faculty','FacultyAccessController')->only(['index', 'update']);

	Route::get('faculty/load','FacultyAccessController@load');
	Route::get('faculty/load/unofficial_drop/{grade}','FacultyAccessController@unofficialDropStudent');
	Route::get('faculty/load/{class}','FacultyAccessController@show');
	Route::get('faculty/load/{class}/encode','FacultyAccessController@encodeGrades');
	Route::get('faculty/load/{class}/students','FacultyAccessController@showStudentMasterlist');
});

Route::group(['middleware' => ['auth', 'role:student']], function () {
	Route::resource('student', 'StudentAccessController')->only('index');

	Route::get('student/enlistment','StudentAccessController@enlistment');
	Route::get('student/curriculum','StudentAccessController@curriculum');
});