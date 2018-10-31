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

        // 设置模块
        $api->prefix('setting')->group(function(){

            // 用户权限设置
            $api->prefix('permission')->group(function(){
                $api->post('create','App\Http\Controllers\Api\Permission\CreateController@index');
                $api->post('give','App\Http\Controllers\Api\Permission\GiveController@index');
                $api->post('get','App\Http\Controllers\Api\Permission\GetController@index');
            });
        });

        // 工作台模块
        $api->prefix('workspace')->group(function(){
            $api->prefix('mysql')->group(function(){
                $api->post('create','App\Http\Controllers\Api\Mysql\CreateController@index');
                $api->post('query','App\Http\Controllers\Api\Mysql\QueryController@index');
                $api->post('check_query','App\Http\Controllers\Api\Mysql\CheckQueryController@index');
            });
        });

        // 统计模块

        // 用户模块
        
        $api->post('test','App\Http\Controllers\Api\TestController@index');
    });

});


