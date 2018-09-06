<?php

use Illuminate\Http\Request;

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

$api = app('Dingo\Api\Routing\Router');

$api->version('v1',function($api){
    $api->post('register', 'App\Http\Controllers\Api\LoginController@register');
    $api->post('login', 'App\Http\Controllers\Api\LoginController@login');
    $api->group(['middleware' => 'auth:api'], function(){
	    Route::post('details', 'Api\LoginController@details');
    });
});
