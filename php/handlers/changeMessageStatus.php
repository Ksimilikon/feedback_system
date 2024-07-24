<?php
try{
   require '../class/classList.php';
$status = $_POST['status'];
$id = $_POST['id'];
$mysqli->query("UPDATE `message` SET `status` = ".$status." WHERE `message`.`id` = ".$id); 
echo json_encode(array('s'=>1));
}
catch(Exception $e){
    //echo json_encode(array('s'=>$e->getMessage()));
    echo json_encode(array('s'=>0));

}