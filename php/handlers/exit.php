<?php
session_start();
$_SESSION = array();
session_destroy();
header('Location: ../PGeneral/auth_reg.php');
?>