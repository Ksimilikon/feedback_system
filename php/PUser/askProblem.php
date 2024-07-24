<?php
require '../class/classList.php';
require '../request/User.php';
require '../header.php';
if(empty(AUth::getId())){
    header('Location: ../PGeneral/auth_reg.php');
}
Auth::checkRole(5);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/input.css">
    <script src="../../js/jquery-3.7.1.min.js" defer></script>
    <script src="../../js/sendProblem.js" defer></script>
    <title>Сообщить о проблеме</title>
</head>
<body>
    <?php
    insertHeader('', '');
    ?>
    <main class="flex col">
        <?php include '../select_menu.php'; ?>
        <div class="block mr-t15 flex row-center">
            <form enctype="multipart/form-data" action="../handlers/new_msg.php" method="post" style="width:70%" class="textGeneral gap5 flex col col-center">
            <input type="number" name="count" id="count" value="0" hidden>
            <h3>Сообщить о проблеме</h3>
            <div class="width100p" style="font-weight:700">
                <p class="textHead2">Заголовок</p>
                <input required type="text" name="head" id="head" placeholder="Заголовок" class="inp textHead2" title="Заголовок" style="font-weight:700">
            </div>
            <div class="width100p">
                <p>Текст</p>
                <textarea required name="desc" id="desc" placeholder="Текст" style="resize: vertical;" class="inp" title="Текст"></textarea>
            </div>
            <div class="width100p" >
                <p>Загрузите файл с логами</p>
                <input type="file" name="log" class="border width100p" id="log">
            </div>
            
            <div id="imgs" class="width100p">
                <input id="add" type="button" value="+" class="btn-reset btn-default ">
                <div id="plane0" class="flex row gap5 col-center border border-radius space-btw width100p">
                    <input type="file" name="img0" id="img0" class="load" accept=".jpg, .jpeg, .png"> 
                    <p id="result0"></p>
                    <input type="button" value="-" id="clear0" class="btn-reset btn-default" style=" border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;">
                    
                </div>
            </div>
            <div id="errors" class="error flex col">
                <?php
                if(key_exists('errors_askProblem', $_SESSION)){
                    if(!empty($_SESSION['errors_askProblem'])){
                        foreach($_SESSION['errors_askProblem'] as $error){
                            echo $error;
                        }
                    }
                }
                ?>
            </div>
            <input type="submit" value="Отправить" id="send" class="btn-reset btn-default mr-t15">
            </form>
        </div>
    </main>
    
</body>
</html>