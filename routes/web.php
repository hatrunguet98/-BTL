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

// Chức năng với sinh viên
Route::get('/student', 'Admin\StudentController@student')->name('student');
Route::post('/student-register', 'Admin\StudentController@register')->name('student-register');
Route::get('/student-import', 'Admin\StudentController@import')->name('student-import');
Route::post('/student-import', 'Admin\StudentController@importStudent')->name('student-import');
Route::post('/student/delete', 'Admin\StudentController@delete')->name('/student/delete');
Route::get('/load-student', 'Admin\StudentController@loadUser')->name('load-student');
Route::post('/student/edit', 'Admin\StudentController@edit')->name('/student/edit');
Route::get('/student/edit','Admin\StudentController@editUser')->name('/student/edit');

// Chức năng với giáo viên
Route::get('/teacher', 'Admin\TeacherController@teacher')->name('teacher');
Route::post('/teacher-register', 'Admin\TeacherController@register')->name('teacher-register');
Route::get('/teacher-import', 'Admin\TeacherController@import')->name('teacher-import');
Route::post('/teacher-import', 'Admin\TeacherController@importTeacher')->name('teacher-import');
Route::post('/teacher/delete', 'Admin\TeacherController@delete')->name('/teacher/delete');;
Route::get('/load-teacher', 'Admin\TeacherController@loadUser')->name('load-teacher');
Route::post('/teacher/edit', 'Admin\TeacherController@edit')->name('/teacher/edit');
Route::get('/teacher/edit', 'Admin\TeacherController@editUser')->name('/teacher/edit');

// Chức năng với admin

Route::get('/admin', 'Admin\AdminController@admin')->name('admin');
Route::post('/admin-register', 'Admin\AdminController@register')->name('admin-register');
Route::get('/admin-import', 'Admin\AdminController@import')->name('admin-import');
Route::post('/admin-import', 'Admin\AdminController@importTeacher')->name('admin-import');
Route::post('/admin/delete', 'Admin\AdminController@delete')->name('/admin/delete');;
Route::get('/load-admin', 'Admin\AdminController@loadUser')->name('load-admin');
Route::post('/admin/edit', 'Admin\AdminController@edit')->name('/admin/edit');
Route::get('/admin/edit', 'Admin\AdminController@editUser')->name('/admin/edit');


//Route::get('/admin-register', 'Admin\AdminController@registerTeacher')->name('admin-register');
//Route::post('/admin-register', 'Admin\AdminController@register')->name('admin-register');
//Route::get('/admin-import', 'Admin\AdminController@import')->name('admin-import');
//Route::post('/admin-import', 'Admin\AdminController@importTeacher')->name('admin-import');
//Route::post('/Admin/delete/{id}', 'Admin\AdminController@delete');
//
//
//Route::post('/teacher/edit/{id}', 'Admin\TeacherController@edit');
//Route::post('/admin/edit/{id}', 'Admin\AdminController@edit');


Route::get('/dashboard', 'Admin\DashBoardController@dashboard')->name('dashboard');

// Chức năng với survey
Route::get('/survey', 'Admin\SurveyController@survey');
Route::get('/view-survey', 'Admin\SurveyController@viewSurvey');

Route::get('/generate','Admin\SurveyController@generate');
Route::get('/survey-generate','Admin\SurveyController@surveyGenerate')->name('survey-generate');
Route::get('/survey-edit', 'Admin\SurveyController@surveyEdit');
Route::post('/generate','Admin\SurveyController@surveyRegister');



// Chức năng với course
Route::get('/course', 'Admin\CourseController@course');
Route::post('/add-course','Admin\CourseController@addCourse');
Route::post('/enroll-student','Admin\CourseController@enrollStudent');




Route::any('/survey-submit', function () {
    return view('admin.surveys.submit');
});

// chức năng cho sinh giao viên và sinh viên

Route::get('/students','User\StudentController@student');
Route::get('/student/survey', 'User\StudentController@survey')->name('student/survey');
Route::post('/student/survey', 'User\StudentController@insertSurvey')->name('student/survey');
Route::get('/courses', 'Admin\CourseController@allCourses');


Route::get('/teachers','User\TeacherController@teacher');
Route::get('/teacher/result', 'User\TeacherController@result')->name('teacher/result');


Route::get('/user/userlayout/teacher/teacher',function(){
    return view('user.userlayout.teacher.teacher');
});
Route::get('/surveys',function(){
    return view('user.student.survey.survey');
});

Route::get('/welcome', function () {
    return view('welcome');
});
