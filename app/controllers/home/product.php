<?php
namespace home;
use models\basedao;

class Product extends Home{
    function index(){

        $db = new BaseDao();
        $db->query("set names utf8");
        
        $goods = $db->select("goods",["id","name","partno","price",'weight','date','bid','mid']);

        $this->assign('title','产品中心');
        $this->display("product/product");

    }
}