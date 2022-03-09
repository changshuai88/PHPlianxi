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
            // $this->assign("url",$url);
            $model = new BaseDao();
            $pid = $id;
            $name = $_POST["model_name"];
            // // print_r($pid);
            // print_r($url);
            // if($model->insert("model",['name'=>$_POST["model_name"],"pid"=>$id])){
                // $this->success("category","添加成功");
            // }else{
            //     $this->error("category","添加失败");
            // }
            if($name!=""){
            $model->insert("model",['name'=>$name,"pid"=>$pid]);
                echo "<script>";            
                echo "alert('添加成功！');";
                //由于定义的成功方法不能跳转，直接使用JS赋值给location.href进行跳转
                echo "location.href='http://lianxi.com/admin/category';";           
                echo "</script>";
            }else{
                echo "<script>";            
                echo "alert('添加机型不能为空！');";
                //由于定义的成功方法不能跳转，直接使用JS赋值给location.href进行跳转
                echo "location.href='http://lianxi.com/admin/category';";           
                echo "</script>";
            }
            $this->display("category/index");
        }
        

    }