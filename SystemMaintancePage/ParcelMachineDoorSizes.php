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
  
require("header.php");
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<form>

<!-- TITLE -->
<div class="center-text" id="OmnivaOutput">
	<h2>Pakiautomaatide uste suurused ja hind</h2>
</div>

<!-- Link to edit data -->
<div class="center-text">
	<p><a href="EditParcelMachineDoorSizes.php">Muuda andmebaasis olevaid andmeid</a></p>
</div>

<!-- Output from fnc_showcompanies.php the transport companies info from database -->
<div class="center table-size" id="OmnivaOutput">
    <?php 
      echo DoorSizeOutput(); 
    ?>
</div>

<!-- Link to edit data -->
<div class="center-text">
	<p><a href="EditParcelMachineDoorSizes.php">Muuda andmebaasis olevaid andmeid</a></p>
</div>

</body>
</html>

