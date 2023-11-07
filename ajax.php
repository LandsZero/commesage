<?php
session_start();
error_reporting(E_ALL);
$pass = "mysql";
$user = "root";
$messenger = "messenger";
$dbh = new PDO('mysql:host=localhost;dbname=messenger', $user, $pass) ;
date_default_timezone_set('Europe/Moscow');
$chatID = $_SESSION['chat'];
$dateDate = date('Y-m-d');
$dateTime = date('H:i:s');



if (!isset($_GET['action'])) {
  $start = ($_GET['start']) ? $_GET['start'] : 0;
  $queryM = "SELECT messagelist.message_id, users.Name, users.Surname, contents.content, messagelist.dateCreated, messagelist.timeCreated FROM `users`,`contents`, `messagelist`, `chatlist` WHERE messagelist.chat_id = chatlist.chat_id and users.user_id = messagelist.user_id and contents.message_id = messagelist.message_id and messagelist.chat_id = $chatID and messagelist.message_id > $start ORDER BY `message_id` LIMIT 50" ;
  try {
    $result = $dbh->query($queryM)->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($result);
  }
  catch(PDOException $e){
    echo "<pre>" ;print_r($result); echo "</pre>";
    $this->error($e->getMessage());
  }
  
} elseif ($_GET['action'] == 'add_message') {
  $message = ($_POST['message']);
  $user_id = ($_POST['user_id']);
  $queryM = "INSERT INTO `messagelist` (`message_id`, `chat_id`, `user_id`, `dateCreated`, `timeCreated`, `status`) VALUES 
  (NULL, '$chatID', '$user_id', '$dateDate', '$dateTime', '');";
  $queryM2 = "INSERT INTO `contents` (`message_id`, `content`) VALUES (NULL, '$message')";
  try {
    $result = $dbh->exec($queryM);
    echo json_encode($result);
    $result = $dbh->exec($queryM2);
    echo json_encode($result);
    header('Content-Type: application/json; charset=utf-8');
  }
  catch(PDOException $e){
    echo "<pre>" ;print_r($result); echo "</pre>";
  }
}


?>