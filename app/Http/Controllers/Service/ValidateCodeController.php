<?php
namespace App\Http\Controllers\Service;

use App\Tool\Validate;
use App\Tool\SMS\SendTemplateSMS;
use Illuminate\Http\Request;
use App\Http\Models\TempPhone;
use App\Tool\M3Result;

use App\Http\Controllers\Controller;

/**
 * Class ValidateCodeController
 * @package App\Http\Controllers\Service
 * 显示验证码
 */
class ValidateCodeController extends Controller
{
    /**
     * 显示验证码
     */
    public function create(request $request)
    {
    	$code = new Validate();
        $request->session()->put('validate_code', $code->getCode());//获取框架自带session验证码
    	return $code->doimg();
    }


//    发送手机短信验证码
     public function sendSMS(Request $request){
          $M3Result =  new M3Result();
         $phone = $request->input('phone','');
         if($phone == ''){
             $M3Result->status = 1;
             $M3Result->message = '手机号码不能为空';
             return $M3Result->toJson();
         }

         if(strlen($phone) !=11 || $phone[0] !=1){
             $M3Result->status = 2;
             $M3Result->message = '手机号码格式不正确1111111111';
             return $M3Result->toJson();
         }
         $SendTemplateSMS =  new SendTemplateSMS();
         //sendTemplateSMS("18576437523", array(1234, 5), 1);
         $code = '';
         $charset  ='123456789';
         $_len = strlen($charset) - 1;
         for ($i = 0;$i < 6;++$i) {
             $code .= $charset[mt_rand(0, $_len)];
         }
         $M3Result = $SendTemplateSMS->sendTemplateSMS($phone,array($code,60),1);
         if($M3Result->status == 0){
             //         保存数据到临时表
//             查询手机号码是否存在
             $TempPhone = TempPhone::where('phone',$phone)->first();
             if($TempPhone == null){
                 $TempPhone = new TempPhone;
             }
             $TempPhone->phone = $phone;
             $TempPhone->code = $code;
             $TempPhone->deadline = time() + 60*60;
             $TempPhone->save();
         }
         return $M3Result->toJson();
     }





}
