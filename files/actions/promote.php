<?php
  include("connect.php");
  $userID = $_GET['promoteID'];
  $user = $_GET['promoteUser'];
  $result = $db->prepare('UPDATE Account SET AccountType_ID  = 7 WHERE Username = :User;');
  $result->execute(array('User'=>$user));
  header("Location: {$_SERVER['HTTP_REFERER']}");
  ?>
