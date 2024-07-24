<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
require '../header.php';

Auth::checkAuth();
Auth::checkRole(10);
if(checkArrKey($_GET, 'id_message') != 1){
    LocationWhenError::error(9);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/input.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ответ</title>
</head>
<body>
    <?php
    insertHeader('', '');
    ?>
    <main class="flex col">
        <?php include '../select_menu.php'; ?>
        <div class="block backColor-block mr-t15 flex col gap15 col-center">
            <form action="../handlers//message_answer.php" method="post" style="width:70%" class="textGeneral gap5 flex col col-center">
                <h2>Ответ</h2>
                <input name="id_message" type="text" value="<?=$_GET['id_message']?>" hidden>
                <div class="width100p">
                        <p>Введите ваше сообщение</p>
                        <input class="inp" type="text" name="text" placeholder="Сообщение" value="">
                    </div>
                    <div class="error">
                        <?php
                        if(checkArrKey($_SESSION, 'errors_message_answer')==1){
                            foreach($_SESSION['errors_message_answer'] as $error){
                                echo '<p>'.$error.'</p>';
                            }
                        }
                        ?>
                    </div>
                    <input type="submit" value="Отправить" class="btn-reset btn-default">
            </form>
        </div>
    </main>
</body>
</html>