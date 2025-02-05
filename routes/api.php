<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::group(['middleware' => 'api', 'prefix' => 'nps'], function () {
    Route::post('/receive', 'Api\NpsApiController@receive')->name('nps.receive')->withoutMiddleware('throttle');
    Route::post('/update', 'Api\NpsApiController@update')->name('nps.update')->withoutMiddleware('throttle');
    Route::post('/homolog', 'Api\NpsApiController@homolog')->name('nps.homolog')->withoutMiddleware('throttle');
});

