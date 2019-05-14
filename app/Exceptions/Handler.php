<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    public function handler(Exception $exception)
    {
        #当.env中的APP_DEBUG配置为True时调用原有的错误处理方式,false使用自定义的错误处理方式
        if (config('app.debug')) {
            //可以处理成需要的格式
            $return = [
                'status' => "fail",
                'message' => '',
                'data' => [
                    'msg' => $exception->getMessage(),
                    'line' => $exception->getLine(),
                    'file' => $exception->getFile(),
                ]
            ];
        } else {
            //可以处理成需要的格式
            $return = [
                'status' => "fail",
                'message' => '系统错误',
                'data' => []
            ];
        }

        return response()->json($return);
    }

    public function render($request, Exception $exception)
    {

        return $this->handler($exception);
    }
}
