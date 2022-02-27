<?php
    namespace admin;
    class Category extends Admin{
        function index(){

            

            $this->assign('name','cjs');

            $this->display("category/index");
        }

        function add_category(){

            // print_r($_POST);
            print_r($_FILES);
            $brand = [];
            $brand["brand_name"]=$_POST["brand_name"];   

            rename($_FILES["brand_logo"]["tmp_name"],$_FILES["brand_logo"]["name"]);
            
            $this->display("category/index");

        }
    }