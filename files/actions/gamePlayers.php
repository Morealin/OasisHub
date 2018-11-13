<?php
  include('connect.php');
  $id = $_GET['id'];
  $result = $db->prepare('UPDATE Game SET playersOnline = (playersOnline + 1) WHERE Game_ID = '.$id);
  $result->execute();
?>
