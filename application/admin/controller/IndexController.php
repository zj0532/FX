<?php
// 用户后台控制器
// User: tianyu
// Date: 18/3/28
// Time: 下午6:48
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;

class IndexController extends Controller
{
  //判断SESSION过期时间，30分钟过期
  function session_end()
  {
     $st=config('SESSION_OPTIONS');
	 $bb=time() - session('session_start_time');
	 $cc=$st['expire'];
	  //判断会话是否过期
      if ($bb>=$cc) {
        session_destroy();//真正的销毁在这里！
         return redirect('/admcncp/login');
     }
	 else
	 {
		 //如果有操作，则记录最新时间，这个是为了有操作时，不退出，按最后一次操作的时间来计算，没有操作过30分钟则退出登陆
		 session('session_start_time', time());
	 }
	  
  }
  //管理员列表页面
  public function get_index()
  {
	  //判断过期时间
	  $this->session_end();
	  //判断登陆状态
      if (!session('?admin_dengluming')) {
          return redirect('/admcncp/login');
      }
	 
	  if(session('admin_leixing')==2)
	  {
			return redirect('/admcncp/shanghu/1');  
			exit();
	  }
	  if(session('admin_leixing')==3)
	  {
			return redirect('/admcncp/zhangdan/1/-1/0/0/0/0');  
			exit();
	  }
      $j["sidebar"] = 1; 
	  $sql="SELECT * FROM base_admin order by adm_id asc";
	  $j['list']=Db::query($sql);
	  //return print_r(session(''));
	  //return print_r($j);
      return view('index',$j);
  }
  //用户新增 页面
  public function get_index_add()
  {
	  //判断过期时间
	  $this->session_end();
	  //判断登陆状态
      if (!session('?admin_dengluming')) {
          return redirect('/admcncp/login');
      }
      $j["sidebar"] = 1; 
      return view('index_add',$j);
  }
  //用户新增提交处理 
  public function post_index_add()
  {
	  //判断过期时间
	  $this->session_end();
	  //判断登陆状态
      if (!session('?admin_dengluming')) {
          return redirect('/admcncp/login');
      }
	  $data = input('post.');//通过助手将POST所有数据交给 data
	  
	  
	$validate = validate('IndexController');//实例化 验证器
	if (!$validate->check($data)) {
		$err_id = $validate->getError();
		return show($err_id, $validate->get_message($err_id), [], 200);
	}
	  
	  
	  //Db::execute('insert into think_user (id, name) values (:id, :name)',['id'=>8,'name'=>'thinkphp']);
	  $sql="insert into base_admin (dengluming,mima,xingming,leixing,zhuangtai) VALUES (:dengluming,md5(:mima),:xingming,:leixing,:zhuangtai)";
	  Db::execute($sql,$data);
	  //print_r($data);
	  //print_r(input(''));
	  //$data = ['dengluming' => input('dengluming'), 'mima' => md5(input('mima')), 'xingming' => input('xingming'), 'leixing' => input('leixing'), 'zhuangtai' => input('zhuangtai')];
	  //Db::table('admin')->insert($data);

	  
      $j["sidebar"] = 1; 
	  $sql="SELECT * FROM base_admin order by adm_id asc";
	  $j['list']=Db::query($sql);
	  
      return view('index',$j);
  }
  //用户编辑页面
  public function get_index_edit()
  {
	  //判断过期时间
	  $this->session_end();
	  //判断登陆状态
      if (!session('?admin_dengluming')) {
          return redirect('/admcncp/login');
      }
      $j["sidebar"] = 1; 
	  $sql="SELECT * FROM base_admin where adm_id='".input('id')."'";
	  $result=Db::query($sql);
	  $j['userinfo']=$result[0];
      return view('index_edit',$j);
  }
  //用户编辑 提交 页面
  public function post_index_edit()
  {
	  //判断过期时间
	  $this->session_end();
	  //判断登陆状态
      if (!session('?admin_dengluming')) {
          return redirect('/admcncp/login');
      }
	  //print_r($_POST);
	  $data = input('post.');//通过助手将POST所有数据交给 data
	  
	$validate = validate('Index');//实例化 验证器
	if (!$validate->check($data)) {
		$err_id = $validate->getError();
		return show($err_id, $validate->get_message($err_id), [], 200);
	}
	  
	  
	  //$sql="update admin set dengluming=:dengluming,mima=md5(:mima),xingming=:xingming,leixing=:leixing,zhuangtai=:zhuangtai where adm_id=:id";
	  if($data['mima'])
	  {
	  	$sql="update base_admin set dengluming=:dengluming,mima=md5(:mima),xingming=:xingming,leixing=:leixing,zhuangtai=:zhuangtai where adm_id=:id";
		 Db::execute($sql,$data);
	  }
	  else
	  {
	  	$sql="update base_admin set dengluming='".$data['dengluming']."',xingming='".$data['xingming']."',leixing='".$data['leixing']."',zhuangtai='".$data['zhuangtai']."' where adm_id='".$data['id']."'";
		Db::execute($sql);
	  }
	  //echo $sql;
      $j["sidebar"] = 1; 
	  $sql="SELECT * FROM base_admin order by adm_id asc";
	  $j['list']=Db::query($sql);
	  //return print_r($j);
      return view('index',$j);
  }











}
