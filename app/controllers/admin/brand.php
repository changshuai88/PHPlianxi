<?php
namespace admin;
use models\basedao;
class Brand extends Admin{

    function index(){
        $db = new BaseDao();
        // dd($db);
        // mysqli_query($db,"set names utf8");
        // 获取数据库中数据，$brands
        // 没有这句代码会从数据库返回的中文是？
        $db->query("set names utf8");
        $brands = $db->select("model",["pid","name","id","ord"]);

        //遍历$btands,生成二维数组。$newarr
        // print_r($brands);
        foreach($brands as $k => $v){
        if($v['pid']== 0){
            $newarr[$v['id']]= $v; 
        }elseif(isset($brands[$v["pid"]])){
            $newarr[$v['pid']]['son'][] = $v;
        }


        }
        // print_r($newarr);
        $title = "品牌管理";
        $this->assign('title',$title);

        $this->assign('brands',$newarr);
        $this->display("brand/index");
    }

    function addbrand(){
        print_r($_POST);

        
        // dd($db);
        // mysqli_query($db,"set names utf8");
        // 获取数据库中数据，$brands
        // 没有这句代码会从数据库返回的中文是？
        $db->query("set names utf8");
        $brands = $db->select("model",["pid","name","id","ord"]);


        $this->display("brand/index");
    }

}