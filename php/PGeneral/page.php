<?php
require '../class/classList.php';
require '../request/User.php';
require '../header.php';
Auth::checkRole(5); 
if(!key_exists('id_user', $_GET)){
    header('Location: '.$_SERVER['HTTP_REFERER']);
}
$myId=$_GET['id_user'];
$userData = new User($myId);


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/main.css">
    <title><?=$userData->getSecondName() . " " . $userData->getFirstName() . ' ' . $userData->getThirdName()?></title>
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
            </div>
            <div class="flex row textGeneral col-center">
                <p class="textHead2"><?=$userData->getEmail()?></p>
            </div>
        </div>
    </main>
</body>
</html>