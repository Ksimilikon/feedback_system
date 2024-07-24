<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
try{
    if(checkArrKey($_POST, 'id_message')!=1){
        LocationWhenError::error(9);
    }
    else{
        $formId=$_POST['id_message'];
        $result=array();
        $data = $mysqli->query("SELECT message_add.id, users.id as user_id, users.FName, users.SName, users.TName, message_add.desc, message_add.time FROM `message_add` 
                    JOIN users ON message_add.id_user=users.id
                    WHERE message_add.id_message=".$formId."
                    ORDER BY message_add.time asc");
        for($i=0;$i<$data->num_rows;$i++){
            $result[]=$data->fetch_assoc();
        }
        echo json_encode($result);
    }
    
}
catch(Exception $e){

}
