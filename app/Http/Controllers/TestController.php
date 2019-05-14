<?php

namespace App\Http\Controllers;

use App\Model\LRUCache;
use App\Model\LRUCacheBest;
use App\Model\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class TestController extends Controller
{
    public function test()
    {
        $a = $this->largestNumber([1, 2, 3, 4, 5, 10, 11, 12]);
        dd($a);
//        $arr = [1,2,3,4,5];
//        rsort($arr);

        die;
        $obj = new LRUCacheBest(2);
        $obj->put(1, 1);
        $obj->put(2, 2);
        echo $obj->get(1) . PHP_EOL;
        $obj->put(3, 3);
        echo $obj->get(2) . PHP_EOL;

        $obj->put(4, 4);


        echo $obj->get(1) . PHP_EOL;


        echo $obj->get(3) . PHP_EOL;
        echo $obj->get(4) . PHP_EOL;
    }

    /**
     * @param Integer[] $nums
     * @return String
     */
    function largestNumber($nums)
    {
        $ct = count($nums);
        for ($i = 0; $i < $ct - 1; $i++) {

            for ($j = 0; $j < $ct - $i - 1; $j++) {

                if (ord($nums[$j]) < ord($nums[$j + 1])) {

                    $tmp          = $nums[$j];
                    $nums[$j]     = $nums[$j + 1];
                    $nums[$j + 1] = $tmp;
                }
            }
        }

        return implode($nums);
    }

    function st($arr, $num)
    {
        $ct_arr = count($arr);

        if ($ct_arr == 0) {
            return [$num];
        }

        if ($ct_arr == 1) {
            if ($ct_arr[0] < $num) {
                $tmp       = $ct_arr[0];
                $ct_arr[0] = $num;
                $ct_arr[1] = $tmp;
            }
        }

        for ($i = 0; $i < $ct_arr - 1; $i++) {
            if ($arr[$i] > $num && $arr[$i + 1] < $num) {
                $tmp            = $ct_arr[$i];
                $ct_arr[$i]     = $num;
                $ct_arr[$i + 1] = $tmp;
            }
        }
    }

    public static function http_post_data($url, $data, $time_out = 1)
    {
        Log::info('请求url======' . $url);

        if (is_array($data)) {
            Log::info('请求参数=====' . json_encode($data));
        } else {
            Log::info('请求参数=====' . $data);
        }

        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSLVERSION, 1);

        //若超时时间=1，设置毫秒级超时
        if ($time_out == 1) {
            curl_setopt($ch, CURLOPT_NOSIGNAL, true);  //支持毫秒级别
            curl_setopt($ch, CURLOPT_TIMEOUT_MS, 1);  //1000毫秒超时，超时间过短会导致，请求失败
        } else {
            curl_setopt($ch, CURLOPT_TIMEOUT, $time_out);
        }

        ob_start();
        curl_exec($ch);
        $result = ob_get_contents();

        if ($time_out != 1) {
            Log::info('http返回码=====' . curl_getinfo($ch, CURLINFO_HTTP_CODE));
            Log::info('返回结果===' . $result);
        } else {
            Log::info('不需要返回值的请求');
        }

        if (curl_errno($ch)) {
            Log::info('Curl error: ' . curl_error($ch));
        }

        ob_end_clean();
        curl_close($ch);

        return $result;
    }


}

