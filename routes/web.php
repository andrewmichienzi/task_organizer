<?php

Route::get('/', 'PostController@index')->name('home');

Route::get('/posts/create', 'PostController@create');

Route::get('/posts/{post}', 'PostController@show');

Route::post('/posts', 'PostController@store');

ROUTE::post('/posts/{post}/comments', 'CommentController@store');

Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionController@create');

Route::post('/login', 'SessionController@store');

Route::get('/logout', 'SessionController@destroy');

//Create, show, store, delete, index, destroy