<?php
  require("../../../config.php");
  require("fnc_user.php");
  
  //Start
  session_start();
  
  //Check if person logged in
  if(!isset($_SESSION["userid"])){
	  header("Location: index.php");
  }
  //Moving them out
  if(isset($_GET["logout"])){
	  session_destroy();
	   header("Location: index.php");
	   exit();
  }
  $email = "";
  
  $emailerror = "";
  $passworderror = "";
  $newpassworderror = "";
  $newpassworderror2 = "";
  $AllErrors = "";
  $notice = "";
  
  //When user presses submit, has email check baked in
  if(isset($_POST["submituserdata"])){
	  if (!empty($_POST["emailinput"])){
		$email = filter_var($_POST["emailinput"], FILTER_SANITIZE_EMAIL);
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);
		} else {
		  $emailerror = "TÄHELEPANU! Palun sisesta õige kujuga e-postiaadress!";
		}		
	  } else {
		  $emailerror = "TÄHELEPANU! Palun sisesta e-postiaadress!";
	  }
	  
	  //Check that old password has been entered
	  if (empty($_POST["passwordinput"])){
		$passworderror = "TÄHELEPANU! Te ei sisestanud vana parooli!";
	  }
	  
	  //Check that new password has been entered and that it isnt too short
	  if (empty($_POST["newpasswordinput"]) or empty($_POST["newpasswordinput2"])){
		$AllErrors = "TÄHELEPANU! Te ei sisestanud parooli!";
	  } else {
		  if(strlen($_POST["newpasswordinput"]) < 8){
			  $AllErrors = "TÄHELEPANU! Liiga lühike uus parool. Palun sisestage parool mis on vähemalt 8 tähte pikk.";
		  }
	  }
	  
	  //Check that passwords match
	  if (($_POST["newpasswordinput"] != $_POST["newpasswordinput2"])) {
		$AllErrors = "TÄHELEPANU! Paroolid ei ühti!";
	  }
	  //Check that if no errors then change password
	  elseif(empty($emailerror) and empty($passworderror) and empty($newpassworderror)){
		  $notice = newpassword($email, $_POST["passwordinput"], $_POST["newpasswordinput"]);
	  }
  }

require("header.php");
?>
<head>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<html>

<!-- TITLE -->
<div class="center-text"><h1>Muuda parool</h1></div>
  
<!-- Inputs for user -->
<div class="center-input">
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="emailinput">E-mail (kasutajatunnus):</label><br>
	  <input type="email" name="emailinput" id="emailinput" value="<?php echo $email; ?>"><span><?php echo $emailerror; ?></span>
	  <br>
	  <label for="passwordinput">Vana parool:</label>
	  <br>
	  <input name="passwordinput" id="passwordinput" type="password"><span><?php echo $passworderror; ?></span>
	  <br>
	  <label for="passwordinput">Uus parool:</label>
	  <br>
	  <input name="newpasswordinput" id="newpasswordinput" type="password"><span><?php echo $newpassworderror; ?></span>
	  <br>
	  <label for="passwordinput">Uus parool: (korrata)</label>
	  <br>
	  <input name="newpasswordinput2" id="newpasswordinput2" type="password"><span><?php echo $newpassworderror2; ?></span>
	  <br>
	  <br>
	  <input name="submituserdata" type="submit" class="green-color submit" value="Muuda parool">
	  <div class="failure"><p><?php echo $AllErrors; ?></p></div>
  </form>
</div>

</body>
</html>