<?php
require '../config.php';

try {
    $text = $_POST['text'];
    if(!empty($text)){
        $tags = explode(' ', $text); 
        $query="SELECT users.id, role.name as role, users.email, users.FName, 
        users.SName, users.TName, users.date_reg FROM `users` 
        JOIN role ON users.id_role=role.id WHERE";
        for($i=0;$i<count($tags);$i++){
           if($i==0){
               $query .= " users.id='".$tags[$i]."' OR users.email='".$tags[$i]."' OR users.FName='".$tags[$i]."' OR users.SName='".$tags[$i]."' OR users.TName='".$tags[$i]."'";
           }
           else{
               $query .= " OR users.id='".$tags[$i]."' OR users.email='".$tags[$i]."' OR users.FName='".$tags[$i]."' OR users.SName='".$tags[$i]."' OR users.TName='".$tags[$i]."'";
           }
        }
         
        $result = $mysqli->query($query);
        $res = array();
        for($i=0;$i<$result->num_rows;$i++){
            $res[] = $result->fetch_assoc();
        }
        
        if(empty($res)){
            
            echo json_encode(array("result"=>'Ничего не найденно'));
        }
        else {
            $res += array('length'=>$result->num_rows);
            $res += array('result' => '1');
            echo json_encode($res);
            //echo json_encode(array('result'=>$query));  
        }
        
    }
} 
catch (Exception $ex) {
    echo json_encode(array('result'=>'Ошибка обработки запроса'));
}