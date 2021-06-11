<?php
  //loeme andmebaasi login info muutujad
  require("../../../config.php");
  //kui kasutaja on vormis andmeid saatnud, siis salvestame andmebaasi
  require("fnc_showcompanies.php");
  
  $correctadd = "";
  $correctdelete = "";
  $inputerror = "";
  $inputerrordelete = "";
  
  if(isset($_POST["datasubmit"])){
	if(empty($_POST["keskus"])){
		$inputerror .= "Palun sisestage keskuse nimi, kus pakiautomaat asub. ";
	}
	
	if(empty($_POST["maakond"])){
		$inputerror .= "Palun sisestage maakond, kus pakiautomaat asub. ";
	}
	
	if(empty($_POST["vald"])){
		$inputerror .= "Palun sisestage vald, kus pakiautomaat asub. ";
	}
	
	if(empty($_POST["linn"])){
		$inputerror .= "Palun sisestage linn, kus pakiautomaat asub. ";
	}
	
	if(empty($_POST["aadress"])){
		$inputerror .= "Palun sisestage aadress, kus pakiautomaat asub. ";
	}
	
	if(empty($_POST["postiindeks"])){
		$inputerror .= "Palun sisestage postiindeks, kus pakiautomaat asub. ";
	}
	
	if(empty($_POST["lon"])){
		$inputerror .= "Palun sisestage pikkuskraad, kus pakiautomaat asub. ";
	}
	
	if(empty($_POST["lat"])){
		$inputerror .= "Palun sisestage laiuskraad, kus pakiautomaat asub. ";
	}
	
	if(empty($inputerror)){
		writefilm($_POST["lat"], $_POST["lon"], $_POST["maakond"], $_POST["vald"], $_POST["linn"], $_POST["aadress"], $_POST["postiindeks"], $_POST["keskus"], $_POST["lisainfo"]);
		$correctadd .= "Sisestatud andmed on lisatud andmebaasi. ";
	}
  }
  
  $SelectedMachine = "";
  $valitudjookhtml = readjookmidavalida($SelectedMachine);
  
  if(isset($_POST["datadelete"])){
	if(empty($inputerror)){
		OmnivaDataDelete($_POST["selectedparcelmachine"]);
		$correctdelete .= "Valitud pakiautomaat on andmebaasis ära kustutatud.";
	}
  }

?>
<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
</head>
<body>

<div class="center-text">
	<h1>Omniva pakiautomaatide asukohtade muutmine</h1>
</div>

<br>

<div class="center-text">
	<br>
	<p><a href="ShowCompanies.php">Vaadake andmeid</a></p>
</div>


<div class="failure center-text">
	<p><?php echo $inputerror; ?></p>
	<p><?php echo $inputerrordelete; ?></p>
</div>
	
<div class="correct center-text">
	<p><?php echo $correctadd; ?></p>
	<p><?php echo $correctdelete; ?></p>
</div>

<!-- Adding new information to database -->
<div class="center" id="AndmeteSisestamine">
	<p><strong>Andmete lisamine:</strong></p>
	<form method="POST">
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
		
		<input type="submit" class="green-color" name="datasubmit" value="Sisesta">
	</form>
</div>
</div>

<br>

<div class="center" id="DataDelete">
	<p><strong>Andmete kustutamine:</strong></p>
		<form method="POST">
			<label for="id">Valige pakiautomaat mida kustutada.</label>
			<form id="selectedparcelmachine" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<?php
				echo $valitudjookhtml;
			?>
			
			<input type="submit" class="red-color" name="datadelete" value="Kustuta">
		</form>
		<div class="failure"><p><?php echo $inputerrordelete; ?></p></div>
		<div class="correct"><p><?php echo $correctdelete; ?></p></div>
</div>

<br>

</form>
</body>
</html>
<style>
.center {
  margin: auto;
  width: 80%;
  padding: 10px;
  justify-content: center;
}
.center-text{
	justify-content: center;
	margin: auto;
	width: 90%;
	display: flex;
}

/*Text sizes and css */
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

/*Button sizes and css*/
input[type=submit] {
  width: 100%;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.green-color{
	color: green;
	background-color: #04AA6D;
}

.red-color{
	color: red;
	background-color: #aa0404;
}


/* Button color when mouse hover */
input[type=submit]:hover {
  background-color: #575757;
}

.failure{
	color: red;
}

.correct{
	color: green;
}
</style>