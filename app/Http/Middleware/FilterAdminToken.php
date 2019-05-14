<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Support\Facades\Log;

class FilterAdminToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('token');

        if (!$token){
            return response()->json(['status' => 500, 'data' => '缺少token参数']);
        }

        //查询用户信息
        $admin_id = 'xxx';
        if (!$admin_id) {
            return response()->json(['status' => 500, 'data' => 'token值无效']);
        }

        Controller::$admin_id = $admin_id;

        Log::info('----入参----',request()->all());

        return $next($request);
    }
}
