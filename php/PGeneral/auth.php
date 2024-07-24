<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/input.css">
    <title>Авторизация</title>
</head>
<body>
<header class="backColor-add flex row-center row col-center">
        <a href="reg.php"><button class="textGeneral btn-reset btn-ctrl">Регистрация</button></a>
    </header>
    <main class="flex row-center">
        <div class="block mr-t15 flex row-center">
            <form action="../handlers/auth.php" method="post" style="width:70%" class="textGeneral gap5 flex col col-center width100p">
                <h3>Авторизация</h3>
                <div class="width100p">
                    <p>Электронная почта</p>
                    <input class="inp" type="email" name="email" placeholder="Электронная почта" value="">
                </div>
                <div class="width100p">
                    <p>Пароль</p>
                    <input class="inp" type="password" name="password" placeholder="Пароль">
                </div>
                <div class="width100p flex space-btw mr-b5">
                    <a href="reg.php" class="textSmall">Регистрация</a>
                    <a href="" class="textSmall">Забыли пароль</a>
                </div>
                <div class="error mr-b10 flex col" id="errors" style="justify-content: start;">
                <?php
                if(checkArrKey($_SESSION, 'errorsLogin') == 1){
                    MyError::getListErrors('errorsLogin');
                    $_SESSION['errorsLogin']=array();
                }
                ?>
                </div>
                <input type="submit" name="" id="send" value="Войти" class="btn-reset btn-default texthead2">
            </form>
        </div>
    </main>
</body>
</html>