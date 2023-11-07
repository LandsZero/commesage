<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli("localhost","root","mysql");
$messenger = "messenger";
mysqli_select_db($conn,$messenger);

if (isset($_POST['login'])) { $login = htmlentities($_POST['login']);
   if ($login == '') { unset($login);} }
if (isset($_POST['password'])) { $password = htmlentities($_POST['password']); 
  if ($password == '') { unset($password);} }
if (empty($login) or empty($password))
{
exit ("Вы ввели не всю информацию, пожалуйста введите правильный логин и пароль");
}
$accessQuery = "SELECT users.user_id from `users` WHERE userlogin = '$login' and pass = '$password'";
$access = mysqli_query($conn,$accessQuery);
while($row = mysqli_fetch_array($access)){
  $user = $row['user_id'];
  }
    if (empty($user)) {
        exit('Логин или пароль введены неверно.');
    } else {
        $_SESSION['user_id'] = $user;
        $_SESSION['auth'] = 1;
        header("location: main.php");
    }

echo $login.$pass;
?>