<?php
namespace admin;
use models\basedao;
class Brand extends Admin{

    function index(){
        $db = new BaseDao();
      
        // 获取数据库中数据，$brands
        // 没有这句代码会从数据库返回的中文是？
        $db->query("set names utf8");
        $brands = $db->select("model",["pid","name","id","ord"]);

        //遍历$btands,生成二维数组。$newarr       
        foreach($brands as $k => $v){
            if($v['pid']== 0){
                $newarr[$v['id']]= $v; 
            }elseif(isset($brands[$v["pid"]])){
                $v["count"]=$db->count("goods",['mid'=>$v['name']]);
                $newarr[$v['pid']]['son'][] = $v;
            }
        }
        // 获取品牌中机型的个数
        foreach($newarr as $k=> $v){
            $newarr[$k]['count'] = count($v['son']);
        }

        // print_r($newarr);
        $title = "品牌管理";
        $this->assign('title',$title);
        $this->assign('brands',$newarr);
        $this->display("brand/index");
    }
    // 添加品牌
    function addbrand(){
        $title = "品牌管理";
        
        $db = new BaseDao();
        $db->query("set names utf8");
        //如果上传了品牌就向数据库增加一条
        if(@$_POST["name"]){
            $name = $_POST["name"];
            $brands = $db->insert("model",["pid"=>0,"name"=>$name,"ord"=>0]);
            echo "<script>";
            echo "alert('添加成功');";
            echo "</script>";
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
    // 删除品牌
    function delbrand($id){
        $title = "品牌管理";
        
        $db = new BaseDao();
        $db->query("set names utf8");
        // 判断本品牌下是否含有机型
        $product = $db->select("model",['name'],['pid'=>$id]);
        if($product){
            echo "<script>";
            echo "alert('ERROR:{'本品牌下有机型不能删除'}');";
            echo "</script>";
        }else{
            $db->delete('model',['id'=>$id]);
            // success('brand/addbrand','删除成功');
            echo "<script>";
            echo "alert('删除成功');";
            echo "</script>";
        };         
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

    // 添加机型
    function addmodel($id){
        $db = new BaseDao();
        $db->query("set names utf8");

        if(@$_POST["name"]){
            $name = $_POST["name"];
            $brands = $db->insert("model",["pid"=>$id,"name"=>$name,"ord"=>0]);

            $this->success("/admin/brand","添加成功！");
            // success('brand/index',"添加成功");
            // echo "<script>";
            // echo "alert('添加成功');";
            // //添加完毕后跳转到指定页面
            // echo "location.href='http://lianxi.com/admin/brand';";
            // echo "</script>";
        }else{
            $this->error("/admin/brand","您未添加任何东西！");
            // echo "<script>";
            // echo "alert('您未添加任何东西');";
            // //添加失败后跳转到指定页面
            // echo "location.href='http://lianxi.com/admin/brand';";
            // echo "</script>";
        }
        // $this->display("brand/index");
        

    }

    function delmodel($id){
        $db = new BaseDao();
        $db->query("set names utf8");

        $product = $db->select("product",["name"],["mid"=>$id]);
        if($product){
            $this->error("/admin/brand","本机型下有产品不能删除!");
            // echo "<script>";
            // echo "alert('ERROR:{'本机型下有产品不能删除'}');";
            // echo "location.href='http://lianxi.com/admin/brand';";
            // echo "</script>";
        }else{
            $db->delete('model',['id'=>$id]);
            $this->success("/admin/brand","删除成功!");
            // echo "<script>";
            // echo "alert('删除成功');";
            // echo "location.href='http://lianxi.com/admin/brand';";
            // echo "</script>";
        };  
    }

}