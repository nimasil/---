<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\facade\Request;

/**
 * 设备类
 */
class Backups extends Controller 
{


    

    /**
     *设备备份记录
     */
    public function BackupsAdd(){
        try { 
            $data = Request::post('data');
            $res = Db::table("device_list")->insert($data);
            if($res){
                return resMsg(200,"添加成功");
            }
            return resMsg(400,"添加失败");
        } catch (\Exception $e) {  
            return resMsg(400,"系统错误");
        }

    }

    /**
     * 设备备份记录查询
     */
    public function BackupsList(){
        try { 
            
            $where = Request::get('where');
            if(!empty($where)){
                $res = Db::table("device_list")->where(['status'=>1])
                ->where("device_name like '%{$where}%' or system_code like '%{$where}%' or
                system_name like '%{$where}%' or device_code like '%{$where}%' or software_code like '%{$where}%'
                ")
                ->order("id desc")->select();
            }else{
                $res = Db::table("device_list")->where(['status'=>1])->order("id desc")->select();
            }
            return resMsg(200,"success",$res);
        } catch (\Exception $e) {  
            return resMsg(400,"系统错误");
        }

    }

    
    /**
     * 删除
     */
    public function BackupsDelete(){

        try { 
            $id = Request::get('id');
            $result = Db::table("device_log")->where(['d_id'=>$id])->find();
            if(!empty($result)){
                return resMsg(400,"已经有备份记录不能删除");
            }else{
                $res = Db::table("device_list")->where(['id'=>$id])->update(['status'=>0]);
                if($res){
                    return resMsg(200,"删除成功");
                }
            }
            
            return resMsg(400,"删除失败");
        } catch (\Exception $e) {  
            return resMsg(400,"系统错误");
        }
    }

    
    /**
     * 修改
     */
    public function BackupsUpdate(){

         try { 
            $data = Request::post('data');
            $id = Request::post('id');
            $res = Db::table("device_list")->where(['id'=>$id])->update($data);
            if($res){
                return resMsg(200,"编辑成功");
            }
            return resMsg(400,"编辑失败");
        } catch (\Exception $e) {  
            return resMsg(400,"系统错误");
        }
    }
    

    /**
     * 备份记录
     */
    public function BackupsLog(){
        try { 
            $data = Request::post('data');
            session("username","钟礼超");
            $res = Db::table("device_log")->insert([
                'd_id'=>$data['d_id'],
                'type'=>$data['type'],
                'staus'=>$data['staus'],
                'start_time'=>$data['time'][0],
                'end_time'=>$data['time'][1],
                'username'=>$data['username'],
                'file_url'=>$data['file_url'],
                'text'=>$data['text']
            ]);
            if($res){
                return resMsg(200,"添加成功");
            }
            return resMsg(400,"添加失败");
        } catch (\Exception $e) {  
            return resMsg(400,"系统错误");
        }
    }

    /**
     * 备份记录查询
     */
    public function BackupsLogList(){
        try { 
            $id = Request::get('id');
            $res = Db::table("device_log")->where(['d_id'=>$id])->order("id desc")->select();
            return resMsg(200,"success",$res);
        } catch (\Exception $e) {  
            return resMsg(400,"系统错误");
        }
    }

    /**
     * 删除备份记录
     */
    public function LogDelete(){
        try { 
            $id = Request::get('id');
            $res = Db::table("device_log")->where(['id'=>$id,'username'=>session("username")])->delete();
            if($res){
                return resMsg(200,"删除成功");
            }
            return resMsg(400,"删除失败");
        } catch (\Exception $e) {  
            return resMsg(400,"系统错误");
        }
    }
  
    /**
     * 查询每日备份记录信息展示
     */

     public function DayLog(){
        try { 
            $id = Request::get('id');
            $data = Db::table("device_log")->where(['d_id'=>$id])->select();
               $result = [];
               foreach($data as $v){
                $start_time = strtotime($v['start_time']);
                $end_time = strtotime($v['end_time']);
                $datediff = $end_time - $start_time;
                $days = round($datediff / (60 * 60 * 24));
                for($i=0;$i<=$days;$i++){
                    $result[] = date('Y-m-d',strtotime("{$v['start_time']}".'+'.$i.'day'));
                }
               }
               return resMsg(200,"success",$result);
        } catch (\Exception $e) {  
            return resMsg(400,"系统错误");
        }
              
     }
    
}
