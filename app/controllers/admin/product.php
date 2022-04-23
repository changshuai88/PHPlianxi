<?php
    namespace admin;
    use models\basedao;

    class Product extends Admin{

        function index(){

            
            $title = "产品管理";
            $this->assign('title',$title);
            $this->assign('name','cjs');

            $this->display("product/product");
        }

      /*   function model($a){

            $update = new BaseDao();
            // print_r($_POST);

            $model = $update->select("model",["id","pid","name"],['pid' => $a]);
            $this->assign('models',$model);
            // $this->display("product/add_goods");

        } */

        function add_goods(){
            $db = new BaseDao();
            $db->query("set names utf8");

            $brands = $db->select("model",["pid","name","id","ord"]);

            //遍历$btands,生成二维数组。$newarr       
            foreach($brands as $k => $v){
                if($v['pid']== 0){
                    $newarr[$v['id']]= $v; 
                }elseif(isset($brands[$v["pid"]])){
                    $newarr[$v['pid']]['son'][] = $v;
                }
            }
            
            print_r($_POST);

            $title = "产品管理";
            $this->assign('title',$title);
            $this->assign('brands',$newarr);
            $this->display("product/add_goods");

        }

        function update_goods(){
            $update = new BaseDao();
            // print_r($_POST);
            // print_r($_FILES);
            $upfile = $_FILES;
            $goods = [];
            $goods["brand_name"]=$_POST["brand_name"];            
            $goods["path"] =  upload("brand_logo",'uploads',$goods["brand_name"]);
            //向数据库添加数据
            if($update->insert('brand',['name'=>$goods["brand_name"],'logo'=>$goods["path"]])){
                $this->success("category","添加成功");
            }else{
                $this->error("category","添加失败");
            }

            $brand = $update->select("brand",["id","name"]);
            $model = $update->select("model",["pid","name"]);       

            $this->assign('model',$model);
            $this->assign('brand',$brand);
            $this->display("product/product");

        }



       
    }