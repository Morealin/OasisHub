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
  <a href="../index.php" class="w3-bar-item w3-button w3-padding-large defaultDark" style="text-decoration: none;" title="Oasis Hub"><img src="/OasisHub/imgs/Oasis.png" width="30px" height="30px" alt="logo"/>&nbsp;Oasis Hub</a>
  <a href="gameList.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Game List"><i class="fas fa-gamepad"></i></a>
  <div class="w3-dropdown-hover w3-hide-small w3-right">
    <?php
      if(!isset($_SESSION['Username'])) {
        ?>
        <button onclick="location.href='sign-InUp.php?type=IN'" class="w3-button w3-padding-large" title="Sign-in">Sign-in <i class="fas fa-bars"></i></button>
        <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
          <a href="sign-InUp.php?type=UP" style="text-decoration: none;" class="w3-bar-item w3-button">Sign-up</a>
        </div>
      <?php
    } else {
      ?>
      <button class="w3-button w3-padding-large" title="Account"><?php echo $_SESSION['Username']; ?> <i class="fas fa-bars"></i></button>
      <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
        <?php  $admin = $_SESSION['AccountType_ID'];
        if ($admin == "7") { ?>
        <a href="administrate.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Manage</a>
      <?php  } ?>
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
        <!-- Current Game -->
       <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">In Game?</h4>
         <hr>
         <center><p><i class="fas fa-dice w3-margin-right" style="color: #8cc159;" ></i><select type="text" name="post_game" id="Game" onchange="AddPlayer()">
           <option name="notPlay" value="">--Not Playing--</option>
           <?php
           #fetch Game List
             $gameList = $db->prepare("SELECT * FROM Game");
             $gameList->execute();
             while($list = $gameList->fetch(PDO::FETCH_ASSOC)) {
               $gameListTitle = $list['Title'];
               $gameListID = $list['Game_ID'];
             ?>
           <option name="<?php echo $gameListID; ?>" value="<?php echo $gameListID; ?>"><?php echo $gameListTitle; ?></option>
         <?php } ?>
       </select></p></center>
        </div>
      </div>
      <br>
  </div>
  <!-- End Left Column   -->
    <!-- Middle Column -->

    <div class="w3-col m7" id="posts" style="float: center;">
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h2 class="w3-opacity">Game List</h2>
            </div>
          </div>
        </div>
      </div>
      <?php
      // Fetch Game Data
      $gameQuery = $db->prepare("SELECT * FROM Game");
      $gameQuery->execute();
      while($data = $gameQuery->fetch(PDO::FETCH_ASSOC)) {
        $gameTitle = $data['Title'];
        $gamePlayers = $data['playersOnline'];
        $gameDesc = $data['Description'];
        $gameID = $data['Game_ID'];
        ?>
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <h4><?php echo $gameTitle; ?></h4> <p style="font-size: 11px;"><?php echo 'Players Online: '.$gamePlayers; ?></p>
        <hr class="w3-clear">
        <p><?php echo $gameDesc; ?></p>
        <div class="w3-row-padding" style="margin:0 -16px">
        </div>
        <button onclick="location.href='gameForum.php?id=<?php echo $gameID; ?>'" value="<?php echo $gameID; ?>" class="btn defaultColor btn-hover w3-margin-bottom"><i class="fas fa-book"></i> Forum</button>
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
