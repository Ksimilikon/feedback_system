<?php
    require '../class/classList.php';
    require '../header.php';
    require '../class/func_checkArrKey.php';
    if(empty(Auth::getId())){
        header('Location: ../PGeneral/auth_reg.php');
    }

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мои заявки</title>
</head>
<body>
    
    <?php
    insertHeader('', '');
    ?>
    <main class="flex col">
        <?php include '../select_menu.php'; ?>
        <div class="block flex col gap15 textGeneral mr-t15">
           
            <?php
                $numPage = 1;
                if(checkArrKey($_GET, 'page') == 1){
                    $numPage=$_GET['page'];
                    if($numPage < 1){
                        $numPage=1;
                    }
                }
                echo '<h2>Страница '.$numPage.'</h2>';
                $limitRequestDown = 7 * ($numPage-1);

                $data = $mysqli->query("SELECT head, msg, id, status, time FROM message WHERE id_user=".Auth::getId()." 
                ORDER BY time DESC LIMIT 7 OFFSET ".$limitRequestDown);
                $num_rows = $data->num_rows;
                ?>
                <div class="flex row space-btw">
                    <?php
                if($numPage==1){
                    $target=$numPage+1;
                    echo '<p><<<</p>';
                    if($num_rows<7){
                         echo '<p>>>></p>';
                    }
                    else{
                        echo '<a href="myMsg.php?page='.$target.'">>>></a>';
                    }
                    
                }
                if($numPage>1){
                    
                    $targetMinus = $numPage-1;
                    $targetPlus=$numPage+1;
                    if($num_rows == 7){
                        echo '<a href="myMsg.php?page='.$targetMinus.'"><<<</a>';
                        echo '<a href="myMsg.php?page='.$targetPlus.'">>>></a>'; 
                    }
                    else{
                        echo '<a href="myMsg.php?page='.$targetMinus.'"><<<</a>';
                        echo '<p>>>></p>';
                    }
                }
                ?>
                </div>
                <?php

                for($i=0; $i<$data->num_rows;$i++){
                    $el = $data->fetch_object();
                    $status;
                    if($el->status == 1){
                        $status = '<p class="backColor-inherit green">Решено</p>';
                    }
                    else{
                        $status = '<p class="backColor-inherit error">Не решено</p>';

                    }
                    echo '<a href="message.php?id_msg='.$el->id.'" class="pd10 btn-default link-reset">
                        <div class="flex row space-btw backColor-inherit">
                            <h4 class="backColor-inherit">'.$el->head.'</h4>
                            '.$status.'
                        </div>
                        <p class="backColor-inherit cut_strokes">'.$el->msg.'</p>
                        <p class="backColor-inherit mr-t5 ">'.$el->time.'</p>  
                        </a>';
                }
                if($data->num_rows == 0){
                    echo 'Здесь пока пусто';
                }
            ?>
        </div>
    </main>
</body>
</html>