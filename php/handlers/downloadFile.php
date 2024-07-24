<?php
require '../class/classList.php';

$idFile = $_POST['file'];
$dataFile = $mysqli->query("SELECT file_path FROM `files` WHERE id=".$idFile);
$dataFile = $dataFile->fetch_object();

$name = basename($dataFile->file_path);
$exe = pathinfo($name, PATHINFO_EXTENSION);
header('Content-Disposition: attachment; filename='.'file_log.'.$exe);
readfile('../files/'.$name);
exit;
?>