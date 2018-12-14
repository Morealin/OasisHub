<?php
include("connect.php");

$description = $_GET['game_desc'];
$title = $_GET['game_title'];
$sameTitle = false;

$gameQuery = $db->prepare("SELECT * FROM Game");
$gameQuery->execute();
while($list = $gameQuery->fetch(PDO::FETCH_ASSOC)) {
    if ($title == $list['Title']) {
        $sameTitle = true;
    }
}

if ($sameTitle) {
  echo "This game already exists in the database.";
} else {
  $result = $db->prepare("INSERT INTO OasisHub.Game (Title, Description, playersOnline)
                                VALUES (:Title,:Descrip,:Online);");
  $result->execute(array('Title'=>$title,'Descrip'=>$description,'Online'=>0));
  echo "";
}
?>
