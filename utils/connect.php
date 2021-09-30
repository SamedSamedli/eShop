<?php
$user = 'username';
$password = 'pass';
$db = 'db';
$host = 'mysql.zzz.com.ua';
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