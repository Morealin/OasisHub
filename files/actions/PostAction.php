<?php
include("connect.php");
  $Title = $_GET['post_title'];
  $Game = $_GET['post_game'];
  $Description = $_GET['post_desc'];
    $result = $db->prepare("INSERT INTO OasisHub.Forum_Post (Post_Username, Game_ID, Title, Description, Helpful)
                                  VALUES (:User,:Game,:Title,:Descrip,:Help);");
    $result->execute(array('User'=>'Syl','Game'=>$Game,'Title'=>$Title,'Descrip'=>$Description,'Help'=>0));
?>
