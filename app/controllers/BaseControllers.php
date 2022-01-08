<?php
    namespace controllers;

    class BaseControllers{
        //成功跳转
        protected function success($url,$mess){
            echo "<script>";
            echo "alert('{$mess}');";
            if(!empty($url)){
                echo "location.href='{$url}';";
            }
            echo "</script>";
        }
        // 失败跳转
        protected function error($url,$mess){
            echo "<script>";
            echo "alert('ERROR:{$mess}');";
            if(!empty($url)){
                echo "location.href='{$url}';";
            }
            echo "</script>";
        }
    }
