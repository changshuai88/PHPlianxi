<?php

    require('vendor/autoload.php');
    // require('app/controllers/admin/admin.php');
    use \NoahBuscher\Macaw\Macaw;

    // echo "this is a test";
    Macaw::get("/",function(){
        echo "1111111111111111122";
    });

    Macaw::get("/admin","admin\Admin@index");

    Macaw::get("/home","home\Test@index");

    Macaw::get("/hello/(:num)",function($num){
        echo "aaaaaaa".$num;
    });

    //本语句表示加载。
    Macaw::dispatch();