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
if (isset($_POST['users'])) { $users =  $_POST['users']; if ($users == '') { unset($users);} }
if (isset($_POST['Name'])) { $chatName =  htmlentities($_POST['Name']); if ($chatName == '') { unset($chatName);} }
if(empty($users) or empty($chatName)){
  exit('вы не добавили никого в чат или не дали чату название, вернитесь на предыдущий шаг и сделайте все правильно Т_Т');
} else {
  $result2 = "INSERT INTO `chatlist` (`chat_id`, `chatName`, `user_id`) VALUES (NULL, '$chatName', '$user')";
  mysqli_query($conn,$result2);
  $queryToFind = "SELECT chatlist.chat_id FROM chatlist WHERE chatName = '$chatName' and chatlist.user_id = $user";
  $result = mysqli_query($conn,$queryToFind);
   $row = mysqli_fetch_array($result);
     $chat_id = $row['chat_id'];
     echo 'Это мое ->'.$chat_id.'<br>';
   
  $count = count($users);
  for($i=0; $i < $count; $i++){
    $userID = $users[$i];
    $queryUsers = "INSERT INTO `partylist` (`chat_id`, `user_id`) VALUES ($chat_id, $userID)";
    mysqli_query($conn,$queryUsers);
  }

  $mainuser = "INSERT INTO `partylist` (`chat_id`, `user_id`) VALUES ($chat_id, $user)";
  mysqli_query($conn,$mainuser);
}






header("location: main.php");
?>