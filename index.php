<?php

    require('vendor/autoload.php');
    // require('app/controllers/admin/admin.php');
    use \NoahBuscher\Macaw\Macaw;

   
   //进入管理平台的首页面
    Macaw::get('/admin',"admin\Index@index");

    //进入产品管理页面
    Macaw::get('/admin/product','admin\Product@index');
    Macaw::get('/admin/add_goods','admin\Product@add_goods');

    //进入品牌管理页面
    Macaw::get('/admin/category','admin\Category@index');
    Macaw::get('/admin/add_category','admin\Category@add_category');

    //进入新闻管理页面
    Macaw::get('/admin/news','admin\News@index');
    Macaw::get('/admin/add_news','admin\News@add_news');


    //进入后台登录界面
    Macaw::get('/admin/login','admin\Login@index');

    //本语句表示加载。
    Macaw::dispatch();