<?php

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/home/news', 'NewsController',['only' => ['index', 'create', 'store', 'destroy']])->middleware('auth');
