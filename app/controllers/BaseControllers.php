<?php
    namespace controllers;

    class BaseControllers{
        protected $twig;
        protected $data = [];
        //调用视图组件--$twig
        public function __construct(){
            $loader = new \Twig\Loader\FilesystemLoader(TEMPDIR.'\app\views');
            $this->twig = new \Twig\Environment($loader,[
             //    'cache' => '/path/to/compilatation_cache',
            ]);
     
        }
        //收集向视图组件传递的数据$data,
        protected function assign($var,$value=null){
            if(is_array($var)){
                $this->data = array_merge($this->data,$var);
            }else{
                $this->data[$var] = $value;
            }
        }
        //指定向那个视图模板传递，和传递的数据
        protected function display($template){
            echo $this->twig->render($template.'.html',$this->data);
        }

        /*
        * @param $url
        * @param $mess
        * 成功跳转
        */
        protected function success($url,$mess){
            echo "<script>";
            echo "alert('{$mess}');";
            if(!empty($url)){               
                echo "location.href='{$url}';";
            }
            echo "</script>";
        }
        /*
        * @param $url
        * @param $mess
        * 失败跳转
        */
        protected function error($url,$mess){
            echo "<script>";
            echo "alert('ERROR:{$mess}');";
            if(!empty($url)){
                echo "location.href='{$url}';";
            }
            echo "</script>";
        }
    }
