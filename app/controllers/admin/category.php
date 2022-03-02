<?php
    namespace admin;
    class Category extends Admin{
        function index(){

            

            $this->assign('name','cjs');

            $this->display("category/index");
        }

        function add_category(){

            // print_r($_POST);
            // print_r($_FILES);
            $upfile = $_FILES;
            $brand = [];
            $brand["brand_name"]=$_POST["brand_name"]; 
            
            upload("brand_logo",'uploads',$brand["brand_name"]);
            
            
            $this->display("category/index");

        }
        

    }