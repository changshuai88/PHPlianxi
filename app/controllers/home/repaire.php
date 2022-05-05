<?php
namespace home;

class Repaire extends Home{
    function index(){

        
        $this->assign('title','维修知识');
        $this->display("repaire/repaire");

    }
}