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

Route::get('/', function (){
    return view('index');
});

// Route::get('/tasks', 'TaskController@display');

// Route::post('/tasks', 'TaskController@store');

// Route::put('/tasks/{task}', 'TaskController@update');

// Route::delete('/tasks/{task}', 'TaskController@delete');

// Route::get('/tasks/create', 'TaskController@create');

// Route::get('/tasks/{task}', 'TaskController@show');

// Route::get('/tasks/{task}/edit', 'TaskController@edit');

Route::resource('quizzes', 'QuizController');

// Route::prefix('quiz')->group(function () {
//     Route::get('/', 'QuizController@index');
//     Route::post('/', 'QuizController@store');
//     Route::get('/create', 'QuizController@create');
//     Route::get('/{quiz}', 'QuizController@show');
// });