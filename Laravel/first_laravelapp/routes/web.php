<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HelloMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@post');

Route::get('person', 'PersonController@index');
Route::get('person/find', 'PersonController@find');
Route::post('person/find', 'PersonController@search');


// Route::get or post(URLのパス, getかpostの時に返す値)
// 第2引数に'コントローラー名@メソッド名'でコントローラーの内容を返す

// {param?}でurlよりパラメータを渡せる

// Middlewareはルート情報で呼び出し、メソッドチェーンを利用して記述
// グループウェアに登録していれば不要
// 複数も可能
    // Route::get(...)->middleware(...)->middleware(...);

