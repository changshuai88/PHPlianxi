<?php

if(!function_exists('dd')){
    function dd(...$args){
        http_response_code(500);

        foreach($args as $x){
            var_dump($x);
        }

        die(1);
    }
}

function getCurUrl(){

    $url = 'http://';

    if(isset($_SERVER['SERVER_HTTPS']) && $_SERVER['SERVER_HTTPS'] == 'ON'){
        $url = 'https://';
    }

    //判断端口
    if($_SERVER['SERVER_PORT'] != '80'){
        $url .= $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'];
    }else{
        $url .= $_SERVER['SERVER_NAME'];
    }

    return $url;
}

function upload($fileName,$filePath,$newName){
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES[$fileName]["name"]);
    // echo $_FILES[$fileName]["size"];
    // echo end($temp);
    $houzhui = ".".end($temp);
    $extension = end($temp);     // 获取文件后缀名
    if ((($_FILES[$fileName]["type"] == "image/gif")
    || ($_FILES[$fileName]["type"] == "image/jpeg")
    || ($_FILES[$fileName]["type"] == "image/jpg")
    || ($_FILES[$fileName]["type"] == "image/pjpeg")
    || ($_FILES[$fileName]["type"] == "image/x-png")
    || ($_FILES[$fileName]["type"] == "image/png"))
    && ($_FILES[$fileName]["size"] < 204800)   // 小于 200 kb
    && in_array($extension, $allowedExts))
    {
        if ($_FILES[$fileName]["error"] > 0)
        {
            echo "错误：: " . $_FILES[$fileName]["error"] . "<br>";
        }
        else
        {
            // echo "上传文件名: " . $_FILES[$fileName]["name"] . "<br>";
            // echo "文件类型: " . $_FILES[$fileName]["type"] . "<br>";
            // echo "文件大小: " . ($_FILES[$fileName]["size"] / 1024) . " kB<br>";
            // echo "文件临时存储的位置: " . $_FILES[$fileName]["tmp_name"] . "<br>";
            
            // 判断当前目录下的 upload 目录是否存在该文件
            // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
            if (file_exists($filePath . $_FILES[$fileName]["name"]))
            {
                echo $_FILES[$fileName]["name"] . " 文件已经存在。 ";
            }
            else
            {
                // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
                move_uploaded_file($_FILES[$fileName]["tmp_name"], $filePath ."/". $newName.$houzhui);
                // echo "文件存储在: " . $filePath ."/". $_FILES[$fileName]["name"];
                $newPath = $filePath ."/". $newName.$houzhui;
                return $newPath;
            }
        }
    }
    else
    {
        echo "非法的文件格式";
    }
            }