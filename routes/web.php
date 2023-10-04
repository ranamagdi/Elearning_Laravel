<?php

use Illuminate\Support\Facades\Route;

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
Route::namespace('Front')->group(function(){
    Route::get('/', 'HomePageController@index')->name('front.homepage');
    Route::get('/about', 'AboutController@index')->name('front.about');
    Route::post('/Message/newsletter', 'MessegesController@index')->name('front.message.newsletter');
    Route::post('/Message/enroll', 'MessegesController@enroll')->name('front.message.enroll');
    Route::post('/Message/contact', 'MessegesController@contact')->name('front.message.contact');
    Route::get('/contact', 'ContactController@index')->name('front.contact');
    Route::get('/cat/{id}', 'CourseController@showAll')->name('front.courseCat');
    Route::get('/cat/{id}/course/{cid}', 'CourseController@show')->name('front.courseShow');

});
Route::namespace('Admin')->prefix('dashboard')->group(function(){

    Route::get('/login', 'HomeController@login')->name('admin.login');
    Route::post('/dologin', 'HomeController@dologin')->name('admin.dologin');
    Route::middleware('adminAuth:admin')->group(function(){
        Route::get('/', 'HomeController@index')->name('admin.home');
        Route::get('/cat', 'CatController@index')->name('admin.cat');
        Route::get('/cat/create', 'CatController@create')->name('admin.cat.create');
        Route::post('/cat/store', 'CatController@store')->name('admin.cat.store');
        Route::get('/cat/edit/{id}', 'CatController@edit')->name('admin.cat.edit');
        Route::post('/cat/update','CatController@update')->name('admin.cat.update');
        Route::get('/cat/delete/{id}', 'CatController@delete')->name('admin.cat.delete');
        Route::get('/cat/single/{id}', 'CatController@single')->name('admin.cat.single');
        Route::get('/logout', 'HomeController@logout')->name('admin.logout');

        Route::get('/trainer', 'TrainersController@index')->name('admin.trainer');
        Route::get('/trainer/create', 'TrainersController@create')->name('admin.trainer.create');
        Route::post('/trainer/store', 'TrainersController@store')->name('admin.trainer.store');
        Route::get('/trainer/edit/{id}', 'TrainersController@edit')->name('admin.trainer.edit');
        Route::post('/trainer/update','TrainersController@update')->name('admin.trainer.update');
        Route::get('/trainer/delete/{id}', 'TrainersController@delete')->name('admin.trainer.delete');
        Route::get('/trainer/single/{id}', 'TrainersController@single')->name('admin.trainer.single');

        Route::get('/course', 'CoursesController@index')->name('admin.course');
        Route::get('/course/create', 'CoursesController@create')->name('admin.course.create');
        Route::post('/course/store', 'CoursesController@store')->name('admin.course.store');
        Route::get('/course/edit/{id}', 'CoursesController@edit')->name('admin.course.edit');
        Route::post('/course/update','CoursesController@update')->name('admin.course.update');
        Route::get('/course/delete/{id}', 'CoursesController@delete')->name('admin.course.delete');
        Route::get('/course/single/{id}', 'CoursesController@single')->name('admin.course.single');

        Route::get('/students', 'StudentsController@index')->name('admin.student');
        Route::get('/students/create', 'StudentsController@create')->name('admin.student.create');
        Route::post('/students/store', 'StudentsController@store')->name('admin.student.store');
        Route::get('/students/edit/{id}', 'StudentsController@edit')->name('admin.student.edit');
        Route::post('/students/update','StudentsController@update')->name('admin.student.update');
        Route::get('/students/delete/{id}', 'StudentsController@delete')->name('admin.student.delete');
        Route::get('/students/single/{id}', 'StudentsController@single')->name('admin.student.single');


    });

});

