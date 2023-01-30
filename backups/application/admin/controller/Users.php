<?php
namespace app\admin\controller;


use think\Controller;
use think\Db;
use think\facade\Cache;
use think\Session;
use think\facade\Request;

class Users extends Controller
{
   
    public function UserUpdate(){
        try { 
            $id = Request::post('id');
            $username = Request::post('data');
            $res = Db::table("user")->where(['id'=>$id])->update(['username'=>$username]);
            if($res){
                return resMsg(200,"添加成功");
            }
            return resMsg(400,"添加失败");
        } catch (\Exception $e) {  
            return resMsg(400,"系统错误");
        }
    }
    public function UserList(){
        $data = Db::table("user")->select();
        return resMsg(200,"success",$data);
    }
    public function UserAdd(){
        try { 
            $username = Request::post('data');
            $res = Db::table("user")->insert(['username'=>$username]);
            if($res){
                return resMsg(200,"添加成功");
            }
            return resMsg(400,"添加失败");
        } catch (\Exception $e) {  
            return resMsg(400,"系统错误");
        }
    }
    public function UserDelete(){
        try { 
            $id = Request::get('id');
            $res = Db::table("user")->delete(['id'=>$id]);
            if($res){
                return resMsg(200,"删除成功");
            }
            return resMsg(400,"删除失败");
        } catch (\Exception $e) {  
            return resMsg(400,"系统错误");
        }
    }
}
