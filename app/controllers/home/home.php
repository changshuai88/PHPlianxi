<?php

namespace home;

use controllers\BaseControllers;

class Home extends BaseControllers{
    function __construct(){        
        $loader = new \Twig\Loader\FilesystemLoader(TEMPDIR.'/app/views/'.TEMPNAME);
        $this->twig = new \Twig\Environment($loader,[
            //    'cache' => '/path/to/compilatation_cache',
        ]);    
 
    }
}