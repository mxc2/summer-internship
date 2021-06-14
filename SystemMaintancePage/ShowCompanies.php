<?php
  //loeme andmebaasi login info muutujad
  require("../../../config.php");
  //kui kasutaja on vormis andmeid saatnud, siis salvestame andmebaasi
  require("fnc_showcompanies.php");
  
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

  $inputerror = "";
  

require("header.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- TITLE -->
<div class="center-text" id="OmnivaOutput">
	<h2>Pakiautomaatide andmebaas</h2>
</div>

<!-- Info text -->
<div class="center-text">
	<p>Mis transpordifirma andmeid soovite VAADATA?</p>
</div>
	
<!-- Select Company -->
<div class="center-text" id="AndmeteSisestamine">
	<form method="POST">
		<input type="submit" name="OmnivaClick" value="Omniva">
		<input type="submit" name="DpdClick" value="DPD">
		<input type="submit" name="ItellaClick" value="Itella">
	</form>
</div>

<br>

<!-- PARCEL COMPANY TITLE -->
<div class="center-text">
	<p>Mis transpordifirma andmeid soovite MUUTA?</p>
</div>

<!-- Buttons for user to select what company's data they want to watch -->
<div class="center-text">
	<form action="OmnivaDataMaintance.php">
		<input type="submit" value="Omniva" />
	</form>
	
	<form action="DPDDataMaintance.php">
		<input type="submit" value="DPD" />
	</form>
	
	<form action="ItellaDataMaintance.php">
		<input type="submit" value="Itella" />
	</form>
</div>

<br>
<br>
<br>

<!-- Table Output -->
<div class="center table-size">
    <?php
    if(isset($_POST['OmnivaClick'])) {
		echo "<h3 align=center>Omniva pakiautomaadid </h3> ";
        echo OmnivaOutput();
    }
	if(isset($_POST['DpdClick'])) {
		echo "<h3 align=center>DPD pakiautomaadid </h3> ";
        echo DpdOutput();
    }
    if(isset($_POST['ItellaClick'])) {
		echo "<h3 align=center>Itella pakiautomaadid </h3> ";
		echo ItellaOutput();
    }

    ?>
</div>

<br>

</body>
</html>

