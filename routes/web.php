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
	// kakeibo topになるようにする?
    return view('welcome');
});

Auth::routes();

// kakeibo一覧出力
Route::get('/home', 'HomeController@index')->name('home');


// kakeibo新規作成
Route::get('/kakeibo/createKakeibo', 'HomeController@createIndex')->name('kakeibo.createKakeibo');
Route::post('/kakeibo/createKakeibo', 'HomeController@add')->name('kakeibo.addKakeibo');


// kakeibo詳細登録画面
Route::get('/kakeibo/create', 'KakeiboController@create')->name('kakeibo.create');
// kakeibo詳細を登録
Route::post('/kakeibo/create', 'KakeiboController@add')->name('kakeibo.add');
