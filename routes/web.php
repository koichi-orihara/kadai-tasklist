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

Route::get('/tasks', 'TasksController@index');

Route::resource('tasks', 'TasksController');

//ユーザー登録 /signup/にgetメソッドでアクセスしたらAuth\RegisterControllerのshowRegistrationFormメソッドを呼び出す。
//→return view('auth.register');
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
