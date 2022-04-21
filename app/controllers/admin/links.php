<?php
    namespace admin;
    class Links extends Admin{
        function index(){

            
            $title = "友情链接";
            $this->assign('title',$title);
            $this->assign('name','cjs');

            $this->display("links/links");
        }

        function add_links(){




            $this->display("links/add_links");

        }
    }