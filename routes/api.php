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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//IView测试用接口
Route::any('get_table_info', ['as' => 'get_table_info', 'uses' => 'IViewController@getTableInfo']);
Route::any('add_info', ['as' => 'add_info', 'uses' => 'IViewController@addInfo']);
Route::any('login', ['as' => 'login', 'uses' => 'IViewController@login']);

//需要通过token获取
Route::group(['middleware' => ['admin_token']], function() {
    Route::any('get_user_info', ['as' => 'get_user_info', 'uses' => 'IViewController@getUserInfo']);
});
