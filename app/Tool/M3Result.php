<?php

namespace App\Tool;

/**
 * Class M3Result
 * @package App\Tool
 * 信息的返回
 */
class M3Result
{
    public $status;//状态
    public $message;//信息

    /**
     * @return mixed
     * 对象转成json字符串
     */
    public function toJson()
    {
        return json_encode($this,JSON_UNESCAPED_UNICODE);

    }

}
