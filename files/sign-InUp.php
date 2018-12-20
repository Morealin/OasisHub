<?php
 include('actions/connect.php');
session_start();
  ?>
<!DOCTYPE html>
<html>
<title>Oasis Hub</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="/OasisHub/imgs/Oasis_icon.ico">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
.defaultColor {
  background-color: #a9f364;
}
.defaultDark {
  background-color: #8cc159;
}
.btn-hover:hover {
  background-color: #8cc159;
}

</style>
<body class="" style="background-color: white;">

<!-- Navbar -->
<div class="w3-top" >
 <div class="w3-bar w3-left-align w3-large defaultColor">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="/OasisHub/index.php" class="w3-bar-item w3-button w3-padding-large defaultDark" style="text-decoration: none;" title="Oasis Hub"><img src="/OasisHub/imgs/Oasis.png" width="30px" height="30px" alt="logo"/>&nbsp;Oasis Hub</a>
  <a href="gameList.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Game List"><i class="fas fa-gamepad"></i></a>
  <div class="w3-dropdown-hover w3-hide-small w3-right">
    <?php
      if(!isset($_SESSION['Username'])) {
        ?>
        <button onclick="location.href='sign-InUp.php?type=IN'" class="w3-button w3-padding-large" title="Sign-in">Sign-in <i class="fas fa-bars"></i></button>
        <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
          <a href="sign-InUp.php?type=UP" onclick="singup()" style="text-decoration: none;" class="w3-bar-item w3-button">Sign-up</a>
        </div>
      <?php
    } else {
      ?>
    <button class="w3-button w3-padding-large" title="Account"><?php echo $_SESSION['Username']; ?> <i class="fas fa-bars"></i></button>
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="Account.php" style="text-decoration: none;" class="w3-bar-item w3-button">Profile</a>
      <a href="actions/signout.php?signout=signout" style="text-decoration: none;" class="w3-bar-item w3-button">Sign Out</a>
    </div>
  <?php } ?>
  </div>
 </div>
</div>
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
  </div>
  <!-- End Left Column   -->
    <!-- Middle Column -->

    <div class="w3-col m7" style="margin-left: 25%; width:35%;" id="posts" style="float: center;">

      <?php if (isset($_SESSION['Username'])) { ?>
        <div class="w3-row-padding">
          <div class="w3-col m12">
            <div class="w3-card w3-round w3-white">
              <div class="w3-container w3-padding">
                  <h2 class="w3-opacity">Sign-In</h2>
                  <h4 id="err" style="color:red;">Please Sign Out before trying to sign into acnother account.</h4>
              </div>
            </div>
          </div>
        </div>
    <?php } else if($_GET['type'] == 'IN') { ?>
        <div class="w3-row-padding">
          <div class="w3-col m12">
            <div class="w3-card w3-round w3-white">
              <div class="w3-container w3-padding">
                <form action="actions/signin.php" method="post" name="signin">
                  <h2 class="w3-opacity">Sign-In</h2>
                  <h4 id="err" style="color:red;"></h4>
                  <table>
                			<tr>
                				<td>Username:</td>
                				<td><input type="text" id="sign_user" name="sign_user" placeholder="Username...">
                				</td>
                			</tr>
                			<tr>
                				<td>Password:</td>
                				<td><input type="password" id="sign_pass1" name="sign_pass1" placeholder="Password...">
                				</td>
                			</tr>
                		</table>
                  <button type="submit" name="signin_btn" class=" btn defaultColor btn-hover w3-right">Sign-In</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    <?php   } else { ?>

      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
                <h2 class="w3-opacity">Sign-Up</h2>
                <h4 id="err" style="color:red;"></h4>
                <table>
              			<tr>
              				<td>Username:</td>
              				<td><input type="text" id="sign_user" placeholder="Username...">
              				</td>
              			</tr>
              			<tr>
              				<td>Password:</td>
              				<td><input type="password" id="sign_pass1" placeholder="Password...">
              				</td>
              			</tr>
              			<tr>
              				<td>Retype Password: </td>
              				<td><input type="password" id="sign_pass2" placeholder="Password..." >
              				</td>
              			</tr>
                    <tr>
              				<td>First Name: </td>
              				<td><input type="text" id="sign_fname" placeholder="First Name..." >
              				</td>
              			</tr>
                    <tr>
              				<td>Last Name: </td>
              				<td><input type="text" id="sign_lname" placeholder="Last Name..." >
              				</td>
              			</tr>
                    <tr>
              				<td>Email: </td>
              				<td><input type="text" id="sign_email" placeholder="Email..." >
              				</td>
              			</tr>
              		</table>
                <button onclick="signup()" name="signup_btn" class=" btn defaultColor btn-hover w3-right">Sign-Up</button>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <!-- End Middle Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-col m2"> <!--
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Upcoming Events:</p>
          <img src="/w3images/forest.jpg" alt="Forest" style="width:100%;">
          <p><strong>Holiday</strong></p>
          <p>Friday 15:00</p>
          <p><button class="w3-button w3-block w3-theme-l4">Info</button></p>
        </div>
      </div>
      <br>

      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Friend Request</p>
          <img src="/w3images/avatar6.png" alt="Avatar" style="width:50%"><br>
          <span>Jane Doe</span>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i></button>
            </div>
          </div>
        </div>
      </div>
      <br>

      <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
        <p>ADS</p>
      </div>
      <br>

      <div class="w3-card w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>

     End Right Column -->
    </div>

  <!-- End Grid -->
  </div>

<!-- End Page Container -->
</div>
<br>

<!-- Footer -->

<footer class="w3-container">
  <center style="color: grey;"><p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p></center>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
// CurrentGame UPDATE
function AddPlayer() {
  var gameid = document.getElementById('Game').value;
  $.ajax({
    type: 'GET',
    url: "actions/gamePlayers.php",
    data: {id: gameid}
  })
}
// Sign-in / Sign-up
function signin() {
  /*var user = document.getElementById('sign_user').value;
  var pass1 = document.getElementById('sign_pass1').value;
  if (user == "" || pass1 == "") {
    document.getElementById('err').innerHTML = "Please fill out all of the fields!";
  } else {
  $.ajax({
    type: "GET",
    url: "files/actions/signin.php",
    data: {user: user, pass1: pass1}
  })
  window.location.href = "/OasisHub/files/Account.php";
}*/
}
function signup() {
  var user = document.getElementById('sign_user').value;
  var pass1 = document.getElementById('sign_pass1').value;
  var pass2 = document.getElementById('sign_pass2').value;
  var fname = document.getElementById('sign_fname').value;
  var lname = document.getElementById('sign_lname').value;
  var email = document.getElementById('sign_email').value;
  var emailMatch = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  if (user == "" || pass1 == "" || pass2 == "" || fname == "" || lname == "" || email == "") {
    document.getElementById('err').innerHTML = "Please fill out all of the fields!";
  } else if (pass1 != pass2){
    document.getElementById('err').innerHTML = "Passwords Do Not Match!";
  }  else if (!emailMatch.test(email)) {
    document.getElementById('err').innerHTML = "Invalid Email Address!";
  } else if (user.length > 45 || user.length < 5) {
    document.getElementById('err').innerHTML = "Username Must be between 5 and 45 Characters!";
  } else if (pass1.length > 20 || pass1.length < 5) {
    document.getElementById('err').innerHTML = "Password must be between 5 and 20 Characters!";
  } else {
  $.ajax({
    type: "GET",
    url: "actions/signup.php",
    data: {user: user, pass1: pass1, email: email, fname: fname, lname: lname},
    success: function(response) {
      if (response == "signup") {
          window.location.href = "sign-InUp.php?type=IN";
      } else {
      document.getElementById('err').innerHTML = response;
    }
    }
  })
}
}
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else {
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className =
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>
