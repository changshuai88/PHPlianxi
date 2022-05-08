<?php
namespace home;
use models\basedao;

class Product extends Home{
    function index(){

        $db = new BaseDao();
        $db->query("set names utf8");
        
        $goods = $db->select("goods","*",['ORDER'=>['id'=>'DESC'],'LIMIT'=>[0,8]]);
        // dd($goods);
        $this->assign('goods',$goods);
        $this->assign('title','产品中心');
        $this->display("product/product");

    }

    function good($id){

        $db = new BaseDao();
        $db->query("set names utf8");
        
        $good = $db->select("goods","*",["id"=>$id]);
        // dd($good);
        $this->assign('good',$good['0']);
        $this->assign('title','产品中心');
        $this->display("product/good");
        $good = $db->update("goods",['readtime[+]'=>1],['id'=>$id]);

    }

    function search(){
        
        $search = $_POST['search'];
        $db = new BaseDao();
        $db->query("set names utf8");
        
        $goods = $db->select("goods","*",['OR'=>["name"=>$search, "partno"=>$search],'ORDER'=>['id'=>'DESC'],'LIMIT'=>[0,8]]);
        if ($goods) {
            $this->assign('goods',$goods);
        }else{
            $this->error('/product',"您查找的件号或者品名没有收录");

        }
        // $this->assign('goods',$goods);
        $this->assign('title','产品中心');
        $this->display("product/product");
    }
}