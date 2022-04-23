<?php
    namespace admin;
    use models\basedao;

    class Product extends Admin{

        function index(){
            $db = new BaseDao();
            $db->query("set names utf8");

            $goods = $db->select("goods",["id","name","partno","price",'weight','date','bid','mid']);
            
            $title = "产品管理";
            $this->assign('title',$title);
            $this->assign('goods',$goods);

            // $this->assign('name','cjs');



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
            $title = "产品管理";
            $this->assign('title',$title);
            $this->assign('brands',$newarr);
            $this->display("product/add_goods");
        }

        function update_goods(){
            $db = new BaseDao();
            $db->query("set names utf8");
            
            // print_r($_POST);
            $name = @$_POST["goods_name"];
            $partno = @$_POST["goods_num"];
            $price = @$_POST["goods_pri"];
            $weight =@$_POST["goods_weight"];
            $date = @$_POST["goods_addtime"];
            $bid= @$_POST["goods_bid"];
            $mid = @$_POST["goods_mid"];
            $note = @$_POST["note"];

        
            $imageName = $_POST["goods_name"].$_POST["goods_num"];
            // print_r($imageName);
            $imageurl = upload('image',"uploads/goods",$imageName);

            // print_r($imageurl);
            // $upfile = $_FILES;
            // print_r($_FILES);
            // $goods = [];
           
            // 向数据库添加数据
            if($db->insert('goods',[
                'name'=>$name,
                'partno'=>$partno,
                'price'=>$price,
                'weight'=>$weight,
                'date'=>$date,
                'bid'=>$bid,
                'mid'=>$mid,
                'note'=>$note,
                'image'=>$imageurl
                ])){
                // echo $imageurl;
                $this->success("add_goods","添加成功");
            }else{
                $this->error("add_goods","添加失败");
            }

            // $brand = $update->select("brand",["id","name"]);
            // $model = $update->select("model",["pid","name"]);       

            // $this->assign('model',$model);
            // $this->assign('brand',$brand);
            // $this->display("product/product");

        }


        function product_show($id){



            
            $this->display("product/productshow");

        }



       
    }