<?php

// Menggunakan closure
Route::get('/', function () {
    return view('welcome');
});

// Menggunakan function
Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::resource('posts', PostController::class);
