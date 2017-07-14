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

Route::get('/home', 'HomeController@index');
Route::post('/users/logout', 'Auth\LoginController@userLogout')->name('users.logout');


Route::prefix('tutors')->group(function(){
    Route::get('/login', 'Auth\TutorLoginController@showLoginForm')->name('tutors.login');
    Route::post('/login', 'Auth\TutorLoginController@login')->name('tutors.login.submit');
    Route::get('/', 'TutorController@index')->name('tutors.dashboard');
    Route::get('/register', 'Auth\TutorRegisterController@showRegistrationForm')->name('tutors.register');
    Route::post('/register', 'Auth\TutorRegisterController@register')->name('tutors.register.submit');
    Route::post('/logout', 'Auth\TutorLoginController@tutorLogout')->name('tutors.logout');
});

Route::prefix('admin')->group(function(){

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

