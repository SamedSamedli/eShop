<?php
session_start();
if (!isset($_SESSION['balance'])) {
    $_SESSION['balance'] = 100;
}
error_reporting(E_ERROR | E_PARSE);
?>
