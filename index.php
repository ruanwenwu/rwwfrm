<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.运行框架
 */
define("PROJECT_PATH",realpath("./")."/");
define("APP_PATH",PROJECT_PATH."app/");
define("CORE",PROJECT_PATH."core/");
define("MODULE",'app');
define("DEBUG",true);
include("vendor/autoload.php");     //引入composer自动加载文件

if(DEBUG){
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    ini_set("display_errors","On");
}else{
    ini_set("display_errors","Off");
}

include CORE."common/functions.php";
include CORE."core.php";
spl_autoload_register('core\Core::load');
core\Core::run();