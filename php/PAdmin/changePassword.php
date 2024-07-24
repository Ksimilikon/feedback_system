<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
require '../request/User.php';
require '../header.php';
Auth::check(20);
if(checkArrKey($_GET, 'id_user') != 1){
    LocationWhenError::error(9);
}
$user=$_GET['id_user'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/input.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменение</title>
</head>
<body>
    <?php
    insertHeader('', '');
    ?>
    <main class="flex col">
        <?php include '../select_menu.php'; ?>
        <div class="block mr-t15 flex col gap10 col-center">
            <h2>Изменение пароля</h2>
            <form action="../handlers_admin/changePassword.php" method="post" class="flex col col-center gap15" style="width:70%;">
                <input name="id_user" type="text" value="<?=$user?>" hidden>
                <input name="new" type="password" class="inp width100p" placeholder="Новый пароль" require>
                <div class="error">
                    <?php
                    if(checkArrKey($_SESSION, 'error_change_admin') == 1){
                        echo '<p>'.$_SESSION['error_change_admin'].'</p>';
                        $_SESSION['error_change_admin']= null;
                    }
                    ?>
                </div>
                <input type="submit" value="Подтвердить" class="btn-reset btn-default">
                <a href="../PAdmin/user.php?id_user=<?=$user?>"><input type="button" class="btn-reset btn-alert btn-default" value="Отмена"></a>

            </form>
        </div>
    </main>
</body>
</html>