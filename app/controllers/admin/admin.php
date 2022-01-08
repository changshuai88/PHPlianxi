<?php
namespace admin;
use controllers\BaseControllers;

class Demo extends BaseControllers{
    function index(){
        echo "index.......";
        $this->success('/home',"成功");
    }

    function add(){
        echo "add....";
        $this->error('/home/add',"失败");
    }
}