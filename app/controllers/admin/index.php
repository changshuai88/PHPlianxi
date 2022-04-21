<?php
    namespace admin;
    class Index extends Admin{
        function index(){

            
            $title = "页面管理";
            $this->assign('title',$title);
            // $this->assign('title','cjs');

            $this->display("index/index");
        }
    }