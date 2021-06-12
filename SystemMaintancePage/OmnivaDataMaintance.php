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
  
  $correctadd = "";
  $correctdelete = "";
  $inputerror = "";
  $inputerrordelete = "";
  
  //CHECK IF DATA IS CORRECTLY ENTERED AND IF NOT SEND AN ERROR
  if(isset($_POST["datasubmit"])){
	if(empty($_POST["keskus"])){
		$inputerror .= "ANDMETE SISESTAMINE EBAÕNNESTUS : Palun sisestage keskuse nimi, kus pakiautomaat asub. ";
	}
	
	elseif(empty($_POST["maakond"])){
		$inputerror .= "ANDMETE SISESTAMINE EBAÕNNESTUS : Palun sisestage maakond, kus pakiautomaat asub. ";
	}
	
	elseif(empty($_POST["vald"])){
		$inputerror .= "ANDMETE SISESTAMINE EBAÕNNESTUS : Palun sisestage vald, kus pakiautomaat asub. ";
	}
	
	elseif(empty($_POST["linn"])){
		$inputerror .= "ANDMETE SISESTAMINE EBAÕNNESTUS : Palun sisestage linn, kus pakiautomaat asub. ";
	}
	
	elseif(empty($_POST["aadress"])){
		$inputerror .= "ANDMETE SISESTAMINE EBAÕNNESTUS : Palun sisestage aadress, kus pakiautomaat asub. ";
	}
	
	elseif(empty($_POST["postiindeks"])){
		$inputerror .= "ANDMETE SISESTAMINE EBAÕNNESTUS : Palun sisestage postiindeks, kus pakiautomaat asub. ";
	}
	
	elseif(empty($_POST["lon"])){
		$inputerror .= "ANDMETE SISESTAMINE EBAÕNNESTUS : Palun sisestage pikkuskraad, kus pakiautomaat asub. ";
	}
	
	elseif(empty($_POST["lat"])){
		$inputerror .= "ANDMETE SISESTAMINE EBAÕNNESTUS : Palun sisestage laiuskraad, kus pakiautomaat asub. ";
	}
	
	//IF DATA CORRECTLY ENTERED THEN SEND IT TO fnc_showcompanies.php
	if(empty($inputerror)){
		writefilm($_POST["lat"], $_POST["lon"], $_POST["maakond"], $_POST["vald"], $_POST["linn"], $_POST["aadress"], $_POST["postiindeks"], $_POST["keskus"], $_POST["lisainfo"]);
		$correctadd .= "Sisestatud andmed on lisatud andmebaasi. ";
	}
  }
  
  $SelectedMachine = "";
  $valitudjookhtml = readjookmidavalida($SelectedMachine);
  
  //CHECK IF DATA IS CORRECTLY ENTERED AND IF NOT SEND AN ERROR
  if(isset($_POST["datadelete"])){
	if(empty($_POST["selectedparcelmachine"])){
		$inputerrordelete .= "KUSTUTAMINE EBAÕNNESTUS : Te ei valinud pakiautomaati, mida kustutada";
	}
	
	//IF DATA CORRECTLY ENTERED THEN SEND IT TO fnc_showcompanies.php
	elseif(empty($inputerror)){
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
	<p><strong>Andmete lisamine: </strong></p>
	<form method="POST">
		<label for="keskus">Keskuse nimi*</label>
		<input type="text" name="keskus" id="keskus" placeholder="Näiteks Elva Turuplatsi Coop Konsumi pakiautomaat">
		
		<label for="maakond">Maakonna nimi*</label>
		<input type="text" name="maakond" id="maakond" placeholder="Näiteks Tartu maakond või Läänemaa">
		
		<label for="vald">Valla nimi*</label>
		<input type="text" name="vald" id="vald" placeholder="Näiteks Elva vald või Haapsalu linn">
		
		<label for="linn">Linna, küla, aleviku või linnaosa nimi*</label>
		<input type="text" name="linn" id="linn" placeholder="Näiteks Elva linn või Haabneeme alevik">
		
		<label for="aadress">Aadress*</label>
		<input type="text" name="aadress" id="aadress" placeholder="Näiteks Rohuneeme tee 32">
		
		<label for="postiindeks">Postiindeks*</label>
		<input type="text" name="postiindeks" id="postiindeks" placeholder="Näiteks 96047">
		
		<label for="lat">Laiuskraad*</label>
		<input type="text" name="lat" id="lat" placeholder="Näiteks 58.221">
		
		<label for="lon">Pikkuskraad*</label>
		<input type="text" name="lon" id="lon" placeholder="Näiteks 26.4087">
		
		<label for="lisainfo">Lisainfo</label>
		<input type="text" name="lisainfo" id="lisainfo" placeholder="">
		
		<p>Tärniga alad ei tohi olla tühjad!</p>
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
			
			<input type="submit" onclick="return confirm('Olete kindel et soovite KUSTUTADA valitud pakiautomaadi?');" class="red-color" name="datadelete" value="Kustuta">
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