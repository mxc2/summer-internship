<?php
  $database = "if20_marcus_praktika";

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
		  $notice .= "\n" .'<th>Latitude</th>';
		  $notice .= "\n" .'<th>Longitude</th>';
		  $notice .= "\n" .'<th>Lisainfo</th>';
		  $notice .= "</tr>\n" .$lines ."</table>\n";
	  }
	  
	  $stmt->close();
	  $conn->close();
	  return $notice;
  }
  
function writefilm($lat, $lon, $maakond, $vald, $linn, $aadress, $postiindeks, $kauplus, $lisainfo){
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn->prepare("INSERT INTO omniva (lat, lon, maakond, valla_nimi, linn, aadress, postiindeks, kauplus, lisainfo) VALUES(?,?,?,?,?,?,?,?,?)");
	echo $conn->error;
	$stmt->bind_param("iissssiss", $lat, $lon, $maakond, $vald, $linn, $aadress, $postiindeks, $kauplus, $lisainfo);
	$stmt->execute();
	$stmt->close();
	$conn->close();
  } //writefilm lõppeb
  
function OmnivaDataDelete($id){
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn->prepare("DELETE FROM omniva WHERE omniva_id='$id';");
	echo $conn->error;
	$stmt->execute();
	$stmt->close();
	$conn->close();
    }
	
function readjookmidavalida($selected){
        $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$conn->set_charset("utf8");
        $stmt = $conn->prepare("SELECT omniva_id, kauplus FROM omniva");
        echo $conn->error;
        $stmt->bind_result($idfromdb, $kauplusfromdb);
        $stmt->execute();
        $machine = "";
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