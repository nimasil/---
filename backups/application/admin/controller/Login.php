<?php
namespace app\admin\controller;


use think\Controller;
use think\Db;
use think\facade\Cache;
use think\Session;
use think\facade\Request;

class Login extends Controller
{
   
    public function login(){
       return $this->fetch('users/login');
    }
      /**后台登录*/
    public function userlogin(){
        try { 
            $username = Request::post('username');
            $password = Request::post('password');
            $res = Db::table("admin_user")->where(['username'=>$username,'password'=>md5($password)])->find();
            if(!empty($res)){
                session("admin_username",$username);
                return resMsg(200,"登陆成功");
            }else{
                return resMsg(400,"用户名或密码错误"); 
            }
        } catch (\Exception $e) {  
            return resMsg(400,"系统错误");
        }
    }

    /**后台注销登陆*/
    public function Nologin(){
        session("admin_username",null);
        header('location:/admin/login');
        exit;
    }
}
