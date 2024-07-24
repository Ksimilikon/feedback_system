<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';

Auth::check(20);
$errors = array();
$_SESSION['errorSuperTheme'] = $errors;
$superTheme;
$change;

if(checkArrKey($_POST, 'superTheme') != 1){
    $errors[] = 'Выберите тему для изменения';
}
else{
    $superTheme = PrepareForSQL::stroke($_POST['superTheme']);
}
if(checkArrKey($_POST, 'change') != 1){
    $errors[] = 'Введите новое название темы';
}
else{
    $change = $_POST['change'];
}

if(count($errors) == 0){
    $check = $mysqli->query('SELECT id FROM super_theme WHERE theme="'.$change.'"');
    $check=$check->fetch_object();
    if(!empty($check->id)){
        $errors[]='Такая тема уже существует';
    }
}
if(count($errors) == 0){
    $mysqli->query("UPDATE `super_theme` SET `theme` = '".$change."' WHERE id=".$superTheme);
    Location::location('/system/php/PModer/arhive.php');
}
else{
    $_SESSION['errorSuperTheme'] = $errors;
    LocationWhenError::returnBack();
}