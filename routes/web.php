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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/student', 'Admin\StudentController@student')->name('student');
Route::post('/student-register', 'Admin\StudentController@register')->name('student-register');
Route::get('/student-import', 'Admin\StudentController@import')->name('student-import');
Route::post('/student-import', 'Admin\StudentController@importStudent')->name('student-import');
Route::post('/student/delete', 'Admin\StudentController@delete')->name('/student/delete');
Route::get('/load-student', 'Admin\StudentController@loadUser')->name('load-student');
Route::post('/student/edit', 'Admin\StudentController@edit')->name('/student/edit');
Route::get('/student/edit','Admin\StudentController@editUser')->name('/student/edit');


Route::get('/teacher', 'Admin\TeacherController@teacher')->name('teacher');
Route::post('/teacher-register', 'Admin\TeacherController@register')->name('teacher-register');
Route::get('/teacher-import', 'Admin\TeacherController@import')->name('teacher-import');
Route::post('/teacher-import', 'Admin\TeacherController@importTeacher')->name('teacher-import');
Route::post('/teacher/delete', 'Admin\TeacherController@delete')->name('/teacher/delete');;
Route::get('/load-teacher', 'Admin\TeacherController@loadUser')->name('load-teacher');
Route::post('/teacher/edit', 'Admin\TeacherController@edit')->name('/teacher/edit');
Route::get('/teacher/edit', 'Admin\TeacherController@editUser')->name('/teacher/edit');

Route::get('/admin-register', 'Admin\AdminController@registerTeacher')->name('admin-register');
Route::post('/admin-register', 'Admin\AdminController@register')->name('admin-register');
Route::get('/admin-import', 'Admin\AdminController@import')->name('admin-import');
Route::post('/admin-import', 'Admin\AdminController@importTeacher')->name('admin-import');
Route::post('/Admin/delete/{id}', 'Admin\AdminController@delete');


Route::post('/teacher/edit/{id}', 'Admin\TeacherController@edit');
Route::post('/admin/edit/{id}', 'Admin\AdminController@edit');

Route::get('/dashboard', 'Admin\DashBoardController@dashboard')->name('dashboard');


Route::get('/survey', 'Admin\SurveyController@survey');

Route::get('/generate','Admin\SurveyController@generate');
Route::get('/survey-generate','Admin\SurveyController@surveyGenerate')->name('survey-generate');
Route::get('/survey-edit', 'Admin\SurveyController@surveyEdit');
Route::post('/generate','Admin\SurveyController@surveyRegister');




Route::get('/course', 'Admin\CourseController@course');
Route::post('/add-course','Admin\CourseController@addCourse');



Route::any('/survey-submit', function () {
    return view('admin.surveys.submit');
});

// chức năng cho sinh giao viên và sinh viên

Route::get('/user/student','User\StudentController@student');
Route::get('/user/teacher','User\TeacherController@teacher');


Route::get('/user/elements/survey',function(){
    return view('user.elements.survey');
});
Route::get('/porfile',function(){
    return view('porfile');
});
Route::get('/user/elements/result',function(){
    return view('user.elements.result');
});




/*Route::get('/welcome',function(){
    return view('welcome');
});*/
