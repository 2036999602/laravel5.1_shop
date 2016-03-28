<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;


class MailController extends Controller
{

    public function send()
    {
        $name = '学院君';
        $flag = Mail::send('test_email',['name'=>$name],function($message){
            $to = '1072155122@qq.com';
            $message ->to($to)->subject('测试邮件');
        });
        if($flag){
            echo '发送邮件成功，请查收！';
        }else{
            echo '发送邮件失败，请重试！';
        }
    }


}
