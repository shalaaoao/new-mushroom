<?php
/**
 * Created by PhpStorm.
 * User: Chen Jiaao
 * Date: 2019-05-06
 * Time: 16:25
 */

namespace App\Model;

class LRUCache {

    public $list = [];
    private $capacity = 0;

    /**
     * @param Integer $capacity
     */
    function __construct($capacity) {
        //$this->list = range(1, $capacity);
        $this->capacity = $capacity;
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        if (!isset($this->list[$key])) {
            return -1;
        }

        $val = $this->list[$key];

        // 获取值并将key移动到arr最后
        unset($this->list[$key]);
        $this->list[$key] = $val;

        return $val;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {

        // 判断是否存在
        if (isset($this->list[$key])) {
            unset($this->list[$key]);
        }

        // 判断数组长度
        if (count($this->list) >= $this->capacity) {

            // 删除数组第一个元素
            $this->list = array_slice($this->list,1, null, true);
        }

        $this->list[$key] = $value;
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */
