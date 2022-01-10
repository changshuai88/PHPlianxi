<?php
namespace home;

use models\BaseDao;

class Test extends Home{
    function index(){
        $db = new BaseDao();
        $data = $db->select('product','*');
        $this->assign('data',$data);
        $this->display('test/index');
    }
}