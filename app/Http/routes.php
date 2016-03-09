<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::auth();

    Route::resource('exams', 'ExamsController');
    Route::resource('users', 'UsersController');
    Route::resource('courses', 'CoursesController');
    Route::resource('bb', 'BuildingBlocksController');
    //Route::get('users/{id}', 'UsersController@index');

    /**
     * Docent -> beheer
     */
    Route::group(['prefix'=>'docent'], function() {
        Route::get('/', 'TeacherController@index');
        Route::get('beoordeling_overzicht_studenten/{course}', 'TeacherController@studentsByCourse');
        Route::get('beoordeling_toevoegen/{course}/{id}', 'TeacherController@addGrade');
        Route::post('beoordelingen_opslaan', 'TeacherController@storeResults');
    });

    /**
     * Student
     */
    Route::group(['prefix'=>'student'], function() {
        Route::get('/', 'StudentController@index');
        Route::get('assessment/{blockId}', 'StudentController@statusUpdate');
        Route::get('dashboard', 'StudentController@dashboard');
        Route::get('{id}', 'StudentController@assessmentApplication');
        Route::post('/', 'StudentController@createAssessment');
    });


    Route::get('alle-feedback/{id}', 'FeedbackController@all');
});
