<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
Auth::check(20);

$_SESSION['errorSuperTheme'] = null;
$error = '';
if(checkArrKey($_POST, 'theme') == 1){
    $theme = PrepareForSQL::stroke($_POST['theme']);
    if(!empty($_POST['theme'])){
        $check = $mysqli->query('SELECT id FROM super_theme WHERE theme="'.$theme.'"');
        if(empty($theme)){
            $mysqli->query("INSERT INTO `super_theme` (`theme`) 
        VALUES ('".trim($_POST['theme'])."')");
        }
        else{
            $error="Такая тема уже существует";
        }
    }
    else{
        $error = 'Введите тему';
    }
}
else{
    $error = 'Введите тему';
}

if(empty($error)){
    Location::location('/system/php/PModer/arhive.php');
}
else{
    $_SESSION['errorSuperTheme'] = $error;
    LocationWhenError::returnBack();
}
