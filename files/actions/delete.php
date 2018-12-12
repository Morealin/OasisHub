<?php
  include("connect.php");
  $postID = $_GET['id'];
  $result = $db->prepare('DELETE FROM Forum_Post WHERE Post_ID = '.$postID);
  $result->execute();
  header("Location: {$_SERVER['HTTP_REFERER']}");
  ?>
