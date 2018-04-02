<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('persons', 'PersonsController', ['only' => ['index', 'create', 'edit']]);

Route::get('/v2/api/persons', 'Api\PersonsController@index');
Route::get('/v2/api/persons/{id}', 'Api\PersonsController@edit');
Route::post('/v2/api/persons', 'Api\PersonsController@store');
Route::patch('/v2/api/persons/{id}', 'Api\PersonsController@update');
Route::delete('/v2/api/persons/{id}', 'Api\PersonsController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
