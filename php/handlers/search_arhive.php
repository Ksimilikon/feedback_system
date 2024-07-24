<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
Auth::check(10);
$errors=0;

$idTheme;
$page;
$str;

$offset = 0;
try{
    if(checkArrKey($_POST, 'idTheme') == 1){
        $idTheme=PrepareForSQL::stroke($_POST['idTheme']);
    }else{$errors++;}
    if(checkArrKey($_POST, 'page') == 1){
        $page=PrepareForSQL::stroke($_POST['page']);
        if($page<1){
            $page=1;
        }
        $offset=7*($page-1);
    }else{$errors++;}
    if(checkArrKey($_POST, 'str') == 1){
        $str=PrepareForSQL::stroke($_POST['str']);
    }else{$errors++;}

    if($errors==0){
        $result = array();
        
        $tags=array();
        foreach(explode(' ', $str) as $tag){
            $tags[]=trim($tag);
        }
        $query='SELECT arhive.id, arhive.head, arhive.text, arhive.time FROM `arhive` 
        JOIN arhive_has_themes ON arhive.id=arhive_has_themes.id_arhive
        JOIN themes ON arhive_has_themes.id_theme=themes.id
        JOIN arhive_has_tags ON arhive.id=arhive_has_tags.id_arhive
        JOIN tags ON arhive_has_tags.id_tag = tags.id 
        WHERE themes.id='.$idTheme;
        for($i=0;$i<count($tags);$i++){
            if(count($tags) == 1){
                $query.=' AND (tags.tag="'.$tags[$i].'")';
            }
            else{
                if($i==0){
                    $query.=' AND (tags.tag="'.$tags[$i].'"';
                }
                else{
                    $query.=' OR tags.tag="'.$tags[$i].'"';
                }
                if((count($tags)-1)==$i){
                $query.=')';
                }
            }
        }
        $query.=' GROUP BY arhive.id LIMIT 7 OFFSET '.$offset;
        //echo $query;
        $data = $mysqli->query($query);
        $result+=array('length'=>$data->num_rows);
        $resultRequest;
        for($i=0;$i<$data->num_rows;$i++){
            $resultRequest[]=$data->fetch_assoc();
        }
        if(empty($resultRequest)){
            $result = array('result'=>'Ничего не найдено', 'status'=>1);
        }
        else{
            $result+=array('status'=>1);
            $result+=$resultRequest;
        }
        echo json_encode($result);
    }
    else{
        echo json_encode(array('status'=>0));
    }
}
catch(Exception $e){
    echo json_encode(array('status'=>-1));
}