<?php
session_start([
  'cookie_lifetime' => 360
]);


?>

<!DOCTYPE html>
<html lang="en-US">
  <meta charset="utf-8">  
  <link href="style.css" rel="stylesheet" type="text/css">
  <link href="btn.css" rel="stylesheet" type="text/css">
<html>
<head>
    <title>
        Авторизация
    </title>
</head>
<body>
  <div class="autorization"> Пожалуйста, пройдите авторизацию
        <form class="autoSERV" action="login.php" method="post">
       <div class="decor">
         <div class="circle">
         </div>
        </div>
              <label class="formtext">Введите ваш логин:</label>
              <input class="login" type="text" name="login" autocomplete="off">
              <label class="formtext">Введите ваш пароль:</label>
              <input class="password1" type="password" name="password">
              <input class="custom-btn btn-2" type="submit" value="Войти">
              <a href="/firstweb/register.php">
                <input class="custom-btn btn-2" type="button" value="Зарегистрироваться"></a>
      </form>
</div>
<p class="invis">
<?php


    if ($_SESSION['auth'] == 1) {
      header("location: main.php");
      
    }



?>
</p>
  </body>
</html>