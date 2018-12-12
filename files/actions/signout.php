<?php

  session_start();
  if(isset($_GET['signout'])) {
    unset($_SESSION['']);
    unset($_SESSION['AccTypeID']);
    unset($_SESSION['Username']);
    unset($_SESSION['Fname']);
    unset($_SESSION['Lname']);
    unset($_SESSION['Email']);
    session_destroy();
    header('Location: /OasisHub/index.php');
  }

 ?>
