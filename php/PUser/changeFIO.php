<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
require '../request/User.php';
require '../header.php';
Auth::check(5);

$user=Auth::getId();
$fio = new User($user);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/input.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../js/jquery-3.7.1.js"></script>
    <title>Изменение</title>
    <script defer>
        $(document).ready(function(){
            $("#checkBox").click(function(){
                document.getElementById('tname').toggleAttribute('disabled');
            })
        })
    </script>
    <style>
        
    </style>
</head>
<body>
    <?php
    insertHeader('', '');
    ?>
    <main class="flex col">
        <?php include '../select_menu.php'; ?>
        <div class="block mr-t15 flex col gap10 col-center">
            <h2>Изменение ФИО</h2>
            <form action="../handlers/changeFIO.php" method="post" class="flex col col-center gap15" style="width: 70%;">
                <div class="flex col gap10 width100p">
                    <div class="flex col">
                        <div class="flex row gap10">
                            <p>Текущая фамилия: </p>
                            <p>
                                <?=$fio->getSecondName()?>
                            </p>
                        </div>
                        <input value="<?=$fio->getSecondName()?>" name='SName' type="text" class="inp" placeholder="Новая фамилия">  
                    </div>
                    <div class="flex col">
                        <div class="flex row gap10">
                            <p>Текущее имя: </p>
                            <p>
                                <?=$fio->getFirstName()?>
                            </p>
                        </div>
                        <input value="<?=$fio->getFirstName()?>" name="FName" type="text" class="inp" placeholder="Новое имя">
                        
                    </div>
                    <div class="flex col">
                        <div class="flex row gap10">
                            <p>Текущее отчество: </p>
                            <p>
                                <?php
                                $tname;
                                if(empty($fio->getThirdName())){
                                    $tname='Отсутствует';
                                }
                                else{
                                    $tname = $fio->getThirdName();
                                }
                                echo $tname;
                                ?>
                            </p>
                            
                        </div>
                        <div class="">
                            <input type="checkbox" name="checkBox" id="checkBox">
                            <label for="checkBox">Оставить пустым</label>
                        </div>
                        <input value="<?=$fio->getThirdName()?>" id="tname" name="TName" type="text" class="inp" placeholder="Новое отчество">

                    </div>
                </div>
                
                <div class="error">
                    <?php
                    if(checkArrKey($_SESSION, 'errors_change_user') == 1){
                        MyError::getListErrors('errors_change_user');
                        $_SESSION['errors_change_user']=array();
                    }
                    ?>
                </div>
                <input type="submit" value="Подтвердить" class="btn-reset btn-default">
                <a href="../PUser/main.php"><input type="button" class="btn-reset btn-alert btn-default" value="Отмена"></a>

            </form>
        </div>
    </main>
</body>
</html>