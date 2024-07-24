<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
require '../header.php';
Auth::check(20);
$supertheme = $mysqli->query("SELECT * FROM super_theme");

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/input.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Редактирование тем</title>
</head>
<body>
    <?php
    insertHeader('', '');
    ?>
    <main class="flex col">
        <?php include '../select_menu.php'; ?>
        <div class="block mr-t15 flex col col-center">
            <h2>Редактирование тем</h2>
            <div class="flex col width70p gap10">
                <h4>Глобальные темы</h4>
                
                <div class="width100p flex row gap10">
                    <a href="new_superTheme.php"><button class="btn-reset btn-default">Добавить</button></a>
                    <a href="change_superTheme.php"><button class="btn-reset btn-default">Изменить</button></a>
                </div>
            </div>
            <div class="flex col width70p gap10">
                <h4>Подтемы</h4>
                <div class="width100p flex row gap10">
                    <a href="new_theme.php"><button class="btn-reset btn-default">Добавить</button></a>
                    <a href="change_theme.php"><button class="btn-reset btn-default">Изменить</button></a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>