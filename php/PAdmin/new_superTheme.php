<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
require '../header.php';
Auth::check(20);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/input.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление глобальной темы</title>
</head>
<body>
    <?php
    insertHeader('', '');
    ?>
    <main class="flex col">
        <?php include '../select_menu.php'; ?>
        <div class="block mr-t15 flex col col-center">
            <form class="width70p flex col col-center gap10" action="../handlers/new_superTheme.php" method="post">
                <h2>Добавление глобальной темы</h2>
                <input name="theme" class="inp" type="text" placeholder="Название темы">
                <div class="error">
                    <?php
                    if(checkArrKey($_SESSION, 'errorSuperTheme') == 1){
                        echo '<p>'.$_SESSION['errorSuperTheme'].'</p>';
                        $_SESSION['errorSuperTheme']=null;
                    }
                    ?>
                </div>
                <input class="btn-reset btn-default" type="submit" value="Добавить">
            </form>
        </div>
    </main>
</body>
</html>