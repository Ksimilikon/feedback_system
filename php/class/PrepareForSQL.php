<?php
require 'MyError.php';
if(!class_exists('PrepareForSQL')){
class PrepareForSQL{
    
    public static function password($password){
        //require 'MyError.php';
        // if(preg_match('/\b(SELECT|INSERT|UPDATE|UNION|DELETE|FROM)/i', $password)){//поиск sql конструкций
        //     return new MyError(4);
        // }
        // if(strip_tags($password) != $password){//проверка наличия верстки
        //     return new MyError(4);
        // }
        // if(strlen($password)<6){
        //     return new MyError(5);
        // }
        $password=trim($password);//Должно быть последним
        return $password;
    }
    public static function stroke($stroke){
        //require 'MyError.php';
        // if(preg_match('/\b(SELECT|INSERT|UPDATE|UNION|DELETE|FROM)/i', $stroke)){//поиск sql конструкций
        //     return new MyError(4);
        // }
        // if(strip_tags($stroke) != $stroke){//проверка наличия верстки
        //     return new MyError(4);
        // }
        // if(strlen($stroke)<1){
        //     return new MyError(6);
        // }
        $stroke= trim($stroke);//должно быть последним
        return $stroke;
    }
    public static function mbnull($stroke){
        // if(preg_match('/\b(SELECT|INSERT|UPDATE|UNION|DELETE|FROM)/i', $stroke)){//поиск sql конструкций
        //     return new MyError(4);
        // }
        // if(strip_tags($stroke) != $stroke){//проверка наличия верстки
        //     return new MyError(4);
        // }
        $stroke= trim($stroke);//должно быть последним
        return $stroke;
    }
}
}