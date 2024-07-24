<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
require '../request/RequestUpdate.php';

Auth::check(5);
$errors=array();

$SName;
$FName;
$TName;
$checkBox;
if(checkArrKey($_POST, 'SName') == 1){
    $SName = $_POST['SName'];
}
else{
    $errors[]='Заполните поле с фамилией';
}
if(checkArrKey($_POST, 'FName') == 1){
    $FName = $_POST['FName'];
}
else{
    $errors[]='Заполните поле с именем';
}
if(checkArrKey($_POST, 'checkBox') == 1){
    $checkBox = true;
}
else{
    $checkBox = false;
}
if(!$checkBox){
    if(checkArrKey($_POST, 'TName') == 1){
        $TName = $_POST['TName'];
    }
    else{
        $errors[]='Заполните поле c отчеством';
    }
}
else{
    $TName=null;
}
if(count($errors) == 0){
    $table = 'users';
    $req = new RequestUpdate($table, 'SName', $SName, Auth::getId());
    $req = new RequestUpdate($table, 'FName', $FName, Auth::getId());
    $req = new RequestUpdate($table, 'TName', $TName, Auth::getId());
    LocationWhenError::location('/system/php/PUser/main.php');
}
else{
    $_SESSION['errors_change_user'] = array();
    $_SESSION['errors_change_user'] = $errors;
    LocationWhenError::returnBack();
}