<?php
namespace home;
use models\basedao;

class Tool extends Home{
    function index(){

       
    $this->assign("title","小工具");
    $this->display("tool/index");
    
    }

    function phpinfo(){

    $phpinfo = phpinfo();
    $this->assign("phpinfo",$phpinfo);
    $this->display("tool/phpinfo");    
    }

}