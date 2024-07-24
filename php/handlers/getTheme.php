<?php
require '../class/classList.php';
try{
    if(!empty($_POST['superTheme'])){
        $result = array('result'=>1);
        $super = $_POST['superTheme'];
        $data = $mysqli->query("SELECT themes.id, themes.theme FROM `themes` 
        JOIN super_theme_has_theme ON themes.id=super_theme_has_theme.id_theme
        JOIN super_theme ON super_theme_has_theme.id_super_theme=super_theme.id
        WHERE super_theme.id=".$super);
        $num_rows=$data->num_rows;
        $result+=array('length'=>$num_rows);
        for($i=0;$i<$data->num_rows;$i++){
            $result[]= $data->fetch_assoc();
        }
        echo json_encode($result);
    }
}
catch(Exception $e){
    json_encode(array('result'=>0));
}