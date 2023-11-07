<?php 
$conn = new mysqli("localhost","root","mysql");
$messenger = "messenger";
mysqli_select_db($conn,$messenger);

if (isset($_POST['Name'])) { $name =  htmlentities($_POST['Name']); if ($name == '') { unset($name);} }
if (isset($_POST['Surname'])) { $surname = htmlentities($_POST['Surname']); if ($surname == '') { unset($surname);} }
if (isset($_POST['email'])) { $email = htmlentities($_POST['email']); if ($email == '') { unset($email);} }
if (isset($_POST['pass'])) { $password = htmlentities($_POST['pass']); if ($password == '') { unset($password);} }
if (isset($_POST['pass2'])) { $password2 = htmlentities($_POST['pass2']); if ($password2 == '') { unset($pass2);} }
if (isset($_POST['login'])) { $login = htmlentities($_POST['login']); if ($login == '') { unset($login);} }
if (empty($login) or empty($password) or empty($name) or empty($surname) or empty($email) )
{
exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
    $login = htmlspecialchars($login);
    $password = htmlspecialchars($password);
    $password2 = htmlspecialchars($password2);
    $login = trim($login);
    $password = trim($password);
    $password2 = trim($password2);
    $check = "SELECT users.userlogin FROM users WHERE users.userlogin = '$login'";
    $result = mysqli_query($conn,$check);
    $row = mysqli_fetch_array($result);

    if (!empty($row)){
      exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
    if ($password == $password2){
      $result2 = "INSERT INTO `users` (`user_id`, `Name`, `Surname`, `userlogin`, `mail`, `pass`) VALUES (NULL, '$name', '$surname', '$login','$email','$password')";
      mysqli_query($conn,$result2);
    } else {
      exit("Введенные вами пароли не совпадают, проверьте их написание");
    }
    

header("location: index.php");
?>