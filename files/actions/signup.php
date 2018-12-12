<?php
  include('connect.php');
  $user = $_GET['user'];
  $pass = $_GET['pass1'];
  $email = $_GET['email'];
  $fname = $_GET['fname'];
  $lname = $_GET['lname'];



//echo $user;

  $result = $db->prepare("INSERT INTO OasisHub.Account (AccountType_ID,Fname,Lname,Username,Password,Email)
                              VALUES (:AccType,:Fname,:Lname,:User,:Pass,:Email);");
  $result->execute(array('AccType'=>5,'Fname'=>$fname,'Lname'=>$lname,'User'=>$user,'Pass'=>$pass,'Email'=>$email));

?>
