<?php

namespace App\Http\Middleware;

use App\Library\MyHelper;
use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserLogin
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
        $back_url = MyHelper::getCurrentUrl();

        if (!Session::has('user_info')) {
            return Redirect::away(route('user.login', ['back_url' => $back_url]));
        }

        return $next($request);
    }
}
