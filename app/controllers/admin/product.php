<?php
    namespace admin;
    class Product extends Admin{
        function index(){

            

            $this->assign('name','cjs');

            $this->display("product/product");
        }

        function add_goods(){




            $this->display("product/add_goods");

        }
    }