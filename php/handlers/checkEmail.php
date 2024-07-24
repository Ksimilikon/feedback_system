<?php
//echo json_encode(array('ok'=>'ok'));
require '../config.php';
require '../class/PrepareForSQL.php';

session_start();

$email=$_POST['email'];
$email = PrepareForSQL::stroke($email);

if(gettype($email) != 'string'){
    
    $_SESSION['error']=$email;
    echo json_encode(array('status'=>$email->getText()));
}
else{
    $query = 'SELECT email FROM users WHERE email="'.$email.'"';
    $check = $mysqli->query($query);
    $check = $check->fetch_object();
    if(empty($check->email)){
        echo json_encode(array('status'=>'1'));
    }
    else{
        echo json_encode(array('status'=>'0'));
    }
}


?>