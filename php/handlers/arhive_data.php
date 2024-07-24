<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
try{
    if((checkArrKey($_POST, 'idTheme') !=1 ) && (checkArrKey($_POST, 'page') != 1)){
        LocationWhenError::error(9);
    }
    else{
        $idTheme=$_POST['idTheme'];
        $page =$_POST['page'];
        $offset = 7*($page-1);
        $query = "SELECT arhive.id, arhive.head, arhive.text, arhive.time FROM `arhive`
        JOIN arhive_has_themes ON arhive.id=arhive_has_themes.id_arhive
        JOIN themes ON arhive_has_themes.id_theme=themes.id
        WHERE themes.id=".$idTheme." ORDER BY time DESC LIMIT 7 OFFSET ".$offset;
        $data = $mysqli->query($query);
        $num_rows= $data->num_rows;
        $res = array();
        for($i=0;$i<$data->num_rows;$i++){
            $res[] = $data->fetch_assoc();
        }
        
        if(empty($res)){
            
            echo json_encode(array("result"=>'Ничего не найдено'));
        }
        else {
            $res += array('length'=>$data->num_rows);
            $res += array('result' => '1');
           echo json_encode($res); 
        }
    }
}
catch(Exception $e){
    echo $e->getMessage();
}
exit;