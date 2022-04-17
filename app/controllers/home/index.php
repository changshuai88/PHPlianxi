<?php
namespace home;

class Index extends Home{
    function index(){

            

        $this->assign('title','平地机配件网');

        $this->display("test/index");
    }
}