<?php
require '../class/classList.php';
require '../header.php';
require '../class/func_checkArrKey.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/input.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../js/jquery-3.7.1.min.js" defer></script>
    <script src="../../js/search.js?1" defer></script>
    <title>Решенные заявки</title>
</head>
<body>
<body>
    <?php
    insertHeader('', '');
    ?>
    <main class="flex col">
        <?php include '../select_menu.php'; ?>
        <div class="block mr-t15">
            <div class="flex row width100p mr-b15 textGeneral">
                <input class="width100p inp" type="text" name="" id="searchField" placeholder="Поиск...">
                <button id="search" class="btn-reset btn-default">Поиск</button>
            </div>
            
            <div id="results" class="flex col gap10">
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

                $data = $mysqli->query("SELECT message.id, message.head, message.msg, message.time,
                CASE
                    WHEN message.status = 1 THEN '<p class=\"backColor-inherit green\">Решено</p>'
                    WHEN message.status = 0 THEN '<p class=\"backColor-inherit error\">Не решено</p>'
                END AS status
                FROM message
                WHERE message.status=1 
                ORDER BY time DESC LIMIT 7 OFFSET ".$limitRequestDown);
                $num_rows = $data->num_rows;
                ?>
                <div class="flex row space-btw">
                    <?php
                    if($numPage==1){
                        $target=$numPage+1;
                        echo '<p><<<</p>';
                        if($num_rows < 7){
                            echo '<p>>>></p>';
                        }
                        else{
                            echo '<a href="search.php?page='.$target.'">>>></a>';
                        }
                        
                    }
                    if($numPage>1){
                        
                        $targetMinus = $numPage-1;
                        $targetPlus=$numPage+1;
                        if($num_rows == 7){
                            echo '<a href="search.php?page='.$targetMinus.'"><<<</a>';
                            echo '<a href="search.php?page='.$targetPlus.'">>>></a>'; 
                        }
                        else{
                            echo '<a href="search.php?page='.$targetMinus.'"><<<</a>';
                            echo '<p>>>></p>';
                        }
                    }
                    ?>
                </div>
                <div class="flex col gap10" id="result">
                    <?php
                    for($i=0;$i<$data->num_rows;$i++){
                        $el = $data->fetch_object();
                    echo '<a href="../PUser/message.php?id_msg='.$el->id.'" class="pd10 btn-default link-reset">
                    <div class="flex row space-btw backColor-inherit">
                        <h4 class="backColor-inherit">'.$el->head.'</h4>
                        '.$el->status.'
                    </div>
                        <p class="backColor-inherit cut_strokes">'.$el->msg.'</p>
                        <p class="backColor-inherit mr-t5">'.$el->time.'</p>  
                    </a>';
                    
                    }
                    ?>
                </div>
            </div>
        </div>
        
    </main>
</body>
</html>