<?php
require '../config.php';
require '../class/MyError.php';
session_start();
$arrayKeys=array('email', 'FName', 'SName', 'TName');
$saveData = array();
if(key_exists('saveReg', $_SESSION)){
   $data = $_SESSION['saveReg']; 
}
else{
    $data = array();
}

//echo $data['email'];

for($i=0;$i<count($arrayKeys);$i++){
    $saveData[$arrayKeys[$i]]=null;
    if(key_exists('saveReg', $_SESSION)){
        if(key_exists($arrayKeys[$i], $_SESSION['saveReg'])){
            $saveData[$arrayKeys[$i]] = $_SESSION['saveReg'][$arrayKeys[$i]];
        }
    }
}



?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/input.css">
    <script src="../../js/jquery-3.7.1.min.js" defer></script>
    <script src="../../js/validateReg.js" defer></script>
    
    <title>Регистрация</title>
</head>
<body>
    <header class="backColor-add flex row-center row col-center">
        <a href="auth.php"><button class="textGeneral btn-reset btn-ctrl">Авторизация</button></a>
    </header>
    <main class="flex row-center">
        <div class="block mr-t15 flex row-center">
            <form id="formReg" action="../handlers/reg.php" method="POST" style="width:70%" class="textGeneral gap5 flex col col-center width100p">
                <h3>Регистрация</h3>
                <div class="width100p">
                    <p>Электронная почта</p>
                    <div class="flex row width100p space-btw">
                        <input id="email" class="inp" type="email" name="email" placeholder="Электронная почта" value="<?=$saveData['email']?>" required> 
                        <input id="checkEmail" type="button" value="Проверить" class="btn-reset btn-default">
                    </div>
                </div>

                <div class="width100p">
                    <p>Имя</p>
                    <input id="FName" class="inp" type="text" name="FName" placeholder="Имя" value="<?=$saveData['FName']?>" required>
                </div>
                <div class="width100p">
                    <p>Фамилия</p>
                    <input id="SName" class="inp" type="text" name="SName" placeholder="Фамилия" value="<?=$saveData['SName']?>" required>
                </div>
                <div class="width100p">
                    <p>Отчество (если нет такогого, то оставить пустым)</p>
                    <input id="TName" class="inp" type="text" name="TName" placeholder="Отчество" value="<?=$saveData['TName']?>">
                </div>

                <div class="width100p">
                    <p>Пароль</p>
                    <input id="password" class="inp" minlength="6" maxlength="30" type="password" name="password" placeholder="Пароль" value="" required>
                </div><div class="width100p">
                    <p>Повтор пароля</p>
                    <input id="passwordR" class="inp" minlength="6" maxlength="30" type="password" name="passwordR" placeholder="Повтор пароля" value="" required>
                </div>
                <div class="width100p flex mr-b5" style="justify-content: start;">
                    <a href="" class="textSmall" style="">Авторизация</a>
                </div>

                <div class="error mr-b10 flex col" id="errors" style="justify-content: start;">
                    <p id="errorEmail"></p>
                    <?php
                    
                    if(key_exists('errors_reg', $_SESSION)){
                        
                          foreach($_SESSION['errors_reg'] as $err){
                            $err = unserialize($err);
                            echo $err->getInsertText();
                        }  
                        $_SESSION['errors_reg']=array();
                        
                    }
                    ?>
                </div>
                <input class="btn-reset btn-default" type="submit" value="Зарегистрироваться" id="send">
            </form>
        </div>
    </main>
    
</body>
</html>