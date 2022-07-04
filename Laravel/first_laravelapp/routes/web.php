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


// ------------------実習---------------------
Route::get('jissyu2', 'JissyuController@index');

Route::get('jissyu3', 'Jissyu3_1Controller@index');
Route::post('jissyu3', 'Jissyu3_1Controller@post');

Route::get('chapter3_2', 'Chapter3_2Controller@index');

Route::get('jissyu6', 'Jissyu4_1Controller@index');
Route::post('jissyu6', 'Jissyu4_1Controller@post');

Route::get('jissyu4_2', 'Jissyu4_2Controller@index');
Route::post('jissyu4_2', 'Jissyu4_2Controller@post');

Route::get('jissyu4_3', 'Jissyu4_3Controller@index');
Route::post('jissyu4_3', 'Jissyu4_3Controller@post');

Route::get('jissyu4_4', 'Jissyu4_4Controller@index');
Route::post('jissyu4_4', 'Jissyu4_4Controller@post');
// ------------------------------------------



// テスト（laravel効果測定1回）
//問題1
Route::get('kouka1_1', 'Kouka1_1Controller@index');
//問題2
Route::get('kouka1_2', 'Kouka1_2Controller@index');
Route::post('kouka1_2', 'Kouka1_2Controller@post');
