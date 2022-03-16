<?php
$user = 'root';
$password = '';
$db = 'eshop';
$host = '127.0.0.1';
$port = 3306;

$link = mysqli_init();
$success = mysqli_real_connect(
   $link,
   $host,
   $user,
   $password,
   $db,
   $port
);
?>