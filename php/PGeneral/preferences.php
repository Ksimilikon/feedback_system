<?php
require '../class/classList.php';
require '../request/User.php';
require '../header.php';
Auth::checkRole(5); 
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
            <h2>Настройки</h2>
        </div>
    </main>
</body>
</html>