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

use Rap2hpoutre\FastExcel\FastExcel;
use App\StudentAccount;

Route::get('/', 'LoginController@index');
Route::get('/login', 'LoginController@index');

Route::get('logout', 'LoginController@logout');

Route::post('/login', 'LoginController@authLogin')->name('login');
// Student
Route::group(['prefix' => 'sinh-vien', 'middleware' => 'student'], function () {
    Route::get('/', 'StudentLayoutController@index')->name('studentHome');
    Route::get('me', 'StudentLayoutController@me');

});
// Teacher
Route::group(['prefix' => 'giang-vien', 'middleware' => 'teacher'], function () {
    Route::get('/', 'TeacherLayoutController@index')->name('teacherHome');
    Route::get('me', 'TeacherLayoutController@me');

    Route::get('khao-sat/{id}', 'TeacherLayoutController@courseInfo');
    Route::get('khao-sat/danh-sach/{id}', 'TeacherLayoutController@courseStudents');

    Route::get('change', 'TeacherLayoutController@changePass');
    Route::post('change', 'TeacherLayoutController@postChangePass')->name('changeTeacherPass');
});
// Admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    // Giang-vien
    Route::group(['prefix' => 'giang-vien'], function () {
        Route::post('import', 'TeacherController@import')->name('importTeachers');
    });
    Route::resource('giang-vien', 'TeacherController');


    // Sinh vien
    Route::group(['prefix' => 'sinh-vien'], function () {
        Route::get('danh-sach', 'StudentController@list');
        Route::post('import', 'StudentController@import')->name('importStudents');
    });
    Route::resource('sinh-vien', 'StudentController');

    // room
    Route::group(['prefix' => 'room'], function () {
        Route::get('/', 'RoomController@index');
    });
    Route::resource('room', 'RoomController');

    // University
    Route::group(['prefix' => 'university'], function () {
        Route::get('/','UniversityController@index');
    });
    Route::resource('university','UniversityController');

    // Module
    Route::group(['prefix' => 'module'], function () {
        Route::get('/','ModuleController@index');
    });
    Route::resource('module','ModuleController');

    // Exam
    Route::group(['prefix' => 'exam'], function () {
        Route::get('/','ExamController@index');
    });
    Route::resource('exam','ExamController');

    // Exam Area
    Route::group(['prefix' => 'exam-area'], function () {
       Route::get('/','ExamAreaController@index');
    });
    Route::resource('exam-area','ExamAreaController');
});
