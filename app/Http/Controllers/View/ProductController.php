<?php
namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Http\Models\Product;
use App\Http\Models\PdtContent;
use App\Http\Models\Pdtimages;

/**
 * Class MemberController
 * @package App\Http\Controllers\View
 *
 */
class ProductController extends Controller
{
    //显示注册表单
    public function toProduct($category_id)
    {
//             获取所有的顶级分类
        $products = Product::where('category_id',$category_id)->get();
//        return $products;die;
        return view('index.product')->with('products',$products);
    }


           // 显示产品详情
       public function product($product_id){
           $product = Product::find($product_id);//显示产品详情
           $pdtContent = PdtContent::where('product_id',$product_id)->first();//显示产品内容
           $pdt_images = Pdtimages::where('product_id',$product_id)->get();//显示产品图片
//           return $pdtimages;die;
           return view('index.pdt_content')->with('product',$product)
                                           ->with('pdtContent',$pdtContent)
                                           ->with('pdt_images',$pdt_images);

       }










}
