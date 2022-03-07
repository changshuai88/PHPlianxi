<?php
    namespace admin;
    use models\basedao;

    class Category extends Admin{

        function index(){
            $db = new BaseDao();

            $data = $db->select("brand",["id","name","logo"]);
            $brand = $db->select("model",["pid","name"]);         
            
            $this->assign('data',$data);
            $this->assign('brand',$brand);


            $this->display("category/index");
        }

        function add_category(){
            //链接数据库
            $shangchuan = new BaseDao();
            // print_r($_POST);
            // print_r($_FILES);
            $upfile = $_FILES;
            $brand = [];
            $brand["brand_name"]=$_POST["brand_name"]; 
            
            $brand["path"] =  upload("brand_logo",'uploads',$brand["brand_name"]);
            //向数据库添加数据
            if($shangchuan->insert('brand',['name'=>$brand["brand_name"],'logo'=>$brand["path"]])){
                $this->success("category","添加成功");
            }else{
                $this->error("category","添加失败");
            }
            // print_r($brand);
            $this->display("category/index");

        }

        function add_model($id){
            $model = new BaseDao();
            $pid = $id;
            $name = $_POST["model_name"];
            print_r($pid);

            if($model->insert("model",['name'=>$name,"pid"=>$pid])){
                $this->sunccess("category","添加成功");
            }else{
                $this->error("category","添加失败");
            }

            $this->display("category/index");
        }
        

    }