<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';

Auth::check(10);
$_SESSION['errors_message_answer'] = array();
$errors = array();
if(checkArrKey($_POST, 'text') != 1){
    $errors[] = 'Недостаточно переданных данных';
    LocationWhenError::returnBack();
}
if(checkArrKey($_POST, 'text') != 1){
    $errors[] = 'Введите сообщение';
    LocationWhenError::returnBack();
}
try{
    if(count($errors)==0){
        $mysqli->query("INSERT INTO `message_add` (`id_message`, `desc`, `id_user`) 
        VALUES (".$_POST['id_message'].", '".$_POST['text']."', ".Auth::getId().")");
        LocationWhenError::location('/system/php/PModer/message.php?id_msg='.$_POST['id_message']);
    }
    else{
        $_SESSION['errors_message_answer'] = $errors;
        LocationWhenError::returnBack();
    }
}
catch(Exception $e){
    echo $e->getMessage(). ' '.$e->getLine();
    LocationWhenError::error(8);
}
