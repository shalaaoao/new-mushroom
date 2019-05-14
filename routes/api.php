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
Route::any('city_list', ['as' => 'city_list', 'uses' => 'IViewController@cityList']);
Route::any('login', ['as' => 'login', 'uses' => 'IViewController@login']);

//风险问卷接口
Route::any('qanswer_list', ['as' => 'qanswer_list', 'uses' => 'IViewController@qanswerList']);


//需要通过token获取
Route::group(['middleware' => ['admin_token']], function() {
    Route::any('get_user_info', ['as' => 'get_user_info', 'uses' => 'IViewController@getUserInfo']);
    Route::any('message_count', ['as' => 'message_count', 'uses' => 'IViewController@messageCount']);
    Route::any('login_out', ['as' => 'login_out', 'uses' => 'IViewController@loginOut']);
    Route::any('del_user', ['as' => 'del_user', 'uses' => 'IViewController@delUser']);
    Route::any('edit_user', ['as' => 'edit_user', 'uses' => 'IViewController@editUser']);

});
