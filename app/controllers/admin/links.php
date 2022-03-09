<?php
    namespace admin;
    class Links extends Admin{
        function index(){

            

            $this->assign('name','cjs');

            $this->display("links/links");
        }

        function add_links(){




            $this->display("links/add_links");

        }
    }