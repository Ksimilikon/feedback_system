<?php
require '../class/classList.php';

try {
    $page = $_POST['page'];
    if(empty($page)){
        $page=1;
    }
    if($page<1){
        $page=1;
    }
    $offset = 7 * ($page - 1);
      $query = "SELECT message.id, message.head, message.msg, message.time,
                CASE
                    WHEN message.status = 1 THEN '<p class=\"backColor-inherit green\">Решено</p>'
                    WHEN message.status = 0 THEN '<p class=\"backColor-inherit error\">Не решено</p>'
                END AS status
                FROM message
                WHERE message.status=0 
                ORDER BY time DESC LIMIT 7 OFFSET ". $offset;
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
catch (Exception $ex) {
    echo json_encode(array('result'=>'Ошибка обработки запроса'));
}