<?php
namespace home;
use models\basedao;

class Repaire extends Home{
    function index(){

        $db = new BaseDao();
        $db->query("set names utf8");
        $news = $db->select("news","*",['ORDER'=>['id'=>'DESC'],'LIMIT'=>[0,4]]);

        foreach ($news as $key => $value) {
            $news[$key]['article'] = substr( $value['article'],0,20);
        };


        $this->assign('news', $news);
        
        $this->assign('title','维修知识');
        $this->display("repaire/repaire");

    }

    function knowledge($id){
        
        // $time ='';
        $db = new BaseDao();
        $db->query("set names utf8");
        $news = $db->select("news","*",['id'=>$id]);
        // $time = $news[0]["readtimes"];
        // $time++;


        $this->assign('new', $news[0]);        
        $this->assign('title','维修知识');
        $this->display("repaire/new");
        $news = $db->update("news",['readtimes[+]'=>1],['id'=>$id]);

    }
}