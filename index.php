<?php
require('vendor/autoload.php');
// require('app/controllers/admin/admin.php');
use NoahBuscher\Macaw\Macaw;

// echo "this is a test";
Macaw::get("/",function(){
    echo "1111111111111111111";
});

Macaw::get("/admin","admin\Demo@index");
Macaw::get("/add","admin\Demo@add");


Macaw::dispatch();