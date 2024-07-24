<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
Auth::check(20);

$errors = array();
$_SESSION['errorTheme']=$errors;
$change;
$theme;
$superTheme;
if(checkArrKey($_POST, 'superTheme') != 1){
    $errors[]='Выберите глобальную тему';
}
else{
    $superTheme=$_POST['superTheme'];
}
if(checkArrKey($_POST, 'theme') != 1){
    $errors[]='Выберите тему';
}
else{
    $theme=$_POST['theme'];
}
if(checkArrKey($_POST, 'change') != 1){
    $errors[]='Введите новое название темы';
}
else{
    $change=$_POST['change'];
}
if(count($errors)==0){
    $checkTheme = $mysqli->query("SELECT themes.id FROM `super_theme_has_theme` 
    JOIN themes ON super_theme_has_theme.id_theme=themes.id
    JOIN super_theme ON super_theme_has_theme.id_super_theme=super_theme.id
    WHERE super_theme.id=".$superTheme." AND themes.theme = '".$change."'");
    $checkTheme = $checkTheme->fetch_object();
    if(!empty($checkTheme)){
        $errors[]="Такая подтема уже есть";
    }
}

if(count($errors)==0){
    $mysqli->begin_transaction();
        $mysqli->query("UPDATE `themes` SET `theme` = '".$change."' WHERE `themes`.`id` = ".$theme);
    $mysqli->commit();
    Location::location('/system/php/PModer/arhive.php');
}
else{
    $_SESSION['errorTheme']=$errors;
    LocationWhenError::returnBack();
}