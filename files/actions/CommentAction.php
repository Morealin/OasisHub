<?php
include("connect.php");

if(isset($_POST['CommentButton'])) {
  $Description = $_POST['comment_desc'];
  $postID = $_POST['postID'];

if($Description == null) {
    echo "Please make a comment before commenting.";
    include("{$_SERVER['HTTP_REFERER']}");
  } else {
    $result = $db->prepare("INSERT INTO OasisHub.Comment (Post_ID, Description, Comment_Username)
                                  VALUES (:id,:Descrip,:User);");
    $result->execute(array('id'=>$postID,'Descrip'=>$Description,'User'=>'Syl'));
    header("Location: {$_SERVER['HTTP_REFERER']}");
  }
}
?>
