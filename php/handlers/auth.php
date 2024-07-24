<?php
require '../class/classList.php';
$errors = array();
$_SESSION['errorsLogin'] = array();

$email=$_POST['email'];
$password=$_POST['password'];
$check;

//проверка
if(empty($password)){
    $errors[] = MyError::getTextError(1111);
}
if(empty($email)){
    $errors[] = MyError::getTextError(1110);
}
else{
    //проверка существования
    $check = $mysqli->query("SELECT id, password, id_role FROM `users` WHERE `email`='".$email."'");
    $check = $check->fetch_object();
    if(empty($check->id)){
        $errors[] = MyError::getTextError(1118);
    }
    if(!password_verify($password, $check->password)){
        //echo $userData;
        $errors[] = MyError::getTextError(2);
    }
}

//auth
if(count($errors) == 0){
    $_SESSION['my_id']=$check->id;
    $_SESSION['role']=$check->id_role;
    LocationWhenError::location('/system/php/PUser/main.php');
}
else{
    $_SESSION['errorsLogin'] = $errors;
    LocationWhenError::returnBack();
}
?>
