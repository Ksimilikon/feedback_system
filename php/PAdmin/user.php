<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
require '../request/User.php';
require '../header.php';
Auth::check(20);
if(checkArrKey($_GET, 'id_user') != 1){
    LocationWhenError::error(9);
}
$user=new User($_GET['id_user']);
$id_user = '?id_user='.$_GET['id_user'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/input.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?=$user->getFIO()?></title>
</head>
<body>
<?php
    insertHeader('', '');
    ?>
    <main class="flex col">
        <?php include '../select_menu.php'; ?>
        <div class="block mr-t15 flex col gap10" id="container">
            <div class="mr-b10 gap10 flex col">
                <div class="flex row gap15">
                    <p>Фамилия:</p>
                    <p class="forChangeField" id="SName"><?=$user->getSecondName()?></p>
                    <a href="changeSName.php<?=$id_user?>"><button class="btn-reset btn-default">Изменить</button></a>
                </div>
                <div class="flex row gap15">
                    <p>Имя:</p>
                    <p class="forChangeField" id="FName"><?=$user->getFirstName()?></p>
                    <a href="changeFName.php<?=$id_user?>"><button class="btn-reset btn-default">Изменить</button></a>
                </div>
                <div class="flex row gap15">
                    <?php
                    $TName;
                    if(empty($user->getThirdName())){
                        $TName='Отсутствует';
                    }
                    else{
                        $TName=$user->getThirdName();
                    }
                    ?>
                    <p>Отчество:</p>
                    <p class="forChangeField" id="TName"><?=$TName?></p>
                    <a href="changeTName.php<?=$id_user?>"><button class="btn-reset btn-default">Изменить</button></a>
                </div>
            </div>
            <div class="flex col gap10">
                <div class="flex row gap15">
                    <?php
                    $role= $mysqli->query("SELECT name FROM role WHERE id=".$user->getRole().' LIMIT 1');
                    $role=$role->fetch_object();
                    $role=$role->name;
                    ?>
                    <p>Роль:</p>
                    <p class="forChangeField" id="role"><?=$role?></p>
                    <a href="changeRole.php<?=$id_user?>"><button class="btn-reset btn-default">Изменить</button></a>
                </div>
                <div class="flex row gap15">
                    <p>Электронная почта:</p>
                    <p class="forChangeField" id="email"><?=$user->getEmail()?></p>
                    <a href="changeEmail.php<?=$id_user?>"><button class="btn-reset btn-default">Изменить</button></a>
                </div>
                <div class="flex row gap15">
                    <p class="forChangeField" id="password">Пароль</p>
                    <a href="changePassword.php<?=$id_user?>"><button class="btn-reset btn-default">Изменить</button></a>
                </div>
                <div class="flex row gap15">
                    <p>Дата регистрации: <?=$user->getDateReg()?></p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>