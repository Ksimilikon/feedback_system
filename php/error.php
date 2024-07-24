<?php
session_start();
require 'class/MyError.php';
require 'class/func_checkArrKey.php';
$return;
if(checkArrKey($_SERVER, 'HTTP_REFERER') == 1){
    $return = $_SERVER['HTTP_REFERER'];
}
else{
    $return = '/system/php/PUser/main.php';
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ошибка</title>
</head>
<body>
    
    <a href="<?=$return?>"><button class="btn-reset btn-default">&LeftArrow;Вернуться на предыдущую страницу</button></a>
    <h1>Ошибка</h1>
    <div class="flex col"><?php
    //echo $_SERVER["HTTP_REFERER"].' ';
    if(key_exists('errors', $_SESSION)){
       if(count($_SESSION['errors'])>0){
        foreach ($_SESSION['errors'] as $err){
            $err->getInsertText();
        }
        $_SESSION['errors']=null;
    } 
    }
    if(key_exists('error', $_SESSION)){
        if(!empty($_SESSION['error'])){
            $err = unserialize($_SESSION['error']);
            echo $err->getInsertText();
            $_SESSION['error']=null;
            if($err->getNum() == 3){
                header('Location: PGeneral/auth_reg.php');
            }
        }
    }
exit;
    ?></div>
    
</body>
</html>