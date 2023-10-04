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
      

    });

});

