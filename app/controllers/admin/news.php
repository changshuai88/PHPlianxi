<?php
    namespace admin;
    class News extends Admin{
        function index(){

            
            $title = "新闻管理";
            $this->assign('title',$title);
            $this->assign('name','cjs');

            $this->display("news/news");
        }

        function add_news(){




            $this->display("news/add_news");

        }
    }