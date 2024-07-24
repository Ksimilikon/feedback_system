<?php
require '../class/classList.php';
require_once '../class/GuardHandler.php';
require '../class/func_checkArrKey.php';
GuardHandler::checkRef('/system/php/PUser/askProblem.php');

$keys = array('head', 'desc', 'log');
$count = $_POST['count'];
if($count < 0){
    $count = 0;
}
if($count > 10){
    $count = 10;
}
$idMsg;

$_SESSION['errors_askProblem']=array();
$errors = array();




if(checkArrKey($_POST, $keys[0]) < 0){
    $errors[]='Поле с заголовком пустое';
}
if(checkArrKey($_POST, $keys[1]) < 0){
    $errors[]='Поле с текстом не заполненно';
}
//ошибки от ограничений файлов

echo Auth::getId();
try{
    if (count($errors) == 0){
    $mysqli->begin_transaction();
    $mysqli->query("INSERT INTO `message` (`id_user`, `head`, `msg`)
     VALUES (".Auth::getId().", '".$_POST[$keys[0]]."', '".$_POST[$keys[1]]."');");
    $add = $mysqli->query("SELECT LAST_INSERT_ID() AS id FROM message LIMIT 0,1;");
    $mysqli->commit();
     $add=$add->fetch_object();
     $lastId=$add->id;
     echo $lastId;
     
    $tags = explode(' ', $_POST[$keys[0]]);
    $tags += explode(' ', $_POST[$keys[1]]);
    // foreach ($tags as $tag){
    //     echo $tag . " ";
    // }
        $existTag=$mysqli->query("SELECT id FROM tags WHERE tag='".$tag."'");
        $existTag=$existTag->fetch_object();
        $existTag=$existTag->id;
        $idTag;
        if(empty($existTag)){
            $mysqli->query("INSERT INTO tags (tag) VALUE('".$tag."')");
            $idTag = $mysqli->insert_id;
        }
        else{
            $idTag=$existTag;
        }
    foreach($tags as $tag){
        echo $tag;
        $mysqli->query("INSERT INTO tags (tag) VALUE('".$tag."')");
        $idTag = $mysqli->insert_id;
        $checkTag = $mysqli->query("SELECT id FROM tags WHERE tag='".$tag."'");
        $checkTag = $checkTag->fetch_object();
        if(empty($checkTag->id)){
            $mysqli->query("INSERT INTO msg_has_tags (id_msg, id_tag) VALUE ('".$lastId."', '".$idTag."')");
        }
        else{
            $mysqli->query("INSERT INTO msg_has_tags (id_msg, id_tag) VALUE ('".$lastId."', '".$checkTag->id."')");
        }
        
    }
    
    if(checkArrKey($_FILES, $keys[2])){
        $log = $_FILES[$keys[2]];
        if(true){//ограничение по размеру файла $_FILES[$keys[2]]['size']
        
        if($log['name'] != ''){
            $id = $mysqli->query('SELECT id FROM `files` ORDER BY `id` DESC LIMIT 0,1;');
            $id = $id->fetch_object();
            if(empty($id->id)){
                $id = 1;
            }
            else{
                $id = $id->id + 1;
            }
             $extension = '.' . pathinfo($log['name'], PATHINFO_EXTENSION);
             $log['name'] = $id . $extension;
             move_uploaded_file($log['tmp_name'], '../files/'.$log['name']);
             $mysqli->query("INSERT INTO `files` (id, file_path)
             VALUES (".$id.", '/system/php/files/".$log['name']."')");
             $lastIdFile = $mysqli->insert_id;
             $mysqli->query("INSERT INTO `message_has_files` (`id_message`, `id_file`)
              VALUES ('$lastId', '$lastIdFile')");
            
        }
    }
    }
    for ($i=0; $i<=$count;$i++){
        if(checkArrKey($_FILES, 'img'.$i)){
            $img = $_FILES['img'.$i];
            if(true){//ограничение по размеру
                $allowExe = array('jpg', 'jpeg', 'png');
                foreach ($allowExe as $exe){
                    if(pathinfo($img['name'], PATHINFO_EXTENSION) == $exe){//проверека расширения
                        
                        $id = $mysqli->query("SELECT id FROM `img` ORDER BY `id` DESC LIMIT 0,1;");
                        $id = $id->fetch_object();
                        if(empty($id->id)){
                            $id = 1;
                        }
                        else{
                            $id = $id->id + 1;
                        }
                        $img['name'] = $id . '.' . pathinfo($img['name'], PATHINFO_EXTENSION);
                        move_uploaded_file($img['tmp_name'], '../img/'.$img['name']);
                        $mysqli->query("INSERT INTO img (id, id_msg, path)
                        VALUES ('$id', '$lastId', '/system/php/img/".$img['name']."')");
                        

                    }
                }
            }
        }
    }
    header('Location: ../PUser/message.php?id_msg='.$lastId); 
    }  
}
catch(Exception $e){
    $errors[] = "Произошла ошибка при выполнении операции";//$e->getMessage();
    $_SESSION['errors_askProblem'] = $errors;
        echo '<br>excep '. $e->getMessage() . $e->getLine();
        header('Location: /system/php/PUser/askProblem.php');
    }

?>
<p>Загрузка</p>