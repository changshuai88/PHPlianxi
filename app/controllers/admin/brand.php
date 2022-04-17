<?php
    namespace admin;
    use models\basedao;

    class Brand extends Admin{

        function index(){
            $db = new BaseDao();
            $arr=["请选择品牌"];
            $brands = $db->select("model",["pid","name","id","ord"]);         
            // print_r($brand);
            
            foreach($brands as $k => $v){
                // print_r($a["pid"]);
                $b = $a;
                $a["pid"] == 0 ? array_push($arr,$a["name"]):null;

                // $a["pid"] == $b["id"] ? 
                // var_dump($arr);
                // echo "<br>";
                // return $arr;
                
                /* if ($a["pid"] == 0){
                    $arr[$i] = $a["name"];
                } */
                
            }

            $this->assign('brands',$arr);
            $this->display("brand/index");
        }

    }