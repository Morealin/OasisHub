<?php
    include('connect.php');
    $id=$_GET['id'];
    $result = $db->prepare('UPDATE Forum_Post SET Helpful += 1 WHERE Post_ID = '.$id);
    header('Location: /Oasishub/index.php');
 ?>
