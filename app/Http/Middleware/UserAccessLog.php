<?php

namespace App\Http\Middleware;

use App\Model\UserLog;
use Closure;
use Illuminate\Support\Facades\Log;

class UserAccessLog
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
        try {
            $data = [
                'user_id' => session()->get('user_info')['id'] ?? 0,
                'ip'      => request()->getClientIp(),
                'url'     => request()->getRequestUri(),
            ];

            UserLog::create($data);
        } catch (\Exception $e) {
            Log::warning('-----user_log_error-----');
            Log::warning($e);
        }

        return $next($request);
    }
}
