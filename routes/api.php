<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::get('cat/alldata','Api\CategoriesController@index');
    Route::get('cat/show/{id}','Api\CategoriesController@show');
    Route::post('cat/create','Api\CategoriesController@store');
    Route::delete('cat/delete/{id}','Api\CategoriesController@delete');
    Route::patch('cat/update','Api\CategoriesController@update');

    Route::get('student/alldata','Api\StudentsController@index');
    Route::get('student/show/{id}','Api\StudentsController@show');
    Route::post('student/create','Api\StudentsController@store');
    Route::delete('student/delete/{id}','Api\StudentsController@delete');
    Route::patch('student/update','Api\StudentsController@update');


    Route::get('course/alldata','Api\CoursesController@index');
    Route::get('course/show/{id}','Api\CoursesController@show');
    Route::post('course/create','Api\CoursesController@store');
    Route::delete('course/delete/{id}','Api\CoursesController@delete');
    Route::patch('course/update','Api\CoursesController@update');


    Route::get('trainer/alldata','Api\TrainersController@index');
    Route::get('trainer/show/{id}','Api\TrainersController@show');
    Route::post('trainer/create','Api\TrainersController@store');
    Route::delete('trainer/delete/{id}','Api\TrainersController@delete');
    Route::patch('trainer/update','Api\TrainersController@update');



