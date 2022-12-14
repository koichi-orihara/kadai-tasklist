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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', 'TasksController@index');

//Route::group() でルートのグループを作り、 auth ミドルウェアを指定することで、
//このグループ内のルートへアクセスする際に、認証を必要とするようにできる。
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'TasksController@index');
    Route::resource('tasks', 'TasksController');
});

//ユーザー登録 /signup/にgetメソッドでアクセスしたらAuth\RegisterControllerのshowRegistrationFormメソッドを呼び出す。
//→return view('auth.register');
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//認証
//showLoginForm→return view('auth.login');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');