<?php
session_start();

$conn = new mysqli("localhost","root","mysql");
$messenger = "messenger";
mysqli_select_db($conn,$messenger);
$user = $_SESSION['user_id'];
$userH = $_SESSION['user_id'];
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
  <link href="icomoon/style.css" rel="stylesheet" type="text/css">
<html>
<head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>
        Диалоги
    </title>
</head>
<body>
<?php

?>



  <div class="menu"> 
    <p class="aMenu">Настройки</p>
    <p class="aMenu">Диалоги</p>
    <a href="exit.php" class="aMenu"><p class="pMenu">Выход</p> </a>
  </div>
<div class="mainInterface">
  <div class="users">
   <a href="createNewChat.php"> <button class="users1">Создать новый чат</button> </a>
  <?php
 
  $query = "SELECT chatlist.chatName, chatlist.chat_id FROM `partylist`,
  `chatlist` WHERE partylist.chat_id = chatlist.chat_Id 
  and partylist.user_id = $user";

  $result = mysqli_query($conn,$query);
  while($row = mysqli_fetch_array($result)){
    $chatName = $row['chatName'];
    $chatID = $row['chat_id'];
    echo ('<form action="changeChatId.php" method="post">'),("<input class='invis' type='text' name='chatID' value= $chatID>"),('<button class="users1"'), ("id = $chatName></form>"); ?>
    <?php 
    $queryCountUsers = "SELECT COUNT(chat_id) FROM `partylist` WHERE chat_id = '$chatID'";
    $userCount = mysqli_query($conn,$queryCountUsers);
    while($row = mysqli_fetch_array($userCount)) {
    $countUsers = $row["COUNT(chat_id)"];
    }
if ($countUsers == 2) {
  $queryNameSurname = "SELECT users.Name, users.Surname FROM `users`,`partylist`,`chatlist` WHERE users.user_id != $user and partylist.chat_id = $chatID and partylist.chat_id = chatlist.chat_id and users.user_id = partylist.user_id";
        $NameSurname = mysqli_query($conn,$queryNameSurname);
          while($row = mysqli_fetch_array($NameSurname)) {
           $txtName = $row['Name'];
           $txtSurname = $row['Surname'];
            echo $txtName," ", $txtSurname;
            
      }
} else {
       echo $chatName;
}
    echo '</button>';

    date_default_timezone_set('Europe/Moscow');
    $date = date('Y-m-d');
    $timeDate = date('H:i:s');
}
    ?>
    



  </div>
  <div class="message" id="message">
    <div class="messages_content">
      <div class="dataPers">

      </div>
    </div>
            <form id="chat-message-send">
              <input class="insertContent" type="text" name="message" autocomplete="off" id="message_text" placeholder="Пожалуйста, введите ваше сообщение...">
              <button class="icon-compass" type="submit" value="Отправить">
            </form>

    




      <script>
        let autoScroll = true;
        

        let user_id = <?php echo $user; ?>
        
        console.log(user_id)

        $(document).ready(function() {

          let start = 0;
         
          setInterval(loadMessages, 1000);


          function loadMessages(chatID) {

          
                 $.ajax({
                 method: "POST",
                 url: "ajax.php?start="+start,
                 dataType: 'json',
                 error: function(XMLHttpRequest, textStatus, errorThrown) {
                  console.log(XMLHttpRequest);
                }
                   })
               .done(function( data ) {
                 //console.log(data);
                 data.forEach(item=> {

                   $( '.messages_content' ).append( renderMessage(item) );
                   start = item.message_id;
                   //console.log(start);
                 })
                   });
                   if (autoScroll)
                  {
                   $('.messages_content').animate({scrollTop: $('.messages_content')[0].scrollHeight })
                   }
                   
        }
      });
      <?php
      $queryToMessage = "SELECT users.Name, users.Surname FROM users WHERE users.user_id = $user";
      $NameSurname = mysqli_query($conn,$queryToMessage);
          $rows = mysqli_fetch_array($NameSurname);
           $messageName = $rows['Name'];
           $messageSurname = $rows['Surname'];
      
      ?>
      let usernamesurname = "<?php echo "$messageName"." "."$messageSurname" ?>"

      

        function renderMessage(item) {

          if (usernamesurname == item.Name + ' ' + item.Surname) {
            return `<div class = "contentmyself">
                             <p> ${item.Name}  ${item.Surname}  ${item.dateCreated}   ${item.timeCreated}</p>
                             <p> ${item.content} </p>
                   </div>
            `;
          } else {
            return `<div class = "contentenem">
                             <p> ${item.Name}  ${item.Surname}  ${item.dateCreated}   ${item.timeCreated}</p>
                             <p> ${item.content} </p>
                   </div>
            `;
          }
        }
          //Добавление сообщений
        $('#chat-message-send').submit(function(e){

            $.post( "ajax.php?action=add_message", {
              message: $('#message_text').val(),
              user_id: user_id,

            }).done(function( data ) {
              $('#message_text').val('');
              autoScroll = true;
              alert(отправлено);
              
            
            });

            return false;

            
        })
        

        let scrollPos = 0;
        $('.messages_content').scroll(function () {
          let st = $(this).scrollTop();
          if (st > scrollPos) {
            let a = $('.messages_content')[0].scrollHeight;
            let b = $('.messages_content').scrollTop( ) + $('.messages_content').innerHeight( ) + 5;
            if (a <= b ) {
              autoScroll = true;
            }
          } else {
            autoScroll = false;
          }
          scrollPos = st;
        });





      </script>
  </div>


</div>
 

</body>
</html>