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

?>
<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
</head>
<body>



<!-- Adding new information to database -->
<div class="center" id="AndmeteSisestamine">
	<p><strong>Andmete lisamine:</strong></p>
	<form method="POST">
		<label for="id">Primary Key</label>
		<input type="text"  size="2" name="id" id="id" placeholder="Näiteks Omniva_id">
		
		<label for="keskus">Keskuse nimi</label>
		<input type="text" name="keskus" id="keskus" placeholder="Näiteks Lihula Coop Konsumi pakiautomaat">
		
		<label for="maakond">Maakonna nimi</label>
		<input type="text" name="maakond" id="maakond" placeholder="Näiteks Läänemaa">
		
		<label for="vald">Valla nimi</label>
		<input type="text" name="vald" id="vald" placeholder="Näiteks Rapla vald">
		
		<label for="linn">Linna nimi</label>
		<input type="text" name="linn" id="linn" placeholder="Näiteks Haapsalu">
		
		<label for="aadress">Aadress</label>
		<input type="text" name="aadress" id="aadress" placeholder="Näiteks Kastani 3">
		
		<label for="postiindeks">Postiindeks</label>
		<input type="text" name="postiindeks" id="postiindeks" placeholder="Näiteks 96301">
		
		<label for="lot">Longitude</label>
		<input type="text" name="lon" id="lon" placeholder="Näiteks 59.2937">
		
		<label for="lat">Latitude</label>
		<input type="text" name="lat" id="lat" placeholder="Näiteks 22.2548">
		
		<label for="lisainfo">Lisainfo</label>
		<input type="text" name="lisainfo" id="lisainfo" placeholder="">
		
		<input type="submit" name="datasubmit" value="Sisesta">
	</form>
<p><?php echo $inputerror; ?></p>
</div>

<br>

</form>
</body>
</html>