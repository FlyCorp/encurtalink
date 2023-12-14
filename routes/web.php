<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'MainController@showLogin')->name('main');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
});

Route::group(['middleware' => 'auth', 'prefix' => 'urls', 'as' => 'urls.'], function () {
    Route::get('', 'ShortUrlController@index')->name('index');
    Route::post('cadastrar', 'ShortUrlController@postCreate')->name('postCreate');
    Route::get('{id}/editar', 'ShortUrlController@getEdit')->name('getEdit');
    Route::post('{id}/editar', 'ShortUrlController@postEdit')->name('postEdit');
    Route::post('{id}/excluir', 'ShortUrlController@postDelete')->name('postDelete');
    Route::get('buscar/{term?}', 'ShortUrlController@getSearch')->name('getSearch');

    Route::get('configuracoes', 'LinkConfigurationController@index')->name('config.index');
    Route::post('configuracoes/cadastrar', 'LinkConfigurationController@postCreate')->name('config.postCreate');
    Route::get('configuracoes/{id}/editar', 'LinkConfigurationController@getEdit')->name('config.getEdit');
    Route::post('configuracoes/{id}/editar', 'LinkConfigurationController@postEdit')->name('config.postEdit');
    Route::post('configuracoes/{id}/excluir', 'LinkConfigurationController@postDelete')->name('config.postDelete');
    Route::get('configuracoes/chaves',        'LinkConfigurationController@getKeys')->name('config.getKeys');
    Route::get('configuracoes/buscar/{term?}', 'LinkConfigurationController@getSearch')->name('config.getSearch');
});

Route::group(['middleware' => 'auth', 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('', 'UserController@index')->name('index');
    Route::post('cadastrar', 'UserController@postCreate')->name('postCreate');
    Route::post('{id}/editar', 'UserController@postEdit')->name('postEdit');
    Route::post('{id}/excluir', 'UserController@postDelete')->name('postDelete');
    Route::get('buscar/{term?}', 'UserController@getSearch')->name('getSearch');
});

Route::group(['middleware' => 'web', 'prefix' => 'nps', 'as' => 'nps.'], function () {
    Route::get('agradecimento', 'NpsController@feedback')->name('feedback');
    Route::get('{uuid}', 'NpsController@show')->name('show');
    Route::get('{uuid}/voto/{vote}', 'NpsController@vote')->name('vote');
    Route::post('{uuid}/voto/{vote}', 'NpsController@reason')->name('reason');
});

Route::group(['middleware' => 'auth', 'prefix' => 'nps-links', 'as' => 'nps-links.'], function () {
    Route::get('', 'NpsController@index')->name('index');
    Route::post('cadastrar', 'NpsController@postCreate')->name('postCreate');
    Route::post('{id}/editar', 'NpsController@postEdit')->name('postEdit');
    Route::post('{id}/excluir', 'NpsController@postDelete')->name('postDelete');
    Route::get('buscar/{term?}', 'NpsController@getSearch')->name('getSearch');
});

// ADD IN LAST FILE THIS ROUTE BLOCK
Route::group(['middleware' => 'web', 'as' => 'web.'], function () {
    $routes        = collect(Route::getRoutes()->getRoutes())->pluck("uri")->toArray();
    $currentRoutes = substr(request()->getPathInfo(),1);

    if(!in_array($currentRoutes,$routes)){
        Route::get('{code}', 'ShortUrlController@getUrl')->name('getUrl');
    }
});
