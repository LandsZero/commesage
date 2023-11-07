<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli("localhost","root","mysql");
$messenger = "messenger";
mysqli_select_db($conn,$messenger);

$login = $_SESSION['login'] = htmlentities($_POST['login']);
$pass = $_SESSION['pass'] = htmlentities($_POST['password']);

$accessQuery = "SELECT users.user_id from `users` WHERE userlogin = '$login' and pass = '$pass'";
$access = mysqli_query($conn,$accessQuery);
while($row = mysqli_fetch_array($access)){
$user = $row['user_id'];
}

$_SESSION['user_id'] = $user;
$_SESSION['auth'] = 1;
header("location: main.php");

?>