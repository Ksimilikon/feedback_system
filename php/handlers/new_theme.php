<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
Auth::check(20);

$_SESSION['errorTheme'] = array();
$errors = array();

$theme;
$superTheme;
if(checkArrKey($_POST, 'superTheme') != 1){
    $errors[]='Выберите глобальную тему';
}
else{
    $superTheme = PrepareForSQL::stroke($_POST['superTheme']);
}
if(checkArrKey($_POST, 'theme') != 1){
    $errors[]='Введите название подтемы';
}
else{
    $theme=trim($_POST['theme']);
}
if(count($errors) == 0){
    $checkTheme = $mysqli->query("SELECT themes.id FROM `super_theme_has_theme` 
    JOIN themes ON super_theme_has_theme.id_theme=themes.id
    JOIN super_theme ON super_theme_has_theme.id_super_theme=super_theme.id
    WHERE super_theme.id=".$superTheme." AND themes.theme = '".$theme."'");
    $checkTheme = $checkTheme->fetch_object();
    if(!empty($checkTheme)){
        $errors[]="Такая подтема уже есть";
    }
}


if(count($errors) == 0){
    $mysqli->begin_transaction();
        $mysqli->query("INSERT INTO `themes` (`theme`) VALUES ('".$_POST['theme']."')");
        $lastIdTheme = $mysqli->insert_id;
        $mysqli->query("INSERT INTO `super_theme_has_theme` (`id_super_theme`, `id_theme`)
        VALUES ('".$superTheme."', '".$lastIdTheme."')");
    $mysqli->commit();
    echo 'succ';
    Location::location('/system/php/PModer/arhive.php');
}
else{
    echo 'fail';
    foreach($errors as $error){
        echo $error.'<br>';
    }
    $_SESSION['errorTheme'] = $errors;
    LocationWhenError::returnBack();
}
