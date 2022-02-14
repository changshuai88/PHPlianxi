<?php
    namespace admin;

    class Login extends Admin{
        function index(){
            $this->display("login/login");
        }
    }