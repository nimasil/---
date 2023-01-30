<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------



Route::get('admin/login', 'admin/login/login');
Route::get('admin/index', 'admin/index/index');
Route::post('admin/userlogin', 'admin/login/userlogin');

Route::post('User/UserUpdate', 'admin/Users/UserUpdate');
Route::get('User/UserList', 'admin/Users/UserList');
Route::post('User/UserAdd', 'admin/Users/UserAdd');
Route::get('User/UserDelete', 'admin/Users/UserDelete');

Route::post('Backups/BackupsAdd', 'index/Backups/BackupsAdd');
Route::post('Backups/BackupsLog', 'index/Backups/BackupsLog');
Route::get('Backups/BackupsList', 'index/Backups/BackupsList');
Route::post('Backups/BackupsUpdate', 'index/Backups/BackupsUpdate');
Route::get('Backups/BackupsDelete', 'index/Backups/BackupsDelete');
Route::get('Backups/BackupsLogList', 'index/Backups/BackupsLogList');
Route::get('Backups/LogDelete', 'index/Backups/LogDelete');
Route::get('Backups/DayLog', 'index/Backups/DayLog');



