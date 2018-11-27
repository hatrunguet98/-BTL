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


Route::get('/student-register', 'Admin\StudentController@registerStudent')->name('student-register');
Route::post('/student-register', 'Admin\StudentController@register')->name('student-register');
Route::get('/student-import', 'Admin\StudentController@import')->name('student-import');
Route::post('/student-import', 'Admin\StudentController@importStudent')->name('student-import');

Route::get('/teacher-register', 'Admin\TeacherController@registerTeacher')->name('teacher-register');
Route::post('/teacher-register', 'Admin\TeacherController@register')->name('teacher-register');
Route::get('/teacher-import', 'Admin\TeacherController@import')->name('teacher-import');
Route::post('/teacher-import', 'Admin\TeacherController@importTeacher')->name('teacher-import');

Route::get('/admin-register', 'Admin\AdminController@registerTeacher')->name('admin-register');
Route::post('/admin-register', 'Admin\AdminController@register')->name('admin-register');
Route::get('/admin-import', 'Admin\AdminController@import')->name('admin-import');
Route::post('/admin-import', 'Admin\AdminController@importTeacher')->name('admin-import');

Route::get('/dashboard', 'Admin\DashBoardController@dashboard')->name('dashboard');

Route::get('/survey-register', function () {
    return view('admin.surveys.survey');
});

Route::get('/survey-generate', function () {
    return view('admin.surveys.generate');
});

Route::get('/survey-edit', function () {
    return view('admin.surveys.edit');
});