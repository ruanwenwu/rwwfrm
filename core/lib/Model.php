<?php
namespace core\lib;

class Model{
    public static $instance=null;
    public $dbLink;
    private function __construct($params=null){
        $options = array(
            "dsn" => "mysql:host=localhost;dbname=blog",
            "username" => "root",
            "pwd" => "",
            "option"=> array(
                \PDO::ATTR_ERRMODE   =>  \PDO::ERRMODE_EXCEPTION,
            )
        );
        if($params){
            $options = array_merge($options,$params);
        }
        extract($options);
        $this->dbLink = new \PDO($dsn,$username,$pwd,$options);
        $this->dbLink->exec("set names utf8");
    }
    
    private function __clone(){}  //禁止克隆
    
    public static function getInstance(){
        if(!self::$instance instanceof self){
            return self::$instance = new self();           
        }else{
            return self::$instance;
        }
    }
    
    public function insertData($sql){
        return $this->dbLink->exec($sql);
    }
    
    public function query($sql){
        $record = $this->dbLink->query($sql);
        if($record){
            return $record->fetchAll(\PDO::FETCH_ASSOC);
        }       
    }
    
}