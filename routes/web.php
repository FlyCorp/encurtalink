<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

Route::group(['middleware' => 'auth', 'prefix' => 'urls', 'as' => 'urls.'], function () {
    Route::get('', 'ShortUrlController@index')->name('index');
    Route::post('cadastrar', 'ShortUrlController@postCreate')->name('postCreate');
    Route::post('{id}/editar', 'ShortUrlController@postEdit')->name('postEdit');
    Route::post('{id}/excluir', 'ShortUrlController@postDelete')->name('postDelete');
    Route::get('buscar/{term?}', 'ShortUrlController@getSearch')->name('getSearch');
});

Route::group(['middleware' => 'web', 'prefix' => 'web', 'as' => 'web.'], function () {    
    Route::get('{code}', 'ShortUrlController@getUrl')->name('getUrl');
});

Route::group(['middleware' => 'auth', 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('', 'UserController@index')->name('index');
    Route::post('cadastrar', 'UserController@postCreate')->name('postCreate');
    Route::post('{id}/editar', 'UserController@postEdit')->name('postEdit');
    Route::post('{id}/excluir', 'UserController@postDelete')->name('postDelete');
    Route::get('buscar/{term?}', 'UserController@getSearch')->name('getSearch');
});
