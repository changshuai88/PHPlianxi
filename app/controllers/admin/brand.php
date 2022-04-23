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
        $title = "品牌管理";
        // print_r($_POST);
        $db = new BaseDao();
        $db->query("set names utf8");
        //如果上传了品牌就向数据库增加一条
        if(@$_POST["name"]){
            $name = $_POST["name"];
            $brands = $db->insert("model",["pid"=>0,"name"=>$name,"ord"=>0]);
        }else{
            $_POST["name"] = "";
        }         
        //读取数据中的品牌
        $brands = $db->select("model",['name','id'],['pid'=>0]);
        // 为品牌增加品牌下的机型数量
        foreach($brands as $key=>$brand){
            $count = $db->count("model",["pid"=>$brand['id']]);
            $brands[$key]["count"]=$count;
        }    

        $this->assign('title',$title);
        $this->assign('brands',$brands);

        $this->display("brand/addbrand");
    }

}