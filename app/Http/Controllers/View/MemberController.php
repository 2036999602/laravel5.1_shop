<?php
namespace App\Http\Controllers\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;

/**
 * Class MemberController
 * @package App\Http\Controllers\View
 * 会员中心
 * 注册
 * 登录
 */
class MemberController extends Controller
{
        //显示注册表单
         public function toRegister(){
//             /private/var/www/laravel5/app
//             echo app_path();die;
            return view('index.register');
        }

          // 显示登录表单
          public function toLogin(){
               return view('index.login');
          }







}
