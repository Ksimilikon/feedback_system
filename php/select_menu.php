<div class="flex row wrap">
    <a href="../PUser/askProblem.php"><button class="textGeneral btn-reset btn-ctrl2">Сообщить о проблеме</button></a>
    <a href="../PUser/myMsg.php"><button class="textGeneral btn-reset btn-ctrl2">Мои заявки</button></a>
    <a href="../PGeneral/search.php"><button title="Находит уже завершенные заявки" class="textGeneral btn-reset btn-ctrl2">Решено</button></a>
    <?php
    if(Auth::getRole() >= 10){
        echo '<a title="Содержит только нерешенные заявки" href="../PModer/browse.php"><button class="textGeneral btn-reset btn-ctrl2">Не решено</button></a>';
        echo '<a title="Распределенные решенные заявки" href="../PModer/arhive.php"><button class="textGeneral btn-reset btn-ctrl2">Архив</button></a>';
    }
    if(Auth::getRole() >= 20){
        echo '<a title="Поиск пользователей" href="../PAdmin/controlUsers.php"><button class="textGeneral btn-reset btn-ctrl2">Управление пользователями</button></a>';
    }
    ?>

    <!-- <a href="../PGeneral/preferences.php"><button title="Настройки аккаунта" class="textGeneral btn-reset btn-ctrl2">Настройки</button></a> -->
</div>


