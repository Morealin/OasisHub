<?php
include('connect.php');
//include("/OasisHub/files/sign-InUp.php?type=IN");
session_start();

$user = $_POST['sign_user'];
$pass1 = $_POST['sign_pass1'];
$sameUser = false;


$userCheckQuery = $db->prepare("SELECT * FROM Account;");
$userCheckQuery->execute();
while($list = $userCheckQuery->fetch(PDO::FETCH_ASSOC)) {
    if ($user == $list['Username']) {
        $sameUser = true;
        $checkAccType = $list['AccountType_ID'];
        $checkUser = $list['Username'];
        $checkPass = $list['Password'];
        $checkFName = $list['Fname'];
        $checkLName = $list['Lname'];
        $checkEmail = $list['Email'];
    }
}
$passCrypt = crypt($pass1,'$6$rounds=6666$ShaumIsAGreatBoiAndSoIsMike$');
if ($sameUser) {
  if ($checkPass == $passCrypt) {
      $_SESSION['AccountType_ID'] = $checkAccType;
      $_SESSION['Username'] = $checkUser;
      $_SESSION['Fname'] = $checkFName;
      $_SESSION['Lname'] = $checkLName;
      $_SESSION['Email'] = $checkEmail;
      header("Location: /OasisHub/files/Account.php");
  } else {
    echo "<script>
        alert('Username or Password is Incorrect! Please Try Again!');
        window.location.href = '/OasisHub/files/sign-InUp.php?type=IN';
    </script>";
  }
} else {
  echo "<script>
      alert('Username or Password is Incorrect! Please Try Again!');
      window.location.href = '/OasisHub/files/sign-InUp.php?type=IN';
  </script>";
  //header("Location: {$_SERVER['HTTP_REFERER']}");
}

 ?>
