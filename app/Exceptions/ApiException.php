<?php
namespace App\Exceptions;

/***
 * API 自定义异常类
 */
use Exception;

class ApiException extends Exception
{
    public $errorMsg;
    public $errorCode;

    //自定义异常处理
    public function SetErrorMessage($errorMsg='', $errorCode = '500'){
        $this->errorMsg = $errorMsg;
        $this->errorCode = $errorCode;
        return $this;

    }

}
