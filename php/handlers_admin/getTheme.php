<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
Auth::check(20);
try{
    $result=array();
    if(checkArrKey($_POST, 'id') == 1){
    $data = $mysqli->query("SELECT themes.id, themes.theme FROM themes
    JOIN super_theme_has_theme ON themes.id=super_theme_has_theme.id_theme
    JOIN super_theme ON super_theme_has_theme.id_super_theme=super_theme.id
    WHERE super_theme.id=".$_POST['id']);
    $result += array('length'=>$data->num_rows);
    for($i=0;$i<$data->num_rows;$i++){
        $result[]=$data->fetch_assoc();
    }
    $result += array('result'=>1);
    }
    else{
        $result += array('result'=>0);
    }
    echo json_encode($result);
}
catch(Exception $e){

}
