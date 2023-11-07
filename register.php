<?php
session_start([
  'cookie_lifetime' => 3600
]);


?>

<!DOCTYPE html>
<html lang="en-US">
  <meta charset="utf-8">  
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  <link href="style.css" rel="stylesheet" type="text/css">
  <link href="btn.css" rel="stylesheet" type="text/css">
<html>
<head>
    <title>
        Авторизация
    </title>
</head>
<body class="overflow">


  <div class="registration"> Регистрация нового пользователя
        <form class="autoSERV" action="registerUser.php" method="post">
       <div class="decor">
         <div class="circle">
         </div>
        </div> 
       
                <label class="formtext">Введите ваше имя:</label>
                <input class="login" type="text" name="Name" autocomplete="off">
                <label class="formtext">Введите вашу фамилию:</label>
                <input class="login" type="text" name="Surname" autocomplete="off">
                <label class="formtext">Введите вашу почту:</label>
                <input class="login" type="text" name="email" autocomplete="off">
                <label class="formtext">Введите ваш логин:</label>
                <input class="login" type="text" name="login" autocomplete="off">
                <label class="formtext">Введите ваш пароль:</label>
                <input class="password" type="password" name="pass">
                <label class="formtext">Введите ваш пароль:</label>
                <input class="password" type="password" name="pass2">
                <button class="custom-btn btn-1"><span>Зарегистрироваться</span></button>
                
        
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