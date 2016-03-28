<?php
namespace App\Http\Controllers\Service;


use App\Http\Controllers\Controller;

use App\Tool\M3Result;
use App\Http\Models\Category;
use Log;



/**
 * Class ValidateCodeController
 * @package App\Http\Controllers\Service
 * 显示验证码
 */
class CategoryController extends Controller
{
    public function getCategory($parent_id){
        Log::info('产品类别处理');
        $categorys = Category::where('parent_id',$parent_id)->get();
//        return $categorys;die;
        $M3Result = new M3Result();
        $M3Result->status = 0;
        $M3Result->message = '返回成功';
        $M3Result->categorys = $categorys;
        return $M3Result->toJson();
    }






}
