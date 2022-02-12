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

    protected function display($template){
        $url =getCurUrl();

        $this->assign('url',$url.'/app/views/'.TEMPNAME.'/resourse');
        $this->assign('public',$url.'/app/views/public');
        $this->assign('res',$url.'/uploads');
        
        echo $this->twig->render($template.'.html',$this->data);
    }
}