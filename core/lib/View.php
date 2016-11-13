<?php
namespace core\lib;

class View
{
    public $data = array();

    public function assign($name,$data){
        $this->data[$name] = $data;
    }

    public function display($filename=""){
        extract($this->data);
        if($filename){
            $filePath = APP_PATH."view/".Router::$ctrl."/".$filename;
        }else{
            $filePath = APP_PATH."view/".Router::$ctrl."/".Router::$act.".php";
        }
        if(is_file($filePath)){
            include $filePath;
        }else{
            exit('模版文件不存在');
        }
    }
}