<?php
    namespace controllers;

    class BaseControllers{
        protected function success($url,$mess){
            echo "<script>";
            echo "alert('{$mess}');";
            if(!empty($url)){
                echo "location.href='{$url}';";
            }
            echo "</script>";
        }

        protected function error($url,$mess){
            echo "<script>";
            echo "alert('ERROR:{$mess}');";
            if(!empty($url)){
                echo "location.href='{$url}';";
            }
            echo "</script>";
        }
    }
