<?php
require '../class/classList.php';
require_once '../class/GuardHandler.php';
require '../class/func_checkArrKey.php';


$_SESSION['errors_message_add']=array();
$errors = array();
$text;

if(empty(Auth::getId())){
    header('Location: ../PGeneral/auth_reg.php');
}
Auth::checkRole(5);
if(key_exists('id_message', $_GET)){
    $formId = $_GET['id_message'];
}
else{
    $errors[] = "Не все данные переданны";
}
GuardHandler::checkRef('/system/php/PUser/message_add.php?id_message='.$formId);
$check = $mysqli->query("SELECT message.id FROM message WHERE message.id_user=".Auth::getId()." AND message.id=".$formId);
$check = $check->fetch_object();
$check = $check->id;
if(empty($check)){
    $_SESSION['error'] = serialize(new MyError(7));
    header('Location: ../error.php');
}
if(key_exists('text', $_POST)){
    if($_POST['text'] == '' || $_POST['text'] == null){
        $errors[] = "Введите сообщение";
    }
    else{
        $text = $_POST['text'];
    }
}
else{
    $errors[] = "Ключ не был передан";
}

try{
    if(count($errors) == 0){
        $mysqli->query("INSERT INTO `message_add` (`id_message`, `desc`, `id_user`) 
        VALUES (".$formId.", '".$text."', ".Auth::getId().")");
        header('Location: ../PUser/message.php?id_msg='.$formId);
    }
}
catch(Exception $e){
    echo $e->getMessage() . " " . $e->getLine();
    $errors[] = "Ошибка обработки запроса";
}
if(count($errors) > 0){
    $_SESSION['errors_message_add'] = $errors;
    foreach($errors as $error){
        echo $error . "<br>";
    }
    header('Location: ../PUser/message_add.php?id_message='.$formId);
}
