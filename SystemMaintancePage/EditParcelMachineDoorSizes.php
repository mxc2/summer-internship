<?php
  require("../../../config.php");
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
	if(empty($_POST["firma"])){
		$inputerror .= "ANDMETE SISESTAMINE EBAÕNNESTUS : Palun sisestage firmae nimi, kus pakiautomaat asub. ";
	}
	
	elseif(empty($_POST["suurus"])){
		$inputerror .= "ANDMETE SISESTAMINE EBAÕNNESTUS : Palun sisestage suurus, kus pakiautomaat asub. ";
	}
	
	elseif(empty($_POST["kylga"])){
		$inputerror .= "ANDMETE SISESTAMINE EBAÕNNESTUS : Palun sisestage kylga, kus pakiautomaat asub. ";
	}
	
	elseif(empty($_POST["kylgb"])){
		$inputerror .= "ANDMETE SISESTAMINE EBAÕNNESTUS : Palun sisestage kylgb, kus pakiautomaat asub. ";
	}
	
	elseif(empty($_POST["kylgc"])){
		$inputerror .= "ANDMETE SISESTAMINE EBAÕNNESTUS : Palun sisestage kylgc, kus pakiautomaat asub. ";
	}
	
	elseif(empty($_POST["kaal"])){
		$inputerror .= "ANDMETE SISESTAMINE EBAÕNNESTUS : Palun sisestage kaal, kus pakiautomaat asub. ";
	}
	
	elseif(empty($_POST["hind"])){
		$inputerror .= "ANDMETE SISESTAMINE EBAÕNNESTUS : Palun sisestage laiuskraad, kus pakiautomaat asub. ";
	}
	
	//IF DATA CORRECTLY ENTERED THEN SEND IT TO fnc_showcompanies.php
	if(empty($inputerror)){
		AddToPakk($_POST["firma"], $_POST["suurus"], $_POST["kylga"], $_POST["kylgb"], $_POST["kylgc"], $_POST["kaal"], $_POST["hind"]);
		$correctadd .= "Sisestatud andmed on lisatud andmebaasi. ";
	}
  }
  
  $SelectedMachine = "";
  
  //CHECK IF DATA IS CORRECTLY ENTERED AND IF NOT SEND AN ERROR
  if(isset($_POST["datadelete"])){
	if(empty($_POST["DeleteID"])){
		$inputerrordelete .= "KUSTUTAMINE EBAÕNNESTUS : Te ei sisestanud ID-d";
	}
	
	//IF DATA CORRECTLY ENTERED THEN SEND IT TO fnc_showcompanies.php
	elseif(empty($inputerror)){
		PakidDelete($_POST["DeleteID"]);
		$correctdelete .= "Valitud pakiautomaat on andmebaasis ära kustutatud.";
	}
  }

require("header.php");
?>
<!DOCTYPE html>
<html lang="et">
<head>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="center-text">
	<h1>Transpordifirmade paki suuruste muutmine</h1>
</div>

<br>

<div class="center-text">
	<br>
	<p><a href="ParcelMachineDoorSizes.php">Vaadake andmeid</a></p>
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
<div class="center-input" id="AndmeteSisestamine">
	<p><strong>Andmete lisamine: </strong></p>
	<form method="POST">
		<label for="firma">Transpordifirma nimi</label>
		<input type="text" name="firma" id="firma" placeholder="Näiteks Omniva">
		
		<label for="suurus">Pakiautomaadi ukse suuruse tähis</label>
		<input type="text" name="suurus" id="suurus" placeholder="Näiteks XS">
		
		<label for="kylga">Külg A (cm)</label>
		<input type="number" name="kylga" id="kylga" placeholder="Näiteks 14.5">
		
		<label for="kylgb">Külg B (cm)</label>
		<input type="number" name="kylgb" id="kylgb" placeholder="Näiteks 10">
		
		<label for="kylgc">Külg C (cm)</label>
		<input type="number" name="kylgc" id="kylgc" placeholder="Näiteks 18">
		
		<label for="kaal">Maksimum kaal (kg)</label>
		<input type="number" name="kaal" id="kaal" placeholder="Näiteks 25">
		
		<label for="hind">Hind</label>
		<input type="number" name="hind" id="hind" placeholder="Näiteks 2.89">
		
		<input type="submit" class="green-color submit" name="datasubmit" value="Sisesta">
	</form>
</div>
</div>

<br>

<div class="center-input" id="DataDelete">
	<p><strong>Andmete kustutamine:</strong></p>
		<form method="POST">
			<label for="DeleteID">Sisesta ID, mis rida informatsiooni soovite kustutada</label>
			<input type="number" name="DeleteID" id="DeleteID" placeholder="Näiteks 3">
			
			<input type="submit" onclick="return confirm('Olete kindel et soovite KUSTUTADA valitud pakiautomaadi?');" class="red-color submit" name="datadelete" value="Kustuta">
		</form>
		<div class="failure"><p><?php echo $inputerrordelete; ?></p></div>
		<div class="correct"><p><?php echo $correctdelete; ?></p></div>
</div>

<br>

</form>
</body>
</html>