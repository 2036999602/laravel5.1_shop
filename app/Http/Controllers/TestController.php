<?php

namespace App\Http\Controllers;


class TestController extends Controller
{

    public function index(){
        $test = '/laravel5/public/img/back.png';
        return view('test',compact('test'));

    }



}
