<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group([
    'prefix' => 'v1', 'as' => 'api.', 'namespace' => 'App\Http\Controllers\Api\V1', 'middleware' => 'api'
], function ($router) {
    Route::post('/register', 'AuthController@register')->name('register');
    Route::post('/login', 'AuthController@login')->name('login');
    Route::post('/logout', 'AuthController@logout')->name('logout');
    Route::post('/refresh', 'AuthController@refresh');
    Route::post('/me', 'AuthController@me');

    Route::get('/task', 'TaskController@index');
    Route::get('/task/{id}', 'TaskController@show');
    Route::post('/task', 'TaskController@store');
    Route::put('/task/{id}', 'TaskController@update');
    Route::delete('/task/{id}', 'TaskController@destroy');
});
