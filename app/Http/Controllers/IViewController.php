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
        $name = $request->get('name', '');
        $qanswer = $request->get('qanswer', '');

        Log::warning($request->all());

        $data     = UserInfo::where([]);

        if ($name) {
            $data->where('customerappellation', 'like', '%'.$name.'%');
        }

        if ($qanswer !== NULL) {
            $data->where('qanswer', $qanswer);
        }

        $count = $data->count();

        $data = $data->forPage($pageNum, $pageSize)->orderBy('id', 'asc')->get()->toArray();

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

        $url = $request->get('filelist')[0];
        Log::warning(json_decode($url, true));

        return response()->json(['status' => 500, 'data' => '密码错误']);
    }

    //登陆
    public function login(Request $request)
    {
        $userName = $request->get('userName', '');
        $password = $request->get('password', '');

        //判断密码正确
        $valid_pwd = 10;
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

    //获取message数量
    public function messageCount()
    {
        return response()->json(['status' => 200, 'data'=> 99]);
    }

    //退出登录
    public function loginOut(Request $request)
    {
        $token = $request->header('token');

        //退出登录

        return response()->json(['status' => 200, 'data'=> '']);
    }

    //城市列表
    public function cityList(){
        $data = [
            ['value' => 0, 'label' => '上海'],
            ['value' => 1, 'label' => '北京'],
            ['value' => 2, 'label' => '广州'],
            ['value' => 3, 'label' => '纽约'],
            ['value' => 4, 'label' => '伦敦'],
            ['value' => 5, 'label' => '东京'],
        ];

        return response()->json(['status' => 200, 'data'=> $data]);
    }

    //删除用户
    public function delUser()
    {
        $id = request('id', 0);
        if (!$id || !UserInfo::where('id', $id)->exists()) {
            return response()->json(['status' => 500, 'data'=> '不存在的用户']);
        }

        UserInfo::where('id', $id)->delete();
        return response()->json(['status' => 200, 'data'=> '']);
    }

    //编辑用户
    public function editUser()
    {
        $name = request('name', '');
        $qanswer = request('qanswer', '');
        $phone = request('phone', '');
        $id = request('id', 0);
        if (!$id) {
            return response()->json(['status' => 500, 'data'=> '不存在的用户']);
        }

        Log::warning(request()->all());
        $user = UserInfo::find($id);
        if (!$user) {
            return response()->json(['status' => 500, 'data'=> '不存在的用户']);
        }

        if ($name) {
            $user->customerappellation = $name;
        }

        if ($qanswer) {
            $user->qanswer = $qanswer;
        }

        if ($phone) {
            $user->handset = $phone;
        }

        $user->save();

        return response()->json(['status' => 200, 'data'=> '']);
    }

    //用户风险等级list
    public function qanswerList()
    {
        $data = [
            ['value' => 0, 'label' => '未填写'],
            ['value' => 1, 'label' => '北京'],
            ['value' => 2, 'label' => '广州'],
            ['value' => 3, 'label' => '纽约'],
            ['value' => 4, 'label' => '伦敦'],
            ['value' => 5, 'label' => '东京'],
        ];

        return response()->json(['status' => 200, 'data'=> $data]);
    }
}
