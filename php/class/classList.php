<?php
session_start();
require '../config.php';
        require 'MyError.php';
        require 'PrepareForSQL.php';  
        require 'Debug.php';  
class Auth{
    public static function enter($email, $password){ //не работает
        //осуществление входа
        require '../config.php';

        $errors = array();
        $targetType = "string";

        if(gettype($email) != $targetType){
            $errors[]=$email;
        }
        if(gettype($password) != $targetType){
            $errors[]=$password;
        }
        
        if(gettype($password) == $targetType && gettype($email) == $targetType){
            $checkUser = $mysqli->query('SELECT `email`, `password` FROM users WHERE `email`="'.$email.'"');
            $checkUser = $checkUser->fetch_object();
            echo $password;
            echo password_verify($password, $checkUser->password);
            
            if(!empty($checkUser->email)){
                if(password_verify($password, $checkUser->password)){
                    
                    $user = $mysqli->query('SELECT id, id_role FROM users WHERE email="'.$email.'"');
                    $user = $user->fetch_object();
                    $_SESSION['my_id']=$user->id;
                    $_SESSION['role']=$user->id_role;
                    return true;
                }
                else{
                    $errors[]=serialize(new MyError(2));
                }
            }
            else{
                $errors[]=serialize(new MyError(1));
            }
            session_start();
            $_SESSION['errors']=$errors;
            return false;
        }
    }
    public static function checkAuth(string $ref = 'system/php/PGeneral/auth_reg.php'){
        if(empty(self::getId())){
            header('Location: '.$ref);
        }
    }
    public static function checkRole($idRoleTarget) {
        require 'MyError.php';
        session_start();
        $role = self::getRole();
        if($role != -1){
            if($idRoleTarget <= $role){
                //clear
            }
            else{ 
                LocationWhenError::error(7);
            }
        }
        else{
            LocationWhenError::error(3);
        }
    }
    public static function check(int $role, string $ref='system/php/PGeneral/auth_reg.php'){
        self::checkAuth($ref);
        self::checkRole($role);
    }

    public static function getId(){
        session_start();
        if(array_key_exists('my_id', $_SESSION)){
            return $_SESSION['my_id'];
        }
        else{
            return -1;
        }
    }
    public static function getRole(){
        
        if(array_key_exists('role', $_SESSION)){
            return $_SESSION['role'];
        }
        else{
            return -1;
        }
    }

}
class LocationWhenError{
    public static function auth_reg() {
        header('Location: /system/php/PGeneral/auth_reg.php');
    }
    public static function error($codeError){
        $_SESSION['error'] = serialize(new MyError($codeError));
        header('Location: /system/php/error.php');
    }
    public static function location(string $ref){
        header('Location: '.$ref);
    }
    public static function returnBack(){
        if(empty($_SERVER['HTTP_REFERER'])){
            self::error(7);
        }
        else{
            self::location($_SERVER['HTTP_REFERER']);
        }
        
    }
}
class Location extends LocationWhenError{
    
}