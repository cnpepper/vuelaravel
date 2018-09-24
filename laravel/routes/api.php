<?php

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

$api->version('v1', function ($api) {

    // 不需要验证的api
    $api->group(['middleware' => ['cors']], function ($api) {
        //$api->post('user_register', 'App\Http\Controllers\Api\LoginController@register'); 暂时没实现
        $api->post('user_login', 'App\Http\Controllers\Api\UserLoginController@index');
        
    });

    // 需要验证的api
    $api->group(['middleware' => ['auth:api', 'cors']], function ($api) {
        //
        $api->post('svn_update', 'App\Http\Controllers\Api\SvnController@index'); // 使用了dingo后要用她的路由才有效
        $api->post('test','App\Http\Controllers\Api\LoginController@test');
    });

});


