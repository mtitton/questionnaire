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
    Route::get('/', 'HomeController@index');

    //Questionnaire
    Route::get('questionnaire', 'QuestionnaireController@index');
    Route::get('questionnaire/new', 'QuestionnaireController@new');
    Route::post('questionnaire/save', 'QuestionnaireController@save');
    Route::get('questionnaire/{question}/edit', 'QuestionnaireController@edit');
    Route::patch('questionnaire/{question}', 'QuestionnaireController@update');
    Route::delete('questionnaire/{question}', 'QuestionnaireController@delete');

    //Answer
    Route::get('answer', 'AnswerController@index');
    Route::post('answer/save', 'AnswerController@save');
    
    Route::Auth();
    //Auth::routes();

    Route::get('home', 'HomeController@index')->name('home');
