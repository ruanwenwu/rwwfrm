<?php
/**
 * 框架核心文件，负责加载类，解析路由等
 */
namespace core;

class Core
{
    private static $classMap = array();

    public static function load($class){
        $classDir = str_replace("\\","/",$class);
        $classPath = PROJECT_PATH.$classDir.".php";
        if(in_array($class,self::$classMap)){
            return true;
        }
        if(is_file($classPath)){
            include $classPath;
            self::$classMap[] = $class;
        }else{
            return false;
        }
    }

    public static function run(){
        $router = new \core\lib\Router();
        $ctrl = \core\lib\Router::$ctrl;  
        $act = \core\lib\Router::$act;
        $params = \core\lib\Router::$params;
        $ctrlClass = "\\".MODULE."\\controller\\".$ctrl."Controller";
        $ctrlObj = new $ctrlClass();
        $ctrlObj->$act();
    }
}