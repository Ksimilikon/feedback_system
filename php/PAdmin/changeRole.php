<?php
require '../class/classList.php';
require '../class/func_checkArrKey.php';
require '../request/User.php';
require '../header.php';
Auth::check(20);
if(checkArrKey($_GET, 'id_user') != 1){
    LocationWhenError::error(9);
}
$user=$_GET['id_user'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/input.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменение</title>
</head>
<body>
    <?php
    insertHeader('', '');
    ?>
    <main class="flex col">
        <?php include '../select_menu.php'; ?>
        <div class="block mr-t15 flex col gap10 col-center">
            <h2>Изменение роли</h2>
            <form action="../handlers_admin/changeRole.php" method="post" class="flex col col-center gap15" style="width:70%;">
                <input name="id_user" type="text" value="<?=$user?>" hidden>
                <select name="new" id="" class="inp">
                    
                    <?php
                    $roles = array();
                    $roleData = $mysqli->query('SELECT name, id FROM role');
                    for($i=0;$i<$roleData->num_rows;$i++){
                        $role = $roleData->fetch_object();
                        $roles[]=$role;
                    }
                    $selectRole = $mysqli->query("SELECT role.name FROM `users`
                    JOIN role ON users.id_role=role.id
                    WHERE users.id=".$user);
                    $selectRole = $selectRole->fetch_object();
                    foreach($roles as $role){
                        if($role->name == $selectRole->name){
                            echo '<option value="'.$role->id.'" selected disabled>'.$role->name.'</option>';
                        }
                        else{
                            echo '<option value="'.$role->id.'">'.$role->name.'</option>';
                        }
                    }
                    ?>
                </select>
                <div class="error">
                    <?php
                    if(checkArrKey($_SESSION, 'error_change_admin') == 1){
                        echo '<p>'.$_SESSION['error_change_admin'].'</p>';
                        $_SESSION['error_change_admin']= null;
                    }
                    ?>
                </div>
                <input type="submit" value="Подтвердить" class="btn-reset btn-default">
                <a href="../PAdmin/user.php?id_user=<?=$user?>"><input type="button" class="btn-reset btn-alert btn-default" value="Отмена"></a>

            </form>
        </div>
    </main>
</body>
</html>