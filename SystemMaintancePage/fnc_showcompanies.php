<?php
  $database = "if20_marcus_praktika";

//OMNIVA DATABASE SHOW
function OmnivaOutput() {
	  $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	  $conn->set_charset("utf8");
	  $SQLsentence = "SELECT omniva_id, kauplus, maakond, valla_nimi, linn, aadress, postiindeks, lat, lon, lisainfo FROM omniva";
	  $stmt = $conn->prepare($SQLsentence);
	  
	  $stmt->bind_result($idfromdb, $kauplusfromdb, $maakondfromdb, $valdfromdb, $linnfromdb, $aadressfromdb, $postiindeksfromdb, $latfromdb, $lonfromdb, $lisainfofromdb);
	  $stmt->execute();
	  $lines = "";
	  
	  while($stmt->fetch()) {
		$lines .= "<td>" .$idfromdb ."</td>\n";  
		$lines .= "<td>" .$kauplusfromdb ."</td>\n";  
		$lines .= "<td>" .$maakondfromdb ."</td>\n";  
		$lines .= "<td>" .$valdfromdb ."</td>\n"; 
		$lines .= "<td>" .$linnfromdb ."</td>\n";  
		$lines .= "<td>" .$aadressfromdb ."</td>\n"; 
		$lines .= "<td>" .$postiindeksfromdb ."</td>\n";  
		$lines .= "<td>" .$latfromdb ."</td>\n"; 
		$lines .= "<td>" .$lonfromdb ."</td>\n";  
		$lines .= "<td>" .$lisainfofromdb ."</td></tr>\n";
	  }
	  if(!empty($lines)) {
		  $notice = "<table>\n<tr>\n" .'<th>Omniva id </th>';
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
	  
	  $stmt->close();
	  $conn->close();
	  return $notice;
  }
  
//ITELLA DATABASE SHOW
function ItellaOutput() {
	  $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	  $conn->set_charset("utf8");
	  $SQLsentence = "SELECT itella_id, kauplus, maakond, valla_nimi, linn, aadress, postiindeks, lat, lon, lisainfo FROM itella";
	  $stmt = $conn->prepare($SQLsentence);
	  
	  $stmt->bind_result($idfromdb, $kauplusfromdb, $maakondfromdb, $valdfromdb, $linnfromdb, $aadressfromdb, $postiindeksfromdb, $latfromdb, $lonfromdb, $lisainfofromdb);
	  $stmt->execute();
	  $lines = "";
	  
	  while($stmt->fetch()) {
		$lines .= "<td>" .$idfromdb ."</td>\n";  
		$lines .= "<td>" .$kauplusfromdb ."</td>\n";  
		$lines .= "<td>" .$maakondfromdb ."</td>\n";  
		$lines .= "<td>" .$valdfromdb ."</td>\n"; 
		$lines .= "<td>" .$linnfromdb ."</td>\n";  
		$lines .= "<td>" .$aadressfromdb ."</td>\n"; 
		$lines .= "<td>" .$postiindeksfromdb ."</td>\n";  
		$lines .= "<td>" .$latfromdb ."</td>\n"; 
		$lines .= "<td>" .$lonfromdb ."</td>\n";  
		$lines .= "<td>" .$lisainfofromdb ."</td></tr>\n";
	  }
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
	  
	  $stmt->close();
	  $conn->close();
	  return $notice;
  }

//SHOW DOOR SIZES AND PRICE FOR ALL COMPANIES
function DoorSizeOutput() {
	  $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	  $conn->set_charset("utf8");
	  $SQLsentence = "SELECT pakid_id, firma, suurus, a, b, c, max_kaal, hind FROM pakid";
	  $stmt = $conn->prepare($SQLsentence);
	  
	  $stmt->bind_result($idfromdb, $firmafromdb, $suurusfromdb, $afromdb, $bfromdb, $cfromdb, $max_kaalfromdb, $hindfromdb);
	  $stmt->execute();
	  $lines = "";
	  
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
	  
	  $stmt->close();
	  $conn->close();
	  return $notice;
  } 

//WRITE NEW DATA INTO OMNIVA DATABASE
function writefilm($lat, $lon, $maakond, $vald, $linn, $aadress, $postiindeks, $kauplus, $lisainfo){
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn->prepare("INSERT INTO omniva (lat, lon, maakond, valla_nimi, linn, aadress, postiindeks, kauplus, lisainfo) VALUES(?,?,?,?,?,?,?,?,?)");
	echo $conn->error;
	$stmt->bind_param("iissssiss", $lat, $lon, $maakond, $vald, $linn, $aadress, $postiindeks, $kauplus, $lisainfo);
	$stmt->execute();
	$stmt->close();
	$conn->close();
  }

//WRITE NEW DATA INTO PAKK DATABASE
function AddToPakk($firma, $suurus, $kylga, $kylgb, $kylgc, $kaal, $hind){
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn->prepare("INSERT INTO pakid (firma, suurus, a, b, c, max_kaal, hind) VALUES(?,?,?,?,?,?,?)");
	echo $conn->error;
	$stmt->bind_param("ssiiiii", $firma, $suurus, $kylga, $kylgb, $kylgc, $kaal, $hind);
	$stmt->execute();
	$stmt->close();
	$conn->close();
  }

//DELETE DATA FROM OMNIVA DATABASE
function OmnivaDataDelete($id){
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn->prepare("DELETE FROM omniva WHERE omniva_id='$id';");
	echo $conn->error;
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
	
function readjookmidavalida($selected){
        $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$conn->set_charset("utf8");
        $stmt = $conn->prepare("SELECT omniva_id, kauplus, linn FROM omniva");
        echo $conn->error;
        $stmt->bind_result($idfromdb, $kauplusfromdb, $linnfromdb);
        $stmt->execute();
        $machine = "";
		$test = "";
		$test = $kauplusfromdb;
        while($stmt->fetch()){
            $machine .= '<option value="' .$idfromdb .'"';
            if(intval($idfromdb) == $selected){
                $machine .=" selected";
            }
            $machine .= ">" .$kauplusfromdb ."</option> \n";
        }
        if(!empty($machine)){
            $notice = '<select name="selectedparcelmachine" id="selectedparcelmachine">' ."\n";
            $notice .= '<option value="" selected disabled>Vali Pakiautomaat</option>' ."\n";
            $notice .= $machine;
            $notice .= "</select> \n";
        }
        $stmt->close();
        $conn->close();
        return $notice;
    }