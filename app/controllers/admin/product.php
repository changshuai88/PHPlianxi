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
            $update = new BaseDao();

            

            $brand = $update->select("brand",["id","name"]);
            // print_r($_POST);
            // print_r($brand[0]);
            // print_r($model);

            $this->assign('brands',$brand);

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