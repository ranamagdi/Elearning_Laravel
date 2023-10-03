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
Route::namespace('Admin')->group(function(){
    Route::get('/dashboard', 'HomeController@index')->name('admin.home');
});

