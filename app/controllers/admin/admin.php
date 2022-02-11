<?php
namespace admin;

use controllers\BaseControllers;

class Admin extends BaseControllers{

    function __construct(){        
        $loader = new \Twig\Loader\FilesystemLoader(TEMPDIR.'/app/views/admin');
        $this->twig = new \Twig\Environment($loader,[
            //    'cache' => '/path/to/compilatation_cache',
        ]);    
 
    }

    function index(){
        $this->assign('name','cjs');
        $this->assign('title','this is a test');

        // print_r($this->data);
        $this->display('index/index');
    }
}