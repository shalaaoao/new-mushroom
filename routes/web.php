<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
$router->any('test', ['as' => 'test', 'uses' => 'TestController@test']);
$router->any('test2', ['as' => 'test2', 'uses' => 'TestController@test2']);

$router->group(['middleware' => 'user_access_log'], function ($router) {

    //首页
    $router->get('/', ['as' => '/', 'uses' => 'IndexController@index']);

    $router->group(['prefix' => 'user'], function ($router) {

        //登录
        $router->get('login', ['as' => 'user.login', 'uses' => 'UserController@login']);

        //处理 - 登录
        $router->post('do_login', ['as' => 'user.do_login', 'uses' => 'UserController@doLogin']);

        //注册
        $router->get('register', ['as' => 'user.register', 'uses' => 'UserController@register']);

        //处理 - 注册
        $router->post('do_register', ['as' => 'user.do_register', 'uses' => 'UserController@doRegister']);

        $router->group(['middleware' => ['user_login']], function ($router) {

            //个人中心
            $router->get('user_center', ['as' => 'user.user_center', 'uses' => 'UserController@userCenter']);
        });
    });

    $router->group(['prefix' => 'jiny'], function ($router) {

        //love circle
        $router->get('20190520', ['as' => 'jiny.20190520', 'uses' => 'JinYController@act_20190520']);
    });
});
