<?php
namespace home;
use models\basedao;

class Index extends Home{
    function index(){

        $db = new BaseDao();
        $db->query("set names utf8");
        
        $goods = $db->select("goods","*",['ORDER'=>['id'=>'DESC'],'LIMIT'=>[0,8]]);
        // dd($goods);
        $this->assign('goods',$goods);
        $news = $db->select("news","*",['ORDER'=>['id'=>'DESC'],'LIMIT'=>[0,4]]);

        foreach ($news as $key => $value) {
            $news[$key]['article'] = substr( $value['article'],0,20);
        };
        $this->assign('news', $news);


        $this->assign('title','平地机配件网');

        $this->display("test/index");
    }
}