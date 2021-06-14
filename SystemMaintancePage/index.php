<?php
  require("../../../config.php");
  require("fnc_user.php");
  
  session_start();

  $email = "";
  
  $emailerror = "";
  $passworderror = "";
  $notice = "";
  //Login checks, email check baked in
  if(isset($_POST["submituserdata"])){
	  if (!empty($_POST["emailinput"])){
		$email = filter_var($_POST["emailinput"], FILTER_SANITIZE_EMAIL);
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);
		} else {
		  $emailerror = "Palun sisesta õige kujuga e-postiaadress!";
		}		
	  } else {
		  $emailerror = "Palun sisesta e-postiaadress!";
	  }
	  
	  //Check that password has been entered and that it isnt too short
	  if (empty($_POST["passwordinput"])){
		$passworderror = "Palun sisesta salasõna!";
	  } else {
		  if(strlen($_POST["passwordinput"]) < 8){
			  $passworderror = "Liiga lühike salasõna (sisestasite ainult " .strlen($_POST["passwordinput"]) ." märki).";
		  }
	  }
	  
	  //If no errors, then try to log in
	  if(empty($emailerror) and empty($passworderror)){
		  $notice = signin($email, $_POST["passwordinput"]);
	  }
  }

?>
<html>
<head>
	<link rel="stylesheet" href="styles.css">
</head>
<body>

<br>
<br>	
  
<!-- PAGE LOGO -->
<div class="center-logo"> <img src="../img/logo.png" alt="Logo Parimautomaat"width=300>

<!-- Login form -->
<div>
  <h3>Logi sisse</h3>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="emailinput">E-mail (kasutajatunnus):</label><br>
	  <input type="email" name="emailinput" id="emailinput" value="<?php echo $email; ?>"><span><?php echo $emailerror; ?></span>
	  <br>
	  <label for="passwordinput">Salasõna:</label>
	  <br>
	  <input name="passwordinput" id="passwordinput" type="password"><span><?php echo $passworderror; ?></span>
	  <br>
	  <br>
	  <input name="submituserdata" type="submit" value="Logi sisse"><span><?php echo "&nbsp; &nbsp; &nbsp;" .$notice; ?></span>
  </form>
  </div>

</body>
</html>
<style>
.center-input {
  margin: auto;
  width: 50%;
  padding: 10px;
  justify-content: center;
}

/*Text sizes and css */
input[type=email], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

/*Text sizes and css */
input[type=password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
</style>