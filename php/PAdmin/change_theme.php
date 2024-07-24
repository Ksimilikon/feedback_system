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
    <script src="../../js/jquery-3.7.1.js" defer></script>
    <script src="../../js/get_theme.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменение подтемы</title>
</head>
<body>
    <?php
    insertHeader('', '');
    ?>
    <main class="flex col">
        <?php include '../select_menu.php'; ?>
        <div class="block mr-t15 flex col col-center">
            <form class="width70p flex col col-center gap10" action="../handlers_admin/change_theme.php" method="post">
                <h2>Изменение подтемы</h2>
                <div class="width100p">
                    <h5>Выберите глобальную тему</h5>
                    <select name="superTheme" id="superTheme" class="inp">
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
                <select name="theme" id="theme" class="inp" style="display: none;">
                    <option value="0" selected disabled>Не выбрано</option>
                </select>
                <input name="change" type="text" class="inp" placeholder="Новое название темы" require>
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