<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\facade\Request;
use app\admin\controller\Base;

class Index extends Base 
{


    public function index()
    {
        return $this->fetch();
    }

 
}
