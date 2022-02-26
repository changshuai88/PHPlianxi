<?php
    namespace admin;
    class Index extends Admin{
        function index(){

            

            $this->assign('title','cjs');

            $this->display("index/index");
        }
    }