<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
require '../header.php';

Auth::check(10);
$formId;
if(checkArrKey($_GET, 'id_msg') == 1){
    $formId = $_GET['id_msg'];
}
else{
    $_SESSION['error']=serialize(new MyError(7));
    header('Location: ../error.php');
}
$msgInfo = $mysqli->query("SELECT id_user, head, msg, status, time FROM message WHERE id=".$formId);
$msgInfo = $msgInfo->fetch_object();
$idMaker = $msgInfo->id_user;

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/input.css">
    <script src="../../js/jquery-3.7.1.js"></script>
    <script src="../../js/statusMessage.js"></script>
    <script src="../../js/update_comments.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$msgInfo->head?></title>
    <style>
        img{
            width: 50%;
        }
    </style>
</head>
<body>
    <?php
    insertHeader('', '');
    ?>
    <main class="flex col">
        <?php include '../select_menu.php'; ?>
        <div class="block backColor-block mr-t15 flex col gap15">
            <div class="flex row space-btw">
                <h2><?=$msgInfo->head?></h2>
                <select name="status" id="status" title="Статус записи измениться сразу после изменения выбора">
                    
                    <?php
                    if($msgInfo->status == 0){
                        echo '<option class="red" value="0" default>Не решена</option>';
                        echo '<option class="green" value="1">Решена</option>';
                    }
                    if($msgInfo->status == 1){
                        echo '<option class="green" value="1" default>Решена</option>';
                        echo '<option class="red" value="0">Не решена</option>';
                    }
                    ?>
                </select>
                
            </div>
            <div class="flex col">
                <div class="flex row space-btw">
                    <p>Описание</p>
                    <?=$msgInfo->time?>
                </div>
                <p class="backColor-gray pd10"><?=$msgInfo->msg?></p>
            </div>
            <div class="">
                <?php
                //Вывод файла с логами
                $logs = $mysqli->query("SELECT files.file_path, files.id FROM `message` 
                    JOIN message_has_files ON message.id=message_has_files.id_message
                    JOIN files ON message_has_files.id_file=files.id
                    WHERE message.id=".$formId);
                $data = array();
                for($i=0;$i<$logs->num_rows;$i++){
                    $data[] = $logs->fetch_object();
                }
                foreach($data as $el){
                    $name = basename($el->file_path);
                    $exe = pathinfo($name, PATHINFO_EXTENSION);
                    echo '<form action="../handlers/downloadFile.php" method="post">
                    <input type="text" name="file" value="'.$el->id.'" hidden>
                    <button><a>'."file_log.".$exe.'</a></button>
                    </form>';
                }
                ?>
                
            </div>
            <div class="">
                <?php
                //вывод фото
                $imgs = array();
                $imgData = $mysqli->query("SELECT * FROM `img` WHERE id_msg=".$formId);
                for($i=0;$i<$imgData->num_rows;$i++){
                    $img = $imgData->fetch_object();
                    echo '<img src="'.$img->path.'">';
                }
                ?>
            </div>
            <div class="flex row gap10">
            
                <?php
            if(Auth::getRole() >= 10){
                //echo "<input type='submit' value='Изменить статус' class='btn-reset btn-default'";
                
                echo '<a href="../PModer/message_change.php?id_message='.$formId.'"><button class="btn-reset btn-default">Изменить заявку</button></a>';
                echo '<a href="../PModer/message_answer.php?id_message='.$formId.'"><button class="btn-reset btn-default">Написать</button></a>';
            }
            $statusCheck = $mysqli->query('SELECT status FROM message WHERE id='.$formId);
            $statusCheck = $statusCheck->fetch_object();
            $statusCheck = $statusCheck->status;
            $existCheck = $mysqli->query("SELECT id FROM arhive WHERE id_message=".$formId);
            $existCheck = $existCheck->fetch_object();
            echo '<div class="" id="arhiveCell">';
            if($statusCheck == 1){
                if(empty($existCheck->id)){
                    echo '<a href="../PModer/new_arhiveUnit.php?id_message='.$formId.'"><button class="btn-reset btn-default">В архив</button></a>';
                }
                else{
                    echo '<a href="../PModer/arhive_unit.php?id_unit='.$existCheck->id.'"><button class="btn-reset btn-default">В архив</button></a>';
                }
                
            }
            echo '</div>';
            // if($idMaker == Auth::getId()){
            //     echo '<a href="../PUser/message_add.php?id_message='.$formId.'"><button class="btn-reset btn-default">Добавить</button></a>';
            // }
            ?>
            </div>
            
            <div class="flex col gap10" id="messages">
                
                <?php
                //вывод сообщений в заявке
                $messages = $mysqli->query("SELECT message_add.id, users.id as user_id, users.FName, users.SName, users.TName, message_add.desc, message_add.time FROM `message_add` 
                    JOIN users ON message_add.id_user=users.id
                    WHERE message_add.id_message=".$formId."
                    ORDER BY message_add.time asc");
                for($i=0;$i<$messages->num_rows;$i++){
                    $message = $messages->fetch_object();
                    echo '<div class="flex col border-t"><div class="flex row space-btw backColor-add pd-b10">
                        <b class="backColor-inherit"><a href="../PGeneral/page.php?id_user='.$message->user_id.'" class="link-reset backColor-inherit">Пользователь: '.$message->FName.' '.$message->SName. ' '.$message->TName.'</a></b>
                        <p class="backColor-inherit">'.$message->time.'</p>
                    </div>
                    <div class="mr-b10 backColor-gray pd5">
                        <p class="backColor-inherit">'.$message->desc.'</p>
                    </div></div>';
                }
                
                
                ?>
            </div>
        </div>
    </main>
</body>
</html>