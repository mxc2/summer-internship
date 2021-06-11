<?php
require "vendor/autoload.php";
$database = "if20_marcus_praktika";
$start = 'Piibe maantee 16, Aravete, 96230 Järva maakond';//$_POST['start'];
$end = 'Kollane 14a, Tartu';//$_POST['end'];
//Converts user input to a processable coordinate
function geoCodeFinder($input){
	$geocoder = new \OpenCage\Geocoder\Geocoder('5a7f44a78bf947aebdaaa1a484c50cfe');//<--API key neccessary for gecoding//API key2, for just in case('da0c24be00f44f3a8fcb4da9d7cd8d47')

	$result = $geocoder->geocode($input);
	if ($result && $result['total_results'] > 0) {
		$first = $result['results'][0];

		$txt = json_encode([$first['geometry']['lat'], $first['geometry']['lng']]);	//Gets coordinate	
		$txt = trim($txt, '[]');//Changes the coordinate to processable one
		$startCOORDs = explode(',', $txt);
		//print_r ($startCOORDs);
		return $startCOORDs;
	}
}

//Calculates the distance between two coordinates
function distance($lat1, $lon1, $lat2, $lon2) { 
$pi80 = M_PI / 180; 
$lat1 *= $pi80; 
$lon1 *= $pi80; 
$lat2 *= $pi80; 
$lon2 *= $pi80; 
$r = 6372.797; // mean radius of Earth in km 
$dlat = $lat2 - $lat1; 
$dlon = $lon2 - $lon1; 
$a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2); 
$c = 2 * atan2(sqrt($a), sqrt(1 - $a)); 
$km = $r * $c; 
//echo ' '.$km; 
return $km; 
}
//Finds the nearest parcel machine to the user input
function dataForCalc($inputStart) {
	//Converts user input to coordinates
	  $userStartLat = geoCodeFinder($inputStart)[0];
	  $userStartLon = geoCodeFinder($inputStart)[1];
	//Connecting to database
	  $notice = "<p>Error finding data.</p> \n";
	  $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	  //Selects needed tables from DB
	  $conn->set_charset("utf8");
	  $SQLsentence = "select omniva_id, lon, lat from omniva_machines"; 
	  $stmt = $conn->prepare($SQLsentence);
	  
	  $stmt->bind_result($idfromdb, $lonfromdb, $latfromdb);
	  $stmt->execute();
	  
	  $lines = "";
	  $nearestID = 0;
	  $distanceToCompare = 1000;
	  
	  while($stmt->fetch()) {

		$distance = distance($userStartLat, $userStartLon, $latfromdb, $lonfromdb);
		//Finds the ID of nearest parcel machine
		if ($distance < $distanceToCompare){
			$distanceToCompare = $distance;
			$nearestID = $idfromdb;
		}
		
//For testing purpose
		// $lines .= "<td>" .$idfromdb ."</td>\n";  
		// $lines .= "<td>" .$latfromdb ."</td>\n"; 
		// $lines .= "<td>" .$lonfromdb ."</td>\n";  		
		// $lines .= "<td>" .$userStartLat ."</td>\n";  	
		// $lines .= "<td>" .$userStartLon ."</td>\n"; 
		// $lines .= "<td>" .$nearestID ."</td>\n"; 
		// $lines .= "<td>" .$distanceToCompare ."</td>\n"; 
		// $lines .= "<td>" .$distance ."</td></tr>\n";

	  // }
//For testing purpose
		// if(!empty($lines)) {
		  // $notice = "<table>\n<tr>\n" .'<th>Omniva id </th>';
		  // $notice .= "\n" .'<th>lat</th>';
		  // $notice .= "\n" .'<th>lon</th>';
		  // $notice .= "\n" .'<th>latStart</th>';
		   // $notice .= "\n" .'<th>lonstart</th>';
		  // $notice .= "\n" .'<th>nearestID</th>';
		  // $notice .= "\n" .'<th>distanceToCompare</th>';
		  // $notice .= "\n" .'<th>distance</th>';
		  // $notice .= "</tr>\n" .$lines ."</table>\n";
	  }
	  //$data = $distanceToCompare; //array($nearestID, $distanceToCompare);
	  $data['nearestID'] = $nearestID;
	  $data['distanceToCompare'] = $distanceToCompare;
//	  

	  $stmt->close();
	  $conn->close();
	  return $data;
  }
  
 function getParcelAddress($parcel_ID){
	$notice = "<p>Error finding data.</p> \n";
	  $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	  //Selects needed tables from DB
	  $conn->set_charset("utf8");
	  
	  $SQLsentence = "select omniva_id, kauplus, maakond, valla_nimi, linn, aadress, number from omniva_machines ";
	  $stmt = $conn->prepare($SQLsentence);
	  
	  $stmt->bind_result($idfromdb, $kauplusfromdb, $maakondfromdb, $valdfromdb, $linnfromdb, $aadressfromdb, $numberfromdb);
	  $stmt->execute();
	  $lines = "";
	  $aadress = "";
	  
	  while($stmt->fetch()) {

		if ($parcel_ID==$idfromdb){
			$aadress = $kauplusfromdb .$maakondfromdb;
		}
 }
 if(!empty($lines)) {
		  $notice = "<table>\n<tr>\n" .'<th>Omniva id </th>';
		  $notice .= "\n" .'<th>nearestID</th>';
		  $notice .= "</tr>\n" .$lines ."</table>\n";
	  }
 
	  $stmt->close();
	  $conn->close();
	  return $aadress;
 }
?>