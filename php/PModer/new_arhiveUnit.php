<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
require '../header.php';
Auth::check(10);
if(checkArrKey($_GET, 'id_message') != 1){
    LocationWhenError::error(9);
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/input.css">
    <script src="../../js/jquery-3.7.1.min.js" defer></script>
    <script src="../../js/newArhiveUnitTheme.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление в архив</title>
</head>
<body>
    <?php
    insertHeader('', '');
    ?>
    <main class="flex col">
        <?php include '../select_menu.php'; ?>
        <div class="block mr-t15 grid gc1-3 g-gap flex col col-center">
            <h2>Новая запись в архив</h2>
            <form action="../handlers/new_arhiveUnit.php" method="post" class="flex col col-center gap10" style="width: 70%;">
                <div class="width100p">
                    <p>*</p>
                    <input class="inp" name="head" type="text" placeholder="Заголовок" require autofocus>
                </div>
                <div class="width100p flex col gap10">
                    <p>* Выберите тему</p>
                    <select class="inp" name="superTheme" id="superTheme" require>
                        <option value="0" selected disabled>Не выбрано</option>
                        <?php
                        $superTheme = $mysqli->query("SELECT * FROM `super_theme`");
                        for($i=0;$i<$superTheme->num_rows;$i++){
                            $el = $superTheme->fetch_object();
                            echo '<option value="'.$el->id.'">'.$el->theme.'</option>';
                        }
                        ?>
                    </select>
                    <select class="inp" name="theme" id="theme" style="display: none;" require>
                        <option value="0" selected disabled>Не выбрано</option>
                    </select>
                </div>
                
                <textarea class="inp" name="text" id="" placeholder="Текст" style="resize:vertical;"></textarea>
                <input name="id_message" hidden type="text" value="<?=$_GET['id_message']?>">
                <div class="error" id="errors">
                    <?php
                    if(checkArrKey($_SESSION, 'errorsNewArhive') == 1){
                        MyError::getListErrors('errorsNewArhive');
                        $_SESSION['errorsNewArhive'] = array();
                    }
                    ?>
                </div>
                <div class="flex row row-center">
                    <input type="submit" class="btn-reset btn-default" value="Подтвердить">
                </div>
                
            </form>
        </div>
    </main>
</body>
</html>