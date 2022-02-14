<?php

    require('vendor/autoload.php');
    // require('app/controllers/admin/admin.php');
    use \NoahBuscher\Macaw\Macaw;

   
   //进入管理平台的首页面
    Macaw::get('/admin',"admin\Index@index");

    //进入后台登录界面
    Macaw::get('/login','admin\Login@index');

    //本语句表示加载。
    Macaw::dispatch();