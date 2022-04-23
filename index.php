<?php

    require('vendor/autoload.php');
    require('class/cattree.php');
    // require('app/controllers/admin/admin.php');
    use \NoahBuscher\Macaw\Macaw;

   
   //进入管理平台的首页面
    Macaw::get('/admin',"admin\Index@index");

    //进入产品管理页面
    Macaw::get('/admin/product','admin\Product@index');
    Macaw::any('/admin/add_goods','admin\Product@add_goods');
    // Macaw::any('/admin/model_goods/(:any)','admin\Product@model');

    Macaw::post('/admin/update_goods','admin\Product@update_goods');
    Macaw::get('/admin/product_show/(:num)','admin\Product@product_show');



    //进入品牌管理页面
    // Macaw::get('/admin/category','admin\Category@index');
    // Macaw::any('/admin/add_category','admin\Category@add_category');
    // Macaw::any('/admin/add_model/(:any)','admin\Category@add_model');
    Macaw::get('/admin/brand','admin\Brand@index');
    // 添加品牌
    Macaw::any('/admin/addbrand','admin\Brand@addbrand');
    // 删除品牌
    Macaw::get('/admin/delbrand/(:num)','admin\Brand@delbrand');
    //添加机型
    Macaw::post('/admin/addmodel/(:num)','admin\Brand@addmodel');
    // 删除机型
    Macaw::get('/admin/delmodel/(:num)','admin\Brand@delmodel');


    //进入新闻管理页面
    Macaw::get('/admin/news','admin\News@index');
    Macaw::any('/admin/add_news','admin\News@add_news');
    Macaw::post('/admin/up_news','admin\News@up_news');
    Macaw::get('/admin/del_news/(:num)','admin\News@del_news');


    //进入链接管理页面
    Macaw::get('/admin/links','admin\Links@index');
    Macaw::get('/admin/add_links','admin\Links@add_links');



    //进入后台登录界面
    Macaw::get('/login','admin\Login@index');

    
    //进入前台界面
    Macaw::get('/','home\Index@index');
    //本语句表示加载。
    Macaw::dispatch();