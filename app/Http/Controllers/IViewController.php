<?php

namespace App\Http\Controllers;

use App\Model\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IViewController extends Controller
{
    //获取数据
    public function getTableInfo(Request $request)
    {
        $pageSize = $request->get('pageSize', 15);
        $pageNum  = $request->get('pageNum', 1);
        $count    = UserInfo::where([])->count();
        $data     = UserInfo::where([])->forPage($pageNum, $pageSize)->orderBy('id', 'asc')->get()->toArray();

        $res = [
            'count' => $count,
            'data'  => $data,
        ];

        return response()->json($res);
    }

    //新增数据
    public function addInfo(Request $request)
    {
        Log::info($request->all());

        return response()->json(['data' => 1]);
    }

    //登陆
    public function login(Request $request)
    {
        $userName = $request->get('userName', '');
        $password = $request->get('password', '');

        //判断密码正确
        $valid_pwd = 1;
        if (!$valid_pwd) {
            return response()->json(['status' => 500, 'data' => '密码错误']);
        }

        $token = str_random(20);

        //新增/覆盖token数据


        Log::info($token);

        return response()->json(['status' => 200, 'data' => $token]);
    }

    //获取个人信息
    public function getUserInfo(Request $request)
    {
        $admin_id = self::$admin_id;
        if (!$admin_id) {

            //return false;
        }

        $data = [
            'name'    => 'super_admin',
            'user_id' => '1',
            'access'  => ['super_admin', 'admin'],
            'token'   => $request->header('token'),
            'avator'  => 'https://file.iviewui.com/dist/a0e88e83800f138b94d2414621bd9704.png'
        ];

        return response()->json(['status' => 200, 'data' => $data]);
    }
}
