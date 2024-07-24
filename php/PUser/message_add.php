<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
require '../header.php';

if(empty(Auth::getId())){
    header("Location: ../PGeneral/auth_reg.php");
}
$formId;
if(checkArrKey($_GET, 'id_message') == 1){
    $formId = $_GET['id_message'];
}
else{
    $_SESSION['error']=serialize(new MyError(7));
    header('Location: ../error.php');
}
$msgInfo = $mysqli->query("SELECT id_user, head, msg, status FROM message WHERE id=".$formId);
$msgInfo = $msgInfo->fetch_object();
$idMaker = $msgInfo->id_user;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/input.css">
    <title><?=$msgInfo->head?></title>
</head>
<body>
    <?php
    insertHeader('', '');
    ?>
    <main class="flex col">
        <?php include 'selectMenu.html'; ?>
        <div class="block backColor-block mr-t15 flex col gap15">
            <div class="flex col col-center">
                <h2><?=$msgInfo->head?></h2>
                <form action="../handlers/message_add.php?id_message=<?=$formId?>" method="post" style="width:70%" class="textGeneral gap5 flex col col-center width100p">
                    <div class="width100p">
                        <p>Введите ваше сообщение</p>
                        <input class="inp" type="text" name="text" placeholder="Сообщение" value="">
                    </div>
                    <div class="error">
                        <?php
                        if(checkArrKey($_SESSION, 'errors_message_add')==1){
                            foreach($_SESSION['errors_message_add'] as $error){
                                echo '<p>'.$error.'</p>';
                            }
                        }
                        ?>
                    </div>
                    <input type="submit" value="Отправить" class="btn-reset btn-default">
                </form>
            </div>
        </div>
    </main>
</body>
</html>