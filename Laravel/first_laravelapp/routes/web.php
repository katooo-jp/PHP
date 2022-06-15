<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', 'HelloController@index');

Route::post('hello', 'HelloController@post');


// Route::get or post(URLのパス, getかpostの時に返す値)
// 第2引数に'コントローラー名@メソッド名'でコントローラーの内容を返す

// {param?}でurlよりパラメータを渡せる
