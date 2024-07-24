<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
require '../header.php';
require '../request/User.php';
Auth::check(10);

$unit;
$errors = 0;
if(checkArrKey($_GET, 'id_unit') != 1){
    $errors++;
    LocationWhenError::error(9);
}
else{
    $unit = $_GET['id_unit'];
}
$data = $mysqli->query("SELECT * FROM arhive WHERE id=".$unit);
$data = $data->fetch_object();
$user = new User($data->id_user);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/input.css">
    <script src="../../js/jquery-3.7.1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$data->head?></title>
</head>
<body>
    <?php
    insertHeader('', '');
    ?>
    <main class="flex col">
        <?php include '../select_menu.php'; ?>
        <div class="block backColor-block mr-t15 flex col gap15">
            <h2><?=$data->head?></h2>
            <div class="flex space-btw">
                <button class="btn-reset">
                    <a class="link-reset" href="../PGeneral/page.php?id_user=<?=$data->id_user?>">
                    От: <?=$user->getFIO()?>
                    </a></button>
                    <p class="textSmall"><?=$data->time?></p>
            </div>
            <div class="gap10 flex col" style="padding-left: 20px; padding-right: 5px">
                <?php
                if(!empty($data->text)){
                    echo '<div class="backColor-gray pd10">
                    '.$data->text.'
                    </div>';
                }
                ?>
                <a href="message.php?id_msg=<?=$data->id_message?>" class="link-reset"><button class="btn-reset btn-default">&larr;Перейти в обсуждение</button></a>
            </div>

        </div>
    </main>
</body>
</html>