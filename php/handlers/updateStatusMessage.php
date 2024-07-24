<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
Auth::check(10);
try{
    if(checkArrKey($_POST, 'id') == 1){
        $query="SELECT status FROM message WHERE id=".$_POST['id'];
            $data = $mysqli->query($query);
            $data = $data->fetch_assoc();
            echo json_encode($data+array('result'=>1));
    }
    else{
        echo json_encode(array('result'=>-1));
    }
    
}  
catch(Exception $e){
        echo json_encode(array('result'=>0));
        //LocationWhenError::error(8);
    }
exit;