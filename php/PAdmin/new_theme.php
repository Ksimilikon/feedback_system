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
    <title>Добавление подтемы</title>
</head>
<body>
    <?php
    insertHeader('', '');
    ?>
    <main class="flex col">
        <?php include '../select_menu.php'; ?>
        <div class="block mr-t15 flex col col-center">
            <form class="width70p flex col col-center gap10" action="../handlers/new_theme.php" method="post">
                <h2>Добавление подтемы</h2>
                <div class="width100p">
                    <h5>Выберите глобальную тему</h5>
                    <select name="superTheme" id="" class="inp">
                        <option value="0" selected disabled>Не выбрано</option>
                        <?php
                        $data = $mysqli->query('SELECT * FROM `super_theme`');
                        for($i=0;$i<$data->num_rows;$i++){
                            $el = $data->fetch_object();
                            echo '<option value="'.$el->id.'">'.$el->theme.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <input name="theme" type="text" class="inp" placeholder="Название подтемы" require>
                <?php
                    if(checkArrKey($_SESSION, 'errorTheme') == 1){
                        echo '<div class="error"';
                        MyError::getListErrors('errorTheme');
                        $_SESSION['errorTheme']=array();
                        echo '</div>';
                    }
                    ?>
                </div>
                <div class="flex row row-center">
                    <input class="btn-reset btn-default" type="submit" value="Добавить">
                </div>
                
            </form>
        </div>
    </main>
</body>
</html>