<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
require '../request/RequestUpdate.php';

Auth::check(20);
if(checkArrKey($_POST, 'id_user') != 1){
    LocationWhenError::error(9);
}
if(checkArrKey($_POST, 'new') != 1){
    LocationWhenError::error(9);
}
$id_user=$_POST['id_user'];
$new=$_POST['new'];
$errors=0;
if(empty($id_user)){
    LocationWhenError::error(9);
}
if(empty($new)){
    $_SESSION['error_change_admin'] = null;
    $_SESSION['error_change_admin'] = 'Заполните поле';
    $errors++;
}
if(!filter_var($new, FILTER_VALIDATE_EMAIL)){
    $_SESSION['error_change_admin'] = null;
    $_SESSION['error_change_admin'] = 'Неверный формат электронной почты';
    $errors++;
}
$check = $mysqli->query('SELECT email FROM users WHERE email="'.$new.'"');
$check=$check->fetch_object();
if(!empty($check->email)){
    $_SESSION['error_change_admin'] = null;
    $_SESSION['error_change_admin'] = 'Электронная почта уже существует';
    $errors++;
}
if($errors==0){
    $table = 'users';
    $col = 'email';
    $req = new RequestUpdate($table, $col, $new, $id_user);
    LocationWhenError::location('/system/php/PAdmin/user.php?id_user='.$id_user);
}
else{
    LocationWhenError::returnBack();
}

?>