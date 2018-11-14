<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/14 0014
 * Time: 14:35
 */

namespace app\www\controller;


use think\Controller;

class applicationController extends Controller
{
    public function application(){
        $this->fetch('application');
    }
}