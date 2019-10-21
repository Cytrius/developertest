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

Route::resource('assessments', 'AssessmentController')->middleware('auth');
Route::resource('questions', 'QuestionController')->middleware('auth');
Route::resource('candidates', 'CandidateController')->middleware('auth');
Route::resource('answers', 'AnswerController');
