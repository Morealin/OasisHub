<?php
  include('connect.php');
  $user = $_GET['user'];
  $pass = $_GET['pass1'];
  $email = $_GET['email'];
  $fname = $_GET['fname'];
  $lname = $_GET['lname'];

  $sameUser = false;
  $sameEmail = false;
  $userCheckQuery = $db->prepare("SELECT * FROM Account;");
  $userCheckQuery->execute();
  while($list = $userCheckQuery->fetch(PDO::FETCH_ASSOC)) {
      if ($user == $list['Username']) {
          $sameUser = true;
      } else if ($email == $list['Email']) {
        $sameEmail = true;
      }
  }
  if ($sameUser) {
      echo "Username already taken.";
  } else if ($sameEmail) {
      echo "Email already in use.";
  } else {
    $passCrypt = crypt($pass,'$6$rounds=6666$ShaumIsAGreatBoiAndSoIsMike$');

  $result = $db->prepare("INSERT INTO OasisHub.Account (AccountType_ID,Fname,Lname,Username,Password,Email)
                              VALUES (:AccType,:Fname,:Lname,:User,:Pass,:Email);");
  $result->execute(array('AccType'=>8,'Fname'=>$fname,'Lname'=>$lname,'User'=>$user,'Pass'=>$passCrypt,'Email'=>$email));
  echo "signup";
}
?>
