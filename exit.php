<?php
session_start();
$_SESSION['auth'] = 0;
$_SESSION['chat'] = 0;
header("location: index.php");
?>