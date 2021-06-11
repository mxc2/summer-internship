<?php
  //loeme andmebaasi login info muutujad
  require("../../../config.php");
  //kui kasutaja on vormis andmeid saatnud, siis salvestame andmebaasi
  require("fnc_showcompanies.php");

  $inputerror = "";
  
  if(isset($_POST["datasubmit"])){
	if(empty($inputerror)){
		writefilm($_POST["lat"], $_POST["lon"], $_POST["maakond"], $_POST["vald"], $_POST["linn"], $_POST["aadress"], $_POST["postiindeks"], $_POST["keskus"], $_POST["lisainfo"]);
		$inputerror .= "Saadetud ";
	}
  }

if(isset($_POST["datadelete"])){
	if(empty($inputerror)){
		OmnivaDataDelete($_POST["id"]);
		$inputerror .= "Kustutatud";
	}
  }
?>
<!DOCTYPE html>
<style>
.center {
  margin: auto;
  width: 90%;
  padding: 10px;
  justify-content: center;
}
.center-text{
	justify-content: center;
	margin: auto;
	width: 90%;
	display: flex;
}
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

/* Style the submit button */
input[type=submit] {
  width: 100%;
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}-

/* Add a background color to the submit button on mouse-over */
input[type=submit]:hover {
  background-color: #45a049;
}
</style>
<html>
<body>
<form>


<!-- TITLE -->
<div class="center-text" id="OmnivaOutput">
	<h2>Pakiautomaatide andmebaas</h2>
</div>

<!-- Select Company -->
<div class="center-text">
	<p> <a href="ShowCompanies.php">Omniva</a>  <a href="ManageAccount.php">Itella</a>  <a href="ManageAccount.php">DPD</a></p>
</div>

<br>

<!-- PARCEL COMPANY TITLE -->
<div class="center-text" id="OmnivaOutput">
	<h2>Omniva pakiautomaadid</h2>
</div>
<br>


<!-- Clicking on link brings person to spot where you add information to database -->
<div class="center-text">
	<div><a href="OmnivaDataMaintance.php">Muuda andmebaasis olevaid andmeid</a></div>
</div>

<br>
<br>
<!-- Output from fnc_showcompanies.php the transport companies info from database -->
<div class="center" id="OmnivaOutput">
    <?php 
      echo OmnivaOutput(); 
    ?>
</div>

<div class="center-text">
	<p><a href="OmnivaDataMaintance.php">Muuda andmebaasis olevaid andmeid</a></p>
</div>

</body>
</html>

