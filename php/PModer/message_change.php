<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
require '../header.php';

if(empty(Auth::getId())){
    header('Location: ../PGeneral/auth_reg.php');
}
Auth::checkRole(10);
if(checkArrKey($_GET, 'id_message') != 1 ){
    header('Location: '.$_SERVER['HTTP_REFERER']);
}
$data = $mysqli->query("SELECT head, msg FROM message WHERE id=".$_GET['id_message']);
$data = $data->fetch_object();


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/input.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$data->head?></title>
</head>
<body>
<?php
    insertHeader('', '');
    ?>
    <main class="flex col">
        <?php include '../select_menu.php'; ?>
        <div class="block backColor-block mr-t15 flex col gap15 col-center">
            <form action="../handlers//message_change.php" method="post" style="width:70%" class="textGeneral gap5 flex col col-center">
                <h2>Изменение заявки: <?=$data->head?></h2>
                <input name="id_message" type="text" value="<?=$_GET['id_message']?>" hidden>
                <div class="width100p">
                    <p>Заголовок</p>
                    <input value="<?=$data->head?>" type="text" name="head" id="" class="inp" placeholder="Заголовок">
                </div>
                <div class="width100p">
                    <p class="">Описание</p>
                    <input value="<?=$data->msg?>" type="text" name="desc" id="" class="inp" placeholder="Описание">
                </div>
                <input type="submit" name="" id="" value="Подтвердить" class="btn-reset btn-default">
            </form>
        </div>
    </main>
</body>
</html>