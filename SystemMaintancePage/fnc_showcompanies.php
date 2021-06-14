<?php
  $database = "if20_marcus_praktika";

//OMNIVA DATABASE SHOW
function OmnivaOutput() {
	  $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	  $conn->set_charset("utf8");
	  //Show what it needs to select
	  $SQLsentence = "SELECT omniva_id, postiindeks, kauplus, maakond, valla_nimi, linn, aadress, number, lat, lon, lisainfo FROM omniva_machines";
	  $stmt = $conn->prepare($SQLsentence);
	  //What variable to put data into
	  $stmt->bind_result($idfromdb, $postiindeksfromdb, $shopfromdb, $maakondfromdb, $valdfromdb, $cityfromdb, $aadressfromdb, $numberfromdb, $latfromdb, $lonfromdb, $lisainfofromdb);
	  $stmt->execute();
	  $lines = "";
	  
	  //Create Tabel from results
	  while($stmt->fetch()) {
		$lines .= "<td>" .$idfromdb ."</td>\n";   
		$lines .= "<td>" .$shopfromdb ."</td>\n";  
		$lines .= "<td>" .$maakondfromdb ."</td>\n";  
		$lines .= "<td>" .$valdfromdb ."</td>\n"; 
		$lines .= "<td>" .$cityfromdb ."</td>\n";  
		$lines .= "<td>" .$aadressfromdb ."</td>\n"; 
		$lines .= "<td>" .$numberfromdb ."</td>\n"; 
		$lines .= "<td>" .$postiindeksfromdb ."</td>\n"; 
		$lines .= "<td>" .$latfromdb ."</td>\n"; 
		$lines .= "<td>" .$lonfromdb ."</td>\n";  
		$lines .= "<td>" .$lisainfofromdb ."</td></tr>\n";
	  }
	  //Table labels
	  if(!empty($lines)) {
		  $notice = "<table>\n<tr>\n" .'<th>ID</th>';
		  $notice .= "\n" .'<th>Kauplus</th>';
		  $notice .= "\n" .'<th>Maakond</th>';
		  $notice .= "\n" .'<th>Vald</th>';
		  $notice .= "\n" .'<th>Linn</th>';
		  $notice .= "\n" .'<th>Aadress</th>';
		  $notice .= "\n" .'<th>Number</th>';
		  $notice .= "\n" .'<th>Postiindeks</th>';
		  $notice .= "\n" .'<th>Laiuskraad</th>';
		  $notice .= "\n" .'<th>Pikkuskraad</th>';
		  $notice .= "\n" .'<th>Lisainfo</th>';
		  $notice .= "</tr>\n" .$lines ."</table>\n";
	  }
	  //Close connection
	  $stmt->close();
	  $conn->close();
	  return $notice;
  }
  
//ITELLA DATABASE SHOW
function ItellaOutput() {
	  $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	  $conn->set_charset("utf8");
	  //Show what it needs to select
	  $SQLsentence = "SELECT itella_id, kauplus, maakond, valla_nimi, linn, aadress, postiindeks, lat, lon, lisainfo FROM itella";
	  $stmt = $conn->prepare($SQLsentence);
	  //What variable to put data into
	  $stmt->bind_result($idfromdb, $shopfromdb, $maakondfromdb, $valdfromdb, $cityfromdb, $aadressfromdb, $postiindeksfromdb, $latfromdb, $lonfromdb, $lisainfofromdb);
	  $stmt->execute();
	  $lines = "";
	  //Create Tabel from results
	  while($stmt->fetch()) {
		$lines .= "<td>" .$idfromdb ."</td>\n";  
		$lines .= "<td>" .$shopfromdb ."</td>\n";  
		$lines .= "<td>" .$maakondfromdb ."</td>\n";  
		$lines .= "<td>" .$valdfromdb ."</td>\n"; 
		$lines .= "<td>" .$cityfromdb ."</td>\n";  
		$lines .= "<td>" .$aadressfromdb ."</td>\n"; 
		$lines .= "<td>" .$postiindeksfromdb ."</td>\n";  
		$lines .= "<td>" .$latfromdb ."</td>\n"; 
		$lines .= "<td>" .$lonfromdb ."</td>\n";  
		$lines .= "<td>" .$lisainfofromdb ."</td></tr>\n";
	  }
	  //Table labels
	  if(!empty($lines)) {
		  $notice = "<table>\n<tr>\n" .'<th>ID</th>';
		  $notice .= "\n" .'<th>Kauplus</th>';
		  $notice .= "\n" .'<th>Maakond</th>';
		  $notice .= "\n" .'<th>Vald</th>';
		  $notice .= "\n" .'<th>Linn</th>';
		  $notice .= "\n" .'<th>Aadress</th>';
		  $notice .= "\n" .'<th>Postiindeks</th>';
		  $notice .= "\n" .'<th>Laiuskraad</th>';
		  $notice .= "\n" .'<th>Pikkuskraad</th>';
		  $notice .= "\n" .'<th>Lisainfo</th>';
		  $notice .= "</tr>\n" .$lines ."</table>\n";
	  }
	  //Close connection
	  $stmt->close();
	  $conn->close();
	  return $notice;
  }

//DPD DATABASE SHOW
function DpdOutput() {
	  $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	  $conn->set_charset("utf8");
	  //Show what it needs to select
	  $SQLsentence = "SELECT dpd_id, kauplus, maakond, valla_nimi, linn, aadress, postiindeks, lat, lon, lisainfo FROM dpd";
	  $stmt = $conn->prepare($SQLsentence);
	  //What variable to put data into
	  $stmt->bind_result($idfromdb, $shopfromdb, $maakondfromdb, $valdfromdb, $cityfromdb, $aadressfromdb, $postiindeksfromdb, $latfromdb, $lonfromdb, $lisainfofromdb);
	  $stmt->execute();
	  $lines = "";
	  //Create Tabel from results
	  while($stmt->fetch()) {
		$lines .= "<td>" .$idfromdb ."</td>\n";  
		$lines .= "<td>" .$shopfromdb ."</td>\n";  
		$lines .= "<td>" .$maakondfromdb ."</td>\n";  
		$lines .= "<td>" .$valdfromdb ."</td>\n"; 
		$lines .= "<td>" .$cityfromdb ."</td>\n";  
		$lines .= "<td>" .$aadressfromdb ."</td>\n"; 
		$lines .= "<td>" .$postiindeksfromdb ."</td>\n";  
		$lines .= "<td>" .$latfromdb ."</td>\n"; 
		$lines .= "<td>" .$lonfromdb ."</td>\n";  
		$lines .= "<td>" .$lisainfofromdb ."</td></tr>\n";
	  }
	  //Table labels
	  if(!empty($lines)) {
		  $notice = "<table>\n<tr>\n" .'<th>ID</th>';
		  $notice .= "\n" .'<th>Kauplus</th>';
		  $notice .= "\n" .'<th>Maakond</th>';
		  $notice .= "\n" .'<th>Vald</th>';
		  $notice .= "\n" .'<th>Linn</th>';
		  $notice .= "\n" .'<th>Aadress</th>';
		  $notice .= "\n" .'<th>Postiindeks</th>';
		  $notice .= "\n" .'<th>Laiuskraad</th>';
		  $notice .= "\n" .'<th>Pikkuskraad</th>';
		  $notice .= "\n" .'<th>Lisainfo</th>';
		  $notice .= "</tr>\n" .$lines ."</table>\n";
	  }
	  //Close connection
	  $stmt->close();
	  $conn->close();
	  return $notice;
  }

//SHOW DOOR SIZES AND PRICE FOR ALL COMPANIES
function DoorSizeOutput() {
	  $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	  $conn->set_charset("utf8");
	  //Show what it needs to select
	  $SQLsentence = "SELECT pakid_id, firma, suurus, a, b, c, max_kaal, hind FROM pakid";
	  $stmt = $conn->prepare($SQLsentence);
	  //What variable to put data into
	  $stmt->bind_result($idfromdb, $firmafromdb, $suurusfromdb, $afromdb, $bfromdb, $cfromdb, $max_kaalfromdb, $hindfromdb);
	  $stmt->execute();
	  $lines = "";
	  //Create Tabel from results
	  while($stmt->fetch()) {
		$lines .= "<td>" .$idfromdb ."</td>\n";  
		$lines .= "<td>" .$firmafromdb ."</td>\n";  
		$lines .= "<td>" .$suurusfromdb ."</td>\n";  
		$lines .= "<td>" .$afromdb ."</td>\n"; 
		$lines .= "<td>" .$bfromdb ."</td>\n";  
		$lines .= "<td>" .$cfromdb ."</td>\n"; 
		$lines .= "<td>" .$max_kaalfromdb ."</td>\n";  
		$lines .= "<td>" .$hindfromdb ."</td></tr>\n";
	  }
	  //Table labels
	  if(!empty($lines)) {
		  $notice = "<table>\n<tr>\n" .'<th>ID</th>';
		  $notice .= "\n" .'<th>Firma</th>';
		  $notice .= "\n" .'<th>Suurus</th>';
		  $notice .= "\n" .'<th>Külg A (cm)</th>';
		  $notice .= "\n" .'<th>Külg B (cm)</th>';
		  $notice .= "\n" .'<th>Külg C (cm)</th>';
		  $notice .= "\n" .'<th>MAX kaal</th>';
		  $notice .= "\n" .'<th>Hind</th>';
		  $notice .= "</tr>\n" .$lines ."</table>\n";
	  }
	  //Close connection
	  $stmt->close();
	  $conn->close();
	  return $notice;
  } 

//WRITE NEW DATA INTO OMNIVA DATABASE
function AddOmniva($postiindeks, $kauplus, $maakond, $vald, $city, $aadress, $number, $lon, $lat, $lisainfo){
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	//Show what it needs to be inserted
	$stmt = $conn->prepare("INSERT INTO omniva_machines (postiindeks, kauplus, maakond, valla_nimi, linn, aadress, number, lon, lat, lisainfo) VALUES(?,?,?,?,?,?,?,?,?,?)");
	echo $conn->error;
	$stmt->bind_param("isssssiiis", $postiindeks, $kauplus, $maakond, $vald, $city, $aadress, $number, $lon, $lat, $lisainfo);
	//Insert data
	$stmt->execute();
	$stmt->close();
	$conn->close();
  }

//WRITE NEW DATA INTO DPD DATABASE
function AddDpd($lat, $lon, $maakond, $vald, $city, $aadress, $postiindeks, $kauplus, $lisainfo){
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	//Show what it needs to be inserted
	$stmt = $conn->prepare("INSERT INTO dpd (lat, lon, maakond, valla_nimi, linn, aadress, postiindeks, kauplus, lisainfo) VALUES(?,?,?,?,?,?,?,?,?)");
	echo $conn->error;
	$stmt->bind_param("iissssiss", $lat, $lon, $maakond, $vald, $city, $aadress, $postiindeks, $kauplus, $lisainfo);
	//Insert data
	$stmt->execute();
	$stmt->close();
	$conn->close();
  }

//WRITE NEW DATA INTO Itella DATABASE
function AddItella($lat, $lon, $maakond, $vald, $city, $aadress, $postiindeks, $kauplus, $lisainfo){
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	//Show what it needs to be inserted
	$stmt = $conn->prepare("INSERT INTO itella (lat, lon, maakond, valla_nimi, linn, aadress, postiindeks, kauplus, lisainfo) VALUES(?,?,?,?,?,?,?,?,?)");
	echo $conn->error;
	$stmt->bind_param("iissssiss", $lat, $lon, $maakond, $vald, $city, $aadress, $postiindeks, $kauplus, $lisainfo);
	//Insert data
	$stmt->execute();
	$stmt->close();
	$conn->close();
  }

//WRITE NEW DATA INTO PAKK DATABASE
function AddToPakk($firma, $suurus, $kylga, $kylgb, $kylgc, $kaal, $hind){
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	//Show what it needs to be inserted
	$stmt = $conn->prepare("INSERT INTO pakid (firma, suurus, a, b, c, max_kaal, hind) VALUES(?,?,?,?,?,?,?)");
	echo $conn->error;
	$stmt->bind_param("ssiiiii", $firma, $suurus, $kylga, $kylgb, $kylgc, $kaal, $hind);
	//Insert data
	$stmt->execute();
	$stmt->close();
	$conn->close();
  }

//DELETE DATA FROM OMNIVA DATABASE
function OmnivaDataDelete($id){
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	//Show what it needs to be deleted
	$stmt = $conn->prepare("DELETE FROM omniva_machines WHERE omniva_id='$id';");
	echo $conn->error;
	//Delete data
	$stmt->execute();
	$stmt->close();
	$conn->close();
    }

//DELETE DATA FROM DPD DATABASE
function DpdDataDelete($id){
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	//Show what it needs to be deleted
	$stmt = $conn->prepare("DELETE FROM dpd WHERE dpd_id='$id';");
	echo $conn->error;
	//Delete data
	$stmt->execute();
	$stmt->close();
	$conn->close();
    }
	
//DELETE DATA FROM ITELLA DATABASE
function ItellaDataDelete($id){
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	//Show what it needs to be deleted
	$stmt = $conn->prepare("DELETE FROM itella WHERE itella_id='$id';");
	echo $conn->error;
	//Delete data
	$stmt->execute();
	$stmt->close();
	$conn->close();
    }
	
//DELETE DATA FROM pakid Database
function PakidDelete($id){
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn->prepare("DELETE FROM pakid WHERE pakid_id='$id';");
	echo $conn->error;
	$stmt->execute();
	$stmt->close();
	$conn->close();
    }

//DropDown Omniva
function OmnivaChoose($selected){
        $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$conn->set_charset("utf8");
		//Show what it needs to select from database
        $stmt = $conn->prepare("SELECT omniva_id, kauplus, linn FROM omniva_machines");
        echo $conn->error;
		//Data into variables
        $stmt->bind_result($idfromdb, $shopfromdb, $cityfromdb);
		//Get the data
        $stmt->execute();
        $machine = "";
		$test = "";
		$test = $shopfromdb;
		//Fetch all $shopfromdb names into dropdown
        while($stmt->fetch()){
            $machine .= '<option value="' .$idfromdb .'"';
            if(intval($idfromdb) == $selected){
                $machine .=" selected";
            }
            $machine .= ">" .$shopfromdb ."</option> \n";
        }
        if(!empty($machine)){
            $notice = '<select name="selectedparcelmachine" id="selectedparcelmachine">' ."\n";
            $notice .= '<option value="" selected disabled>Vali Pakiautomaat</option>' ."\n";
            $notice .= $machine;
            $notice .= "</select> \n";
        }
		//Close connection
        $stmt->close();
        $conn->close();
        return $notice;
    }
	
//DropDown DPD
function DpdChoose($selected){
        $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$conn->set_charset("utf8");
		//Show what it needs to select from database
        $stmt = $conn->prepare("SELECT dpd_id, kauplus, linn FROM dpd");
        echo $conn->error;
		//Data into variables
        $stmt->bind_result($idfromdb, $shopfromdb, $cityfromdb);
		//Get the data
        $stmt->execute();
        $machine = "";
		$test = "";
		$test = $shopfromdb;
		//Fetch all $shopfromdb names into dropdown
        while($stmt->fetch()){
            $machine .= '<option value="' .$idfromdb .'"';
            if(intval($idfromdb) == $selected){
                $machine .=" selected";
            }
            $machine .= ">" .$shopfromdb ."</option> \n";
        }
        if(!empty($machine)){
            $notice = '<select name="selectedparcelmachine" id="selectedparcelmachine">' ."\n";
            $notice .= '<option value="" selected disabled>Vali Pakiautomaat</option>' ."\n";
            $notice .= $machine;
            $notice .= "</select> \n";
        }
		//Close connection
        $stmt->close();
        $conn->close();
        return $notice;
    }
	
//DropDown Itella
function ItellaChoose($selected){
        $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$conn->set_charset("utf8");
		//Show what it needs to select from database
        $stmt = $conn->prepare("SELECT itella_id, kauplus, linn FROM itella");
        echo $conn->error;
		//Data into variables
        $stmt->bind_result($idfromdb, $shopfromdb, $cityfromdb);
		//Get the data
        $stmt->execute();
        $machine = "";
		$test = "";
		$test = $shopfromdb;
		//Fetch all $shopfromdb names into dropdown
        while($stmt->fetch()){
            $machine .= '<option value="' .$idfromdb .'"';
            if(intval($idfromdb) == $selected){
                $machine .=" selected";
            }
            $machine .= ">" .$shopfromdb ."</option> \n";
        }
        if(!empty($machine)){
            $notice = '<select name="selectedparcelmachine" id="selectedparcelmachine">' ."\n";
            $notice .= '<option value="" selected disabled>Vali Pakiautomaat</option>' ."\n";
            $notice .= $machine;
            $notice .= "</select> \n";
        }
		//Close connection
        $stmt->close();
        $conn->close();
        return $notice;
    }