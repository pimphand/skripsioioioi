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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

Route::group(['prefix' => 'config', 'as' => 'config.'], function () {
  Route::get('/online', 'ConfigController@online')->name('online');
  Route::get('/', 'ConfigController@onlineList')->name('onlineList');
});

Route::resource('doctor', 'DoctorController');

Auth::routes();

Route::middleware(['activeUser'])->group(function () {
  Route::get('/home', 'HomeController@index')->name('home');

  Route::group(['prefix' => 'chat', 'as' => 'chat.'], function () {
    Route::get('/', 'ChatRoomController@index')->name('index');
    Route::get('/create', 'ChatRoomController@create')->name('create');
  });

  Route::group(['prefix' => 'doctor', 'as' => 'doctor.'], function () {
    Route::get('/', 'DoctorController@index')->name('index')->middleware('auth', 'role:0|1');
    Route::get('/create', 'DoctorController@create')->name('create')->middleware('auth', 'role:0');
    Route::post('/store', 'DoctorController@store')->name('store')->middleware('auth', 'role:0');
    Route::post('/show', 'DoctorController@show')->name('show');
    Route::get('/edit/{id}', 'DoctorController@edit')->name('edit')->middleware('auth', 'role:0|1');
    Route::post('/update/{id}', 'DoctorController@update')->name('update');
    Route::get('/delete/{id}', 'DoctorController@destroy')->name('delete')->middleware('auth', 'role:0|1');
    Route::post('/image/update/{id}', 'DoctorController@updateImage')->name('updateImage')->middleware('auth');
  });

  Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/', 'UserController@index')->name('index')->middleware('auth', 'role:0|3');
    Route::get('/create', 'UserController@create')->name('create')->middleware('auth', 'role:0');
    Route::post('/store', 'UserController@store')->name('store');
    Route::post('/edit', 'UserController@findAndChange')->name('findAndChange');
    Route::get('/edit/{id}', 'UserController@edit')->name('edit')->middleware('auth', 'role:0|3');
    Route::post('/update/{id}', 'UserController@update')->name('update');
    Route::get('/suspand/{id}', 'UserController@suspand')->name('suspand');
    Route::get('/delete/{id}', 'UserController@destroy')->name('delete')->middleware('auth', 'role:0|3');
  });

  Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
    Route::get('/', 'Controller@index')->name('index');
    Route::get('/create', 'BlogController@create')->name('create');
    Route::post('/store', 'BlogController@store')->name('store');
    Route::post('/edit', 'BlogController@findAndChange')->name('findAndChange');
    Route::get('/edit/{id}', 'BlogController@edit')->name('edit');
    Route::post('/update/{id}', 'BlogController@update')->name('update');
    Route::get('/suspand/{id}', 'BlogController@suspand')->name('suspand');
    Route::get('/delete/{id}', 'BlogController@destroy')->name('delete');
  });
});
