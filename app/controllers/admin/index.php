<?php
    namespace admin;
    class Index extends Admin{
        function index(){

            

            $this->assign('name','cjs');
            $this->assign('gj','https://img0.baidu.com/it/u=4241179165,3853519413&fm=253&fmt=auto&app=138&f=JPEG?w=741&h=500');

            $this->display("index/index");
        }
    }