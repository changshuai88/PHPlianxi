<?php
namespace home;

class Product extends Home{
    function index(){

        
        $this->assign('title','产品中心');
        $this->display("product/product");

    }
}