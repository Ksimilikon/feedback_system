<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
Auth::check(10);
$sessionKey = 'errorsNewArhive';
$_SESSION[$sessionKey] = array();
$errors = array();

$head;
$text = null;
$id_message;
$theme;
$keys = array('head', 'text', 'id_message', 'theme');
if(checkArrKey($_POST, $keys[0]) != 1){
    $errors[] = MyError::getTextError(9).': Заполните поле с заголовком';
}
if(checkArrKey($_POST, $keys[0]) == 1){
    $head = PrepareForSQL::stroke($_POST[$keys[0]]);
}
else{
    $errors[] = 'Заполните поле с заголовком';
}
if(checkArrKey($_POST, $keys[1]) == 1){
    $text = PrepareForSQL::stroke($_POST[$keys[1]]);
}
else{
    $text = null;
}
if(checkArrKey($_POST, $keys[2]) == 1){
    $id_message=PrepareForSQL::stroke($_POST[$keys[2]]);
}
else{
    $errors[] = MyError::getTextError(9);
}
if(checkArrKey($_POST, $keys[3]) == 1){
    $theme = PrepareForSQL::stroke($_POST[$keys[3]]);
}
else{
    $errors[] = MyError::getTextError(9).': Тема не выбрана';
}

//проверка статуса
$statusCheck = $mysqli->query("SELECT status FROM message WHERE id=".$id_message);
$statusCheck = $statusCheck->fetch_object();
if($statusCheck->status == 0){
    $errors[] = 'Заявка имеет статус "Не решена"';
}
$existCheck = $mysqli->query("SELECT id FROM arhive WHERE id_message=".$id_message);
$existCheck = $existCheck->fetch_object();
if(!empty($existCheck->id)){
    $errors[] = 'Заявка уже есть в архиве';
}
// //запись
if(count($errors) == 0){
    //request
    try{
        $lastIdArhive;
        if($text == null){
            $mysqli->query("INSERT INTO `arhive` (`id_user`, `id_message`, `head`, `text`) 
            VALUES ('".Auth::getId()."', '".$id_message."', '".$head."', NULL)");
            $lastIdArhive=$mysqli->insert_id;
        }
        else{
            $mysqli->query("INSERT INTO `arhive` (`id_user`, `id_message`, `head`, `text`) 
            VALUES ('".Auth::getId()."', '".$id_message."', '".$head."', '".$text."')");
            $lastIdArhive=$mysqli->insert_id;
        }
        $mysqli->query("INSERT INTO `arhive_has_themes` (`id_arhive`, `id_theme`) 
        VALUES ('".$lastIdArhive."', '".$theme."')");
        $tags;
        foreach(explode(' ', $head) as $tag){
            $tags[] = trim($tag);
        }
        if($text!=null){
            foreach(explode(' ', $text) as $tag){
                $tags[] = trim($tag);
            }
        }
        foreach($tags as $tag){
            $check = $mysqli->query('SELECT id FROM tags WHERE tag="'.$tag.'"');
            $check=$check->fetch_object();
            if(empty($check->id)){
                $mysqli->query("INSERT INTO tags (tag) VALUES ('".$tag."')");
                $idTag=$mysqli->insert_id;
                $mysqli->query("INSERT INTO `arhive_has_tags` (`id_arhive`, `id_tag`) 
                VALUES ('".$lastIdArhive."', '".$idTag."')");
            }
            else{
                $mysqli->query("INSERT INTO `arhive_has_tags` (`id_arhive`, `id_tag`) 
                VALUES ('".$lastIdArhive."', '".$check->id."')");
            }
        }
        
        Location::location('/system/php/PModer/arhive_unit.php?id_unit='.$lastIdArhive);
    }
    catch(Exception $e){
        LocationWhenError::error(8);
    }
}
else{
    $_SESSION[$sessionKey] = $errors;
    LocationWhenError::returnBack();
}