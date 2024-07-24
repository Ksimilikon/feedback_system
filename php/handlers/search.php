<?php
require '../config.php';

try {
   $text = $_POST['text'];
   if(!empty($text)){
      $tags = explode(' ', $text); 
      $query="SELECT message.id, message.head, message.msg FROM message 
        JOIN msg_has_tags ON message.id=msg_has_tags.id_msg
        JOIN tags ON msg_has_tags.id_tag=tags.id
        WHERE (";
      for($i=0;$i<count($tags);$i++){
          if($i==0){
              $query .= 'tags.tag ="'.$tags[$i].'"';
          }
          else{
              $query .= ' OR tags.tag ="'.$tags[$i].'"';
          }
      }
      $query.=') AND message.status=1'; 
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
      }
      
   }
} 
catch (Exception $ex) {
    echo json_encode(array('result'=>'Ошибка обработки запроса'));
}