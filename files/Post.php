<?php  include('actions/connect.php');  ?>
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
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Games"><i class="fas fa-gamepad"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Forum"><i class="fas fa-book-open"></i></a>
  <div class="w3-dropdown-hover w3-hide-small w3-right">
    <button class="w3-button w3-padding-large" title="Account">Username <i class="fas fa-bars"></i></button>
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="#" style="text-decoration: none;" class="w3-bar-item w3-button">Profile</a>
      <a href="#" style="text-decoration: none;" class="w3-bar-item w3-button">Sign Out</a>
    </div>
  </div>
 </div>
</div>
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
        <!-- Profile -->
       <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">Are you playing?</h4>
         <hr>
         <p> <i class="fas fa-dice w3-margin-right" style="color: #8cc159;" ></i> Current Game</p>
        </div>
      </div>
      <br>
  </div>
  <!-- End Left Column   -->
  <!-- Middle Column -->

  <div class="w3-col m7" style="float: center;">

    <div class="w3-row-padding">
      <div class="w3-col m12">
        <div class="w3-card w3-round w3-white">
          <div class="w3-container w3-padding">
            <h2 class="w3-opacity">Create Your Own Post</h2>
            <form action="actions/PostAction.php"method="post" name="PostForm">
              <table>
            			<tr>
            				<td>Title</td>
            				<td>&emsp;<input type="text" name="post_title" placeholder="Title">
            				</td>
            			</tr>
            			<tr>
            				<td>Game Subject</td>
            				<td>&nbsp;&nbsp;
                      <select type="text" name="post_game">
                        <?php
                        #fetch Game List
                    			$postQuery = $db->prepare("SELECT * FROM Game");
                    			$postQuery->execute();
                    			while($data = $postQuery->fetch(PDO::FETCH_ASSOC)) {
                    				$game = $data['Title'];
                            $gameID = $data['Game_ID'];
                    		  ?>
                        <option name="<?php echo $gameID; ?>" value="<?php echo $gameID; ?>"><?php echo $game; ?></option>
                      <?php } ?>
                      </select>
            				</td>
            			</tr>
            			<tr>
            				<td>Description</td><br>
            				<td>&emsp;<textarea rows="10" cols="60" type="textarea" name="post_desc" placeholder="Description..." ></textarea>
            				</td>
            			</tr>
            		</table>
              <button type="submit" class=" btn defaultColor btn-hover w3-right" name="PostButton"> Post</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!-- End Middle Column -->
  <!-- End Page Container -->
  </div>
  <br>

  <!-- Footer -->

  <footer class="w3-container">
    <center style="color: grey;"><p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p></center>
  </footer>

  <script>
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
