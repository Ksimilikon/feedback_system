<?php
class Reg{
    function __construct($login, $password, $email, $FName, $SName, $TName)
    {
        require '../config.php';
        require 'Error.php';
        require 'PrepareForSQL.php';
        require 'Error.php';
        $permission=array();
        $query='';

        $login=PrepareForSQL::stroke($login);
        $password=PrepareForSQL::password($password);
        $email=PrepareForSQL::stroke($email);
        $FName=PrepareForSQL::stroke($FName);
        $SName=PrepareForSQL::stroke($SName);
        $TName=PrepareForSQL::stroke($TName);
        if(gettype($login) == 'Error'){
            $permission[]=$login;
        }
        if(gettype($password) == 'Error'){
            $permission[]=$password;
            
        }
        if(gettype($email) == 'Error'){
            $permission[]=$email;
            
        }
        if(gettype($FName) == 'Error'){
            $permission[]=$FName;
            
        }
        if(gettype($SName) == 'Error'){
            $permission[]=$SName;
            
        }
        if(gettype($TName) == 'Error'){
            $permission[]=$TName;
            
        }

        
        if(count($permission)==0){
            $mysqli->query($query);
        }
        else{
            return $permission;
        }
    }
}