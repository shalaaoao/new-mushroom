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

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', ['as' => 'test', 'uses' => 'TestController@test']);
Route::get('test2', ['as' => 'test2', 'uses' => 'TestController@test2']);

Route::group(['prefix' => 'user'], function(){

    //登录
    Route::get('login', ['as' => 'user.login', 'uses' => 'UserController@login']);

    //处理 - 登录
    Route::post('do_login', ['as' => 'user.do_login', 'uses' => 'UserController@doLogin']);

    //注册
    Route::get('register', ['as' => 'user.register', 'uses' => 'UserController@register']);

    //处理 - 注册
    Route::post('do_register', ['as' => 'user.do_register', 'uses' => 'UserController@doRegister']);


    Route::group(['middleware' => ['user_login']], function() {

        //个人中心
        Route::get('user_center', ['as' => 'user.user_center', 'uses' => 'UserController@userCenter']);
    });
});
