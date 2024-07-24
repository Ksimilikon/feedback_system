<?php
require '../class/classList.php';

$location='../PGeneral/reg.php';
session_start();
$_SESSION['errors_reg']=array();
$_SESSION['saveReg']=array();
$errors= array();
$saveData = array();

$email = $_POST['email'];
$FName = $_POST['FName'];
$SName = $_POST['SName'];
$TName = $_POST['TName'];
$password = $_POST['password'];
$passwordR = $_POST['passwordR'];


$targetType = 'string';

    if(empty($TName)){
        $TName=null;
    }
    else{
        $saveData+=array('TName'=>$TName);
    }
    if(empty($email)){
        $errors[]= serialize(new MyError(1110));
    }
    else{
        $saveData+= array('email'=>$email);
    }
    if(empty($FName)){
        $errors[]=serialize(new MyError(1112));
    }
    else{
        $saveData += array('FName' => $FName);
    }
    if(empty($SName)){
        $errors[]=serialize(new MyError(1113));
    }
    else{
        $saveData+= array('SName' => $SName);
    }
    if(empty($password)){
        $errors[]=serialize(new MyError(1111));
    }
    if(empty($passwordR)){
        $errors[]=serialize(new MyError(1114));
    }

        if(!(empty($password) && empty($passwordR))){
            if($password!=$passwordR){
                $errors[]=serialize(new MyError(1117));
            }
        }
        if(!empty($email)){
            $check=$mysqli->query('SELECT email FROM users WHERE email="'.$email.'"');
            $check=$check->fetch_object();
            if(!empty($check->email)){
                $errors[] = serialize(new MyError(1119));
            }
        }
    
    echo count($errors);
    if(count($errors)>0){
        echo 'backto';
        $_SESSION['errors_reg']=$errors;
        $_SESSION['saveReg']=$saveData;
        //echo $saveData['email'];
        echo $location;
        header('Location: '. $location);
    }
    else{
        
        $_SESSION['errors_reg']=array();
        $_SESSION['saveReg']=array();
        $passwordHash=password_hash($password, PASSWORD_DEFAULT);
        if($TName==null){
            $mysqli->query("INSERT INTO `users` (`email`, `password`, `FName`, `SName`)
            VALUES ('".$email."', '".$passwordHash."', '" . $FName . "', '". $SName ."')");
        }
        else{
        $mysqli->query("INSERT INTO `users` (`email`, `password`, `FName`, `SName`, `TName`)
        VALUES ('".$email."', '".$passwordHash."', '" . $FName . "', '". $SName ."', '". $TName . "')"); 
        }
        $check=$mysqli->query('SELECT `id`, `id_role` FROM users WHERE email="'.$email.'"');
        $check=$check->fetch_object();
        $_SESSION['my_id']=$check->id;
        $_SESSION['role']=$check->id_role;
        header('Location: ../PUser/main.php');
        //if(Auth::enter($email, $password)){
            //header('Location: ../PUser/main.php');
        //}
        
    }
