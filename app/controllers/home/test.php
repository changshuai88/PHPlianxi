<?php
namespace home;

class Test extends Home{
    function index(){
        $this->assign('title','床前明月光');
        $this->display('test/index');
    }
}