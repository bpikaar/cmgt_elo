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
    Route::get('docent', 'TeacherController@index');
    Route::get('docent/beoordeling_overzicht_studenten/{course}', 'TeacherController@studentsByCourse');
    Route::get('docent/beoordeling_toevoegen/{course}/{id}', 'TeacherController@addGrade');
    Route::post('docent/beoordelingen_opslaan', 'TeacherController@storeResults');

    /**
     * Student
     */
    Route::get('student', 'StudentController@index');
    Route::get('student/assessment/{blockId}', 'StudentController@statusUpdate');
    Route::get('student/dashboard', 'StudentController@dashboard');
    Route::get('student/{id}', 'StudentController@assessmentApplication');
    Route::post('student', 'StudentController@createAssessment');


    Route::get('alle-feedback/{id}', 'FeedbackController@all');
});
