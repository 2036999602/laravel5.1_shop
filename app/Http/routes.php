<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// 默认显示首页
Route::get('/', function () {
//  return app_path();//绝对路径的指向app目录下面
//    return url();//当前域名地址
//    private/var/www/laravel5/app/Http
//    echo __DIR__;
    return view('index.login');
});
//视图层显示
    Route::get('/register','View\MemberController@toRegister');//显示注册表单
    Route::get('/login','View\MemberController@toLogin');//显示登录表单
    Route::get('/category','View\CategoryController@toCategory');//产品类别显示
    Route::get('/product/category_id/{category_id}','View\ProductController@toProduct');//产品列表显示
    Route::get('/product/{produoct_id}','View\ProductController@Product');//产品列表显示
    Route::get('/test','TestController@index');//测试数据
//服务层显示
////显示验证码
Route::group(['prefix' => 'service'], function () {
    Route::get('/validate/code','Service\ValidateCodeController@create');//邮箱验证码
    Route::post('/validate/sendsms','Service\ValidateCodeController@sendSMS');//手机验证码逻辑
    Route::get('/validate_email','Service\MemberController@validateEmail');//邮箱激活状态修改为1
    Route::post('/register','Service\MemberController@register');//注册逻辑
    Route::post('/login','Service\MemberController@login');//登录逻辑
    Route::get('/category/parent_id/{parent_id}','Service\CategoryController@getCategory');//登录逻辑
});


Route::group(['prefix' => 'admin'], function () {

    Route::group(['prefix' => 'service'], function () {
        Route::post('category/add','Admin\CategoryController@add');
        Route::post('category/del','Admin\CategoryController@del');
        Route::post('category/edit','Admin\CategoryController@edit');

    });

    Route::get('index','Admin\IndexController@index');
    Route::get('category/index','Admin\CategoryController@cate_index');
    Route::get('category/add','Admin\CategoryController@cate_add');
    Route::get('category/edit','Admin\CategoryController@cate_edit');



});











