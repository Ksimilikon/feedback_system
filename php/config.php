<?php
if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'We don\'t have mysqli!!!';
} 
$hostName='localhost';
$userName='root';
$password='';
$database='feedback_system';
$port=3333;
$mysqli = new mysqli($hostName, $userName, $password, $database, $port);
