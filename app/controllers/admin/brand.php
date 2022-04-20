<?php
namespace admin;
use models\basedao;
class Brand extends Admin{

    function index(){
        $db = new BaseDao();
        // 获取数据库中数据，$brands
        $brands = $db->select("model",["pid","name","id","ord"]);
        //遍历$btands,生成二维数组。$newarr
        print_r($brands);
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

}