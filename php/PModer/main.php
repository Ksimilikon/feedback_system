<?php
require '../class/classList.php';
require '../request/User.php';
require '../header.php';
Auth::checkRole(10); 
$myId=Auth::getId();
$userData = new User($myId);


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Главная</title>
</head>
<body>
    <?php
    insertHeader('', '');
    ?>
    <main class="flex col">
        <?php include '../select_menu.php'; ?>
        <div class="block backColor-block mr-t15 flex col gap15">
            <div class="flex row">
                <div class="textHead2 flex row gap15 wrap">
                    <h4><?=$userData->getSecondName()?></h4>
                    <h4><?=$userData->getFirstName()?></h4>
                    <h4><?=$userData->getThirdName()?></h4>
                </div>
                <a href="../PUser/changeFIO.php"><button class="btn-reset btn-default mr-l15">Изменить</button></a>
                
            </div>
            
            
            <div class="flex row textGeneral col-center">
                <p class="textHead2"><?=$userData->getEmail()?></p>
                <a href="../PUser/changeEmail.php"><button class="btn-reset btn-default mr-l15">Изменить</button></a>
            </div>
            <a href="../handlers/exit.php"><button class="textGeneral btn-default btn-reset btn-ctrl btn-alert">Выйти</button></a>
        </div>
    </main>
</body>
</html>