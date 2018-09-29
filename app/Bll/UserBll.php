<?php

namespace App\Bll;

use App\Model\User;
use Illuminate\Support\Facades\Hash;

class UserBll extends BaseBll
{
    //新增user记录
    public static function addRecord($phone, $email, $password)
    {
        return User::create(['phone' => $phone, 'email' => $email, 'password' => Hash::make($password)]);
    }

    //判断是否已存在手机号
    public static function isExistPhone($phone)
    {
        $query = User::where('phone', $phone)->first();
        if ($query) {
            return $query->toArray();
        }

        return [];
    }
}
