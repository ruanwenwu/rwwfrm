<?php
namespace app\controller;
use core\lib\Model as Model;
use core\lib\Router as Router;
use core\lib\View as View;
class IndexController
{
    public function addData(){
        $pdo = Model::getInstance();
        $sql = "insert into z_post (title,content) values ('this is test','this i test')";
        if($pdo->insertData($sql)){
            echo 'chenggong';
        }
       
    }

    public function index(){
        //echo $_GET['a'];
        //echo $_GET['b']; 
        $pdo = Model::getInstance();
        $sql = "select * from z_post";
        $data = $pdo->query($sql);
        $view = new View();
        $view->assign("data",$data[0]);
        $view->display();
    }

    public function p(){
        //echo '<pre>';
        //var_dump(Router::$params);
        echo Router::$params['id'];
    }
}