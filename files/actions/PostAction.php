<?php
include("connect.php");

if(isset($_POST['PostButton'])) {
  $Title = $_POST['post_title'];
  $Game = $_POST['post_game'];
  $Description = $_POST['post_desc'];

  if ($Title == null) {
    echo "Please give your Post a title.";
    include("../Post.php");
  } elseif($Game == null) {
    echo "Please select a game subject";
    include("../Post.php");
  } elseif($Description == null) {
    echo "Please put content in your post";
    include("../Post.php");
  } else {
    $result = $db->prepare("INSERT INTO OasisHub.Forumn_Post (Username, Game_ID, Title, Description, Helpful)
                                  VALUES (:User,:Game,:Title,:Descrip,:Help);");
    $result->execute(array('User'=>'Syl','Game'=>$Game,'Title'=>$Title,'Descrip'=>$Description,'Help'=>0));
    header('Location: /OasisHub/index.php');
  }
}
?>
