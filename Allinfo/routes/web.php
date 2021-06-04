<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'LoggedController@index')->name('home');

Route::get('/home', 'LoggedController@home')->name('home');
Route::get('/home', 'GuestController@home')->name('home');

Route::get('/car/{index}', 'LoggedController@car') -> name('car');

Route::get('/create/car', 'LoggedController@create') -> name('create');
Route::post('/store/car', 'LoggedController@store') -> name('store');

Route::get('/edit/car/{id}', 'LoggedController@edit') -> name('edit');
Route::post('/update/car/{id}', 'LoggedController@update') -> name('update');

Route::get('/deleted/{id}', 'LoggedController@deleted') -> name('deleted');
