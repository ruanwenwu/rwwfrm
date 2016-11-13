<?php
/**
 * 配置加载类
 * 
 * @author rww
 * @date 2016/11/06
 */
namespace core\lib;

class Config
{
    public static $config = array();
    /**
     * 根据对应的文件和key加载配置
     * 
     * @param string $key
     * @param string $file
     * @return mixed
     */
    public static function get($key, $file)
    {
        if (isset($config[$file])) {
            return $config[$file][$key];
        }
        
        $filePath = CORE."config/".$file;
        
        if (file_exists($filePath)) {
            self::$config[$file] = $config = include($filePath);
            if($config[$key]){
                return $config[$key];
            }else{
                throw new \Exception("$key not exist");
            }
        } else {
            throw new \Exception("$filePath not found");
        }       
    }
    
    /**
     * 加载所有配置
     * 
     */
    public static function all($file)
    {
        if (isset($config[$file])) {
            return $config[$file];
        }
        
        $filePath = CORE."config/".$file;
        
        if (file_exists($filePath)) {
            self::$config[$file] = $config = include($filePath);
            return $config;
        } else {
            throw new \Exception("$filePath not found");
        }
    }
}