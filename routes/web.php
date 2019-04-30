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
  //  return view('welcome');
   return view('index');
 // return view('Dashboard.home');
});

Route::get('/session','SessionController@index');
Route::post('/session','SessionController@addSession');
Route::delete('/session/{sessionid?}','SessionController@deleteSession');
Route::put('/session/{sessionid?}','SessionController@updateSession');

Route::get('/class','ClasssController@index');
Route::post('/class','ClasssController@store');
Route::delete('/class/{classid?}','ClasssController@destroy');
Route::put('/class/{classid?}','ClasssController@update');

Route::get('/subject','SubjectController@index');
Route::post('/subject','SubjectController@store');
Route::delete('/subject/{subjectid?}','SubjectController@destroy');
Route::put('/subject/{subjectid?}','SubjectController@update');

Route::get('/student','StudentController@index');
Route::post('/student','StudentController@store');
Route::delete('/student/{studentid?}','StudentController@destroy');
Route::put('/student/{studentid?}','StudentController@update');
Route::post('/student/fetch','StudentController@fetch');
Route::get('/student/changeClass','StudentController@changeClassIndex');
Route::put('/student/changeclass/{studentid?}','StudentController@changeClass');
Route::get('/student/class','StudentController@studentsInClass');

Route::get('/score','ScoreController@index');
Route::post('/score','ScoreController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logoutt', function(){
  Auth::logout();
  return Redirect::to('/');
});
