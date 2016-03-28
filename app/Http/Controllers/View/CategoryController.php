<?php
namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Http\Models\Category;
use Log;

/**
 * Class MemberController
 * @package App\Http\Controllers\View
 *
 */
class CategoryController extends Controller
{
    //显示注册表单
    public function toCategory()
    {
        Log::info('产品类别');
//             获取所有的顶级分类
        $categorys = Category::where('parent_id', '0')->get();
//        return $categorys;die;
        return view('index.category')->with('categorys', $categorys);
    }

}
