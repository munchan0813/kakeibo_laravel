<?php

use Illuminate\Http\Request;
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
	// kakeibo topになるようにする
    return view('welcome');
});

Auth::routes();

// ホーム画面
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/kakeibo/create', 'KakeiboController@create')->name('kakeibo.create');
Route::post('/kakeibo/create', 'KakeiboController@add')->name('kakeibo.add');
