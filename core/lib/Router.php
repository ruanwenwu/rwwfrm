<?php
namespace core\lib;

class Router
{
    public static $ctrl;
    public static $act;
    public static $params;

    public function __construct(){
        if($_SERVER['REQUEST_URI'] == "/"){
            self::$ctrl = Config::get("CTRL","router.php");
            self::$act  = Config::get("ACTION","router.php");
        }else{
            $pathArr = explode("/",trim($_SERVER['REQUEST_URI'],"/"));
            $pathNum = count($pathArr);
            if($pathNum == 1){
                self::$ctrl = $pathArr[0];
                self::$act = "index";
            }else if($pathNum == 2){
                self::$ctrl = $pathArr[0];
                self::$act = $pathArr[1]; 
            }else{
                self::$ctrl = $pathArr[0];
                self::$act = $pathArr[1]; 
                for($i = 2; $i < $pathNum - 1 ; $i += 2){
                    if($pathArr[$i+1]){
                        self::$params[$pathArr[$i]] = $pathArr[$i+1];
                    }
                }
                $_GET = self::$params;
            }
        }
    }

}