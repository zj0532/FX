<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/14 0014
 * Time: 14:41
 */

namespace app\www\controller;


use think\Controller;

class newsController extends Controller
{
    public function news(){
        $this->fetch('news');
    }

    public function newsInfo(){
        $this->fetch('newsInfo');
    }
}