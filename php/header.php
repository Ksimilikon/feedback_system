<?php
function insertHeader(string $linkLeftArrow, string $linkRightArrow){
    echo '
    <header class="backColor-add flex space-btw row col-center">
        <div class="flex row gap5 backColor-add">
            <a style="display: none" href="'.$linkLeftArrow.'"><button class="textGeneral btn-reset btn-ctrl">&larr;</button></a>
            <a style="display: none" href="'.$linkRightArrow.'"><button class="textGeneral btn-reset btn-ctrl">&rarr;</button></a>
        </div>

        <a href="../PUser/main.php"><button class="textGeneral btn-reset btn-ctrl">На главную</button></a>
        <a href="../handlers/exit.php"><button class="textGeneral btn-reset btn-ctrl btn-alert">Выйти</button></a>


    </header>';
}