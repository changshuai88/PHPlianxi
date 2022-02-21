<?php
    namespace admin;
    class Category extends Admin{
        function index(){

            

            $this->assign('name','cjs');

            $this->display("category/index");
        }

        function add_category(){




            $this->display("category/add_category");

        }
    }