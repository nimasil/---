<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\facade\Request;

class Index extends Controller 
{


    /**
     * 设备设置首页
     */
    public function index()
    {
        $this->assign("username","钟礼超");
        return $this->fetch();
    }



 
    

}
