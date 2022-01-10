<?php
namespace models;
use Medoo\Medoo;     //引入模板

class BaseDao extends Medoo{
    function __construct(){
        $options = [
            'database_type' => 'mysql',  //数据库类型
            'database_name' => DBNAME,   //数据库名称
            'server' => HOST,     //服务器
            'port' => PORT,            //数据库接口
            'username' => USRE,            //数据库登录名
            'password' => PASS,            //数据库密码
            'prefix' => TABPREFIX            //表前缀
        ];
        parent::__construct($options);
    }
}