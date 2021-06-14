<?php
  require("../../../config.php");
  require("fnc_user.php");
  
  $email = "";
  $emailerror = "";
  $passworderror = "";
  $confirmpassworderror = "";
  $notice = "";
  
  //When user presses submit
  if(isset($_POST["submituserdata"])){
	  
	  //Check email input and if it is empty then notify. Otherwise turn it into a variable
	  if (!empty($_POST["emailinput"])){
		$email = ($_POST["emailinput"]);
	  } else {
		  $emailerror = "Palun sisesta e-postiaadress!";
	  }
	  
	  //Check password input and if it is empty then notify. If it is too short then notify too
	  if (empty($_POST["passwordinput"])){
		$passworderror = "Palun sisesta salasõna!";
	  } else {
		  if(strlen($_POST["passwordinput"]) < 8){
			  $passworderror = "Liiga lühike salasõna (sisestasite ainult " .strlen($_POST["passwordinput"]) ." märki).";
		  }
	  }
	  
	  //Check password input and if it is empty then notify. If the passwords don't match, then notify
	  if (empty($_POST["confirmpasswordinput"])){
		$confirmpassworderror = "Palun sisestage salasõna kaks korda!";  
	  } else {
		  if($_POST["confirmpasswordinput"] != $_POST["passwordinput"]){
			  $confirmpassworderror = "Sisestatud salasõnad ei olnud ühesugused!";
		  }
	  }
	  
	  //Check if everything has been entered and if there have been no errors. If that is true, then make a new account
	  if(empty($emailerror) and empty($passworderror) and empty($confirmpassworderror)){
		$result = signup($email, $_POST["passwordinput"]);

		if($result == "ok"){
			$email = null;
			$notice = "Kasutaja loomine õnnestus!";
		} else {
			$notice = "Kahjuks tekkis tehniline viga: " .$result;
		}
	  }
  }
  
  require("header.php");

?>
<html>
<head>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- TITLE -->
  <div class="center-text"><h1>Uue kasutajakonto loomine</h1></div>

<!-- Inputs to make account -->
  <div class="center-input">
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	  <label for="emailinput">E-mail (kasutajatunnus):</label><br>
	  <input type="email" name="emailinput" id="emailinput" value="<?php echo $email; ?>"><span><?php echo $emailerror; ?></span>
	  <br>
	  <br>
	  <label for="passwordinput">Salasõna (min 8 tähemärki):</label>
	  <br>
	  <input name="passwordinput" id="passwordinput" type="password"><span><?php echo $passworderror; ?></span>
	  <br>
	  <br>
	  <label for="confirmpasswordinput">Korrake salasõna:</label>
	  <br>
	  <input name="confirmpasswordinput" id="confirmpasswordinput" type="password"><span><?php echo $confirmpassworderror; ?></span>
	  <br>
	  <br>
	  <input name="submituserdata" type="submit" class="green-color submit" value="Loo kasutaja"><span><?php echo "&nbsp; &nbsp; &nbsp;" .$notice; ?></span>
	</form>
	</div>
  <br>
  <hr>
  <br>
 
<!-- SHOW ALL CREATED ACCOUNTS -->
  <div class="center-text"><h1>Süsteemis olevad kontod:</h1></div>
  <div class="center table-size"> <p><?php echo AccountsOutput(); ?></p> </div>
  
</body>
</html>