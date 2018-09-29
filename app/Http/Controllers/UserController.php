<?php

namespace App\Http\Controllers;

use App\Bll\UserBll;
use App\Library\MyHelper;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function login(Request $request)
    {
        //登录成功后的跳转地址
        $back_url = $request->input('back_url', '');

        //登录遇到异常时的会跳地址
        $error_url = MyHelper::getCurrentUrl();

        $data = [
            'back_url'  => $back_url,
            'error_url' => $error_url,
        ];

        return View::make('user.login', $data);
    }

    public function doLogin(Request $request)
    {
        $phone          = $request->input('phone', '');
        $login_password = $request->input('login_password', '');
        $back_url       = urldecode($request->input('back_url', route('user.user_center')));
        $error_url      = urldecode($request->input('error_url', route('user.login')));

        $validator = Validator::make($request->all(), [
            'phone'          => 'required|phone_number',
            'login_password' => 'required',
        ]);

        if ($validator->fails()) {

            //验证不通过
            $alert = $validator->errors()->first();
            $request->session()->flash('login_alert', $alert);
            return \redirect($error_url);
        }

        //判断是否存在手机号
        $is_exist_phone = UserBll::isExistPhone($phone);
        if (!$is_exist_phone) {
            $request->session()->flash('login_alert', '该手机号未注册');
            return \redirect($error_url);
        }

        //校验密码
        if (!Hash::check($login_password, $is_exist_phone['password'])) {
            $request->session()->flash('login_alert', '登录密码错误');
            return \redirect($error_url);
        }

        //登录
        $request->session()->put('user_info', $is_exist_phone);

        return redirect($back_url);
    }

    //注册
    public function register(Request $request)
    {
        $back_url  = $request->input('back_url', '');
        $error_url = MyHelper::getCurrentUrl();

        $data = [
            'back_url'  => $back_url,
            'error_url' => $error_url,
        ];

        return View::make('user.register', $data);
    }

    //处理 - 注册
    public function doRegister(Request $request)
    {
        $back_url         = urldecode($request->input('back_url', route('user.user_center')));
        $error_url        = urldecode($request->input('error_url', route('user.login')));
        $phone            = $request->input('phone', '');
        $email            = $request->input('email', '');
        $login_password   = $request->input('login_password', '');
        $login_repassword = $request->input('login_repassword', '');

        $validator = Validator::make($request->all(), [
            'phone'            => 'required|phone_number',
            'email'            => 'required|email',
            'login_password'   => 'required',
            'login_repassword' => 'required',
        ]);

        if ($validator->fails()) {

            //验证不通过
            $alert = $validator->errors()->first();
            $request->session()->flash('register_alert', $alert);
            return \redirect($error_url);
        }

        if ($login_password != $login_repassword) {
            $request->session()->flash('register_alert', '两次输入的密码不一致');
            return \redirect($error_url);
        }

        //判断是否存在手机号
        $is_exist_phone = UserBll::isExistPhone($phone);
        if ($is_exist_phone) {
            $request->session()->flash('register_alert', '该手机号已注册，请直接登录');
            return \redirect($error_url);
        }

        //注册
        $user = UserBll::addRecord($phone, $email, $login_password);

        //登录session
        $request->session()->put('user_info', User::find($user['id'])->toArray());

        return \redirect($back_url);
    }

    //个人中心
    public function userCenter()
    {
        echo 'hello world';
    }

}
