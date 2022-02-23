<?php
    namespace admin;
    class News extends Admin{
        function index(){

            

            $this->assign('name','cjs');

            $this->display("news/news");
        }

        function add_news(){




            $this->display("news/add_news");

        }
    }