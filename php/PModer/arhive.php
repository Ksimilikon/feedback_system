<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
require '../header.php';
Auth::check(10);
$supertheme = $mysqli->query("SELECT * FROM super_theme");

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/input.css">
    <link rel="stylesheet" href="../../css/grid.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../js/jquery-3.7.1.min.js" defer></script>
    <script src="../../js/arhive.js" defer></script>
    <title>Архив</title>
</head>
<body>
    <?php
    insertHeader('', '');
    ?>
    <main class="flex col">
        <?php include '../select_menu.php'; ?>
        <div class="block mr-t15 grid gc1-3 g-gap">
            <div class="g-col1">
                <h3 class="textHead3">Темы</h3>
                <div class="flex col">
                    <?php
                    if (Auth::getRole() == 20){
                        echo '<a href="../PAdmin/editTheme.php"><button class="btn-default btn-reset">Редактировать</button></a>';

                        //echo '<a href="new_superTheme.php"><button class="btn-default btn-reset">Добавить глобальную тему</button></a>';
                        //echo '<a href="new_theme.php"><button class="btn-default btn-reset border-t">Добавить подтему</button></a>';
                    }
                    ?>
                </div>
                
                
                <div class="flex col gap5 scroll vh60">
                    
                    <?php
                        for($i=0;$i<$supertheme->num_rows;$i++){
                            $super=$supertheme->fetch_object();
                            $themes = $mysqli->query("SELECT themes.id, themes.theme FROM themes
                            JOIN super_theme_has_theme ON themes.id=super_theme_has_theme.id_theme
                            JOIN super_theme ON super_theme_has_theme.id_super_theme=super_theme.id
                            WHERE super_theme.id=".$super->id);
                            echo '<div class="">
                                <h5>'.$super->theme.'</h5>
                                    <select name="" id="" class="inp">
                                        <option value="" disabled selected></option>';
                                        for($j=0;$j<$themes->num_rows;$j++){
                                            $theme = $themes->fetch_object();
                                            echo '<option value="'.$theme->id.'">'.$theme->theme.'</option>';
                                        }
                            echo '</select>
                                </div>';
                        }
                    ?>
                    
                </div>
            </div>
            <div class="g-col2">
                <div class="flex row width100p mr-b15 textGeneral">
                    <input title="Поиск осуществляется по выбранной теме" class="width100p inp" type="text" name="" id="searchField" placeholder="Поиск...">
                    <button id="search" class="btn-reset btn-default">Поиск</button>
                </div>
                
                <h2 id="selectedTheme" class="mr-b10">Выберите тему</h2>
                <div class="flex row space-btw mr-b10">
                    <button id="minusPage" class="btn-reset btn-default" style="cursor:pointer;"><<<</button>
                    <p id="countPage">1</p>
                    <button id="plusPage" class="btn-reset btn-default" style="cursor:pointer;">>>></button>
                </div>
                <div class="flex col gap10" id="results">
                    ...
                </div>
            </div>
        </div>
    </main>
</body>
</html>