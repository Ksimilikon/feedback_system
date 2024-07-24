<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
require '../class/GuardHandler.php';
//GuardHandler::checkRef('/system/php/PModer/message_change.php');
$_SESSION['error'] = null;
Auth::check(10);
$keys = array_keys($_POST);
foreach($keys as $key){
    if(checkArrKey($_POST, $key) != 1){
        LocationWhenError::returnBack();
    }
}
try{
    
    $mysqli->query("UPDATE `message` 
    SET `head` = '".$_POST[$keys[1]]."', `msg` = '".$_POST[$keys[2]]."' 
    WHERE `message`.`id` = ".$_POST[$keys[0]]);
    $lastId=$mysqli->insert_id;
    $tags = explode(' ', $_POST[$keys[1]]);
    $tags += explode(' ', $_POST[$keys[2]]);
    foreach($tags as $tag){
        echo $tag;
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
        
        $checkTag = $mysqli->query("SELECT id FROM tags WHERE tag='".$tag."'");
        $checkTag = $checkTag->fetch_object();
        if(empty($checkTag->id)){
            try{
               $mysqli->query("INSERT INTO msg_has_tags (id_msg, id_tag) VALUE ('".$lastId."', '".$idTag."')"); 
            }catch(Exception $e){}
            
        }
        else{
            try{
                $mysqli->query("INSERT INTO msg_has_tags (id_msg, id_tag) VALUE ('".$lastId."', '".$checkTag->id."')");
            }catch(Exception $e){}
            
        }
        
    }
    header('Location: /system/php/PModer/message.php?id_msg='.$_POST[$keys[0]]);
}
catch(Exception $e){
    echo $e->getMessage().' Line: '.$e->getLine() . "<br>";
    //LocationWhenError::error(8);
}

