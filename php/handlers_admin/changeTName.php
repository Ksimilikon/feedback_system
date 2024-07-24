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
if(empty($id_user)){
    LocationWhenError::error(9);
}
if(empty($new)){
    $new = null;
}
$table = 'users';
$col = 'TName';
$req = new RequestUpdate($table, $col, $new, $id_user);
LocationWhenError::location('/system/php/PAdmin/user.php?id_user='.$id_user);
?>