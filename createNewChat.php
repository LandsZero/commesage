<?php
session_start();

$conn = new mysqli("localhost","root","mysql");
$messenger = "messenger";
mysqli_select_db($conn,$messenger);
$user = $_SESSION['user_id'];
if (!$user ) {
  header("location: index.php");
  $_SESSION['auth'] = 0;
}
if ($_SESSION['auth'] == 0) {
  header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en-US">
  <meta charset="utf-8">  
  <link href="style.css" rel="stylesheet" type="text/css">
  <link href="btn.css" rel="stylesheet" type="text/css">
<html>
<head>
  <title>
        Создание нового чата
  </title>
      </head>
        <body class="overflow">
                 <div class="menu"> 
             <p class="aMenu">Настройки</p>
             <a href="main.php" class="aMenu"><p class="pMenu">Диалоги</p></a>
             <a href="exit.php" class="aMenu"><p class="pMenu">Выход</p> </a>
           </div>
          <div class="createNewChat">
              <div class="mainContentOfCreateChat">
                Тут вы сможете создать себе новый чат
              </div>
              <form action="createAChat.php" method="POST">
                <p class="labelOfCreateChat">Введите имя канала:</p>
                <p><input class="buttonOfCreateChat" type="text" name="Name" autocomplete="off"></p>
                <?php
                $query = "SELECT * FROM users";
                $result = mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($result)){
                  $user_id = $row['user_id'];
                  $name = $row['Name'];
                  $surname = $row['Surname'];
                  $login = $row['userlogin'];
                  echo ('<p class="usersDatas">'.$user_id.". Имя и Фамилия: ".$name." ".$surname.". Логин: ".$login.'<input class="check" type="checkbox"'),("name='users[]' value=$user_id>".'</p>');

                }
                
                ?>
                
                <p class="chatbtn"><button class="custom-btn btn-1"><span>Зарегистрироваться</span></button></p>
              </form>
          </div>
       </body>
      </html>