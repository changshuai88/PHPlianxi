<?php
    namespace admin;
    class Index extends Admin{
        function index(){

            

            $this->assign('name','cjs');

            $this->display("index/index");
        }
    }