<?php
include("connect.php");

  $Description = $_GET['comment_desc'];
  $postID = $_GET['postID'];
  $user = $_GET['user'];

    $result = $db->prepare("INSERT INTO OasisHub.Comment (Post_ID, Description, Comment_Username)
                                  VALUES (:id,:Descrip,:User);");
    $result->execute(array('id'=>$postID,'Descrip'=>$Description,'User'=>$user));
?>
