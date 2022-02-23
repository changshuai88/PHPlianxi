<?php

    require('vendor/autoload.php');
    // require('app/controllers/admin/admin.php');
    use \NoahBuscher\Macaw\Macaw;

   
   //进入管理平台的首页面
    Macaw::get('/admin',"admin\Index@index");

    //进入产品管理页面
    Macaw::get('/product','admin\Product@index');
    Macaw::get('/add_goods','admin\Product@add_goods');

    //进入品牌管理页面
    Macaw::get('/category','admin\Category@index');
    Macaw::get('/add_category','admin\Category@add_category');

    //进入新闻管理页面
    Macaw::get('/news','admin\News@index');
    Macaw::get('/add_news','admin\News@add_news');


    //进入后台登录界面
    Macaw::get('/login','admin\Login@index');

    //本语句表示加载。
    Macaw::dispatch();