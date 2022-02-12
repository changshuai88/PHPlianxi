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

    protected function display($template){
        $url = getCurUrl();

        $this->assign('url',$url.'/app/views/admin/resourse');
        $this->assign('public',$url.'/app/views/public');
        $this->assign('res',$url.'/uploads');

        echo $this->twig->render($template.'.html',$this->data);
    }

    
}