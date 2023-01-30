<?php
namespace app\admin\controller;
use  think\Controller;
use  think\Db;
use think\facade\Cache;
use think\facade\Request;
class Base extends Controller
{
    public function initialize(){
        $username = session("admin_username");
        if(!$username){
            header('location:/admin/login');
            exit;
        }
    }
}