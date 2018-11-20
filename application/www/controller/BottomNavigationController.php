<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/20 0020
 * Time: 16:52
 */

namespace app\www\controller;


use think\Controller;
use think\Request;
use think\Log;

class BottomNavigationController extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
    }

    //众售规则
    public function public_sale_rules(){
        try{

        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('public_sale_rules');
    }
    //风险提示
    public  function risk_hints(){
        try{

        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('risk_hints');
    }
    //免责声明
    public function disclaimer(){
        try{

        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('disclaimer');
    }
    //挖矿智能合约
    public function intelligent_contract_for_mining(){
        try{

        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('intelligent_contract_for_mining');
    }
    //付费机制
    public function payment_mechanism(){
        try{

        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('payment_mechanism');
    }
    //NEO智能合约
    public function intelligent_contract(){
        try{

        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('intelligent_contract');
    }
    //FX架构
    public function framework(){
        try{

        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('framework');
    }
}