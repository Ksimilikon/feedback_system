<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
require '../header.php';
Auth::check(20);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/input.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../js/jquery-3.7.1.min.js" defer></script>
    <script src="../../js/search_users.js?1" defer></script>
    <title>Управление пользователями</title>
</head>
<body>
    <?php
    insertHeader('', '');
    ?>
    <main class="flex col">
        <?php include '../select_menu.php'; ?>
        <div class="block mr-t15">
            <div class="flex row width100p mr-b15 textGeneral">
                <input title="Можно вводить имя, фамилию, отчество, id, email" class="width100p inp" type="text" name="" id="searchField" placeholder="Поиск...">
                <button id="search" class="btn-reset btn-default">Поиск</button>
            </div>
            
            <div id="results" class="flex col gap10">
            <?php
            $numPage = 1;
                if(checkArrKey($_GET, 'page') == 1){
                    $numPage=$_GET['page'];
                }
                echo '<h2>Страница '.$numPage.'</h2>';
                $limitRequestDown = 7 * ($numPage-1);

                $query = "SELECT users.id, role.name as role, users.email, users.FName, users.SName, users.TName, users.date_reg FROM `users` 
                JOIN role ON users.id_role=role.id
                WHERE users.id != ".Auth::getId()." LIMIT 7 OFFSET ".$limitRequestDown;
                $data = $mysqli->query($query);
                $num_rows = $data->num_rows;
                ?>
                <div class="flex row space-btw">
                    <?php
                    if($numPage==1){
                        $target=$numPage+1;
                        echo '<p><<<</p>';
                        echo '<a href="controlUsers.php?page='.$target.'">>>></a>';
                    }
                    if($numPage>1){
                        
                        $targetMinus = $numPage-1;
                        $targetPlus=$numPage+1;
                        if($num_rows == 7){
                            echo '<a href="controlUsers.php?page='.$targetMinus.'"><<<</a>';
                            echo '<a href="controlUsers.php?page='.$targetPlus.'">>>></a>'; 
                        }
                        else{
                            echo '<a href="controlUsers.php?page='.$targetMinus.'"><<<</a>';
                            echo '<p>>>></p>';
                        }
                    }
                    ?>
                </div>
                
                
                <?php
                for($i=0;$i<$data->num_rows;$i++){
                    $el = $data->fetch_object();
                echo '<a href="../PAdmin/user.php?id_user='.$el->id.'" class="pd10 btn-default link-reset flex col textGeneral">
                <p class="backColor-inherit">id: '.$el->id.'</p>
                <p class="backColor-inherit">Роль: '.$el->role.'</p>
                <div class="flex row space-btw backColor-inherit">
                    <div class="flex row gap10 backColor-inherit">
                        <p class="backColor-inherit">'.$el->SName.'</p>
                        <p class="backColor-inherit">'.$el->FName.'</p>
                        <p class="backColor-inherit">'.$el->TName.'</p>   
                    </div>
                    '.$el->date_reg.'
                </div>
                <p class="backColor-inherit">'.$el->email.'</p></a>';
                }
            ?>
            </div>
        </div>
    </main>
</body>
</html>