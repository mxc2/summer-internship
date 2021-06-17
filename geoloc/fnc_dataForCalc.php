<?php
require "vendor/autoload.php";
$database = "if20_marcus_praktika";
//Converts user input to a processable coordinate
function geoCodeFinder($input){
	$geocoder = new \OpenCage\Geocoder\Geocoder("20054b22bd6f4929badb5d4a1d9080f2");//<--API key 20054b22bd6f4929badb5d4a1d9080f2 neccessary for gecoding//API key2, for just in case('da0c24be00f44f3a8fcb4da9d7cd8d47'), another one 388d369f44d14ec39e73894df210035c 5a7f44a78bf947aebdaaa1a484c50cfe
	$result = $geocoder->geocode($input);
	if ($result && $result['total_results'] > 0) {
		$first = $result['results'][0];
		$txt = json_encode([$first['geometry']['lat'], $first['geometry']['lng']]);	//Gets coordinate	
		$txt = trim($txt, '[]');//Changes the coordinate to processable one
		$coords = explode(',', $txt);

		return $coords;
		
		
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
return $km; 
}

//Finds the nearest parcel machine to the user input
function dataForCalc($location, $company) {

        //Controlls that the address is valid and gives coordinates
	if ((geoCodeFinder($location))!==null){
	  //Converts user input to coordinates
	  $userStartLat = geoCodeFinder($location)[0];
	  $userStartLon = geoCodeFinder($location)[1];
	  if ($company =="omniva_machines"){
		  $companyid = "omniva_id";
	  }else{
		  $companyid = $company ."_id";
	  }
	  
	//Connecting to database
	  $notice = "<p>Error finding data.</p> \n";
	  $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	  //Selects necessary tables from DB
	  $conn->set_charset("utf8");
	  $stmt = $conn->prepare("select $companyid, lon, lat from $company");
	  
	  $stmt->bind_result($idfromdb, $lonfromdb, $latfromdb);
	  $stmt->execute();
	  
	  $lines = "";
	  $nearestID = 0;
	  $distanceToCompare = 1000;
	  
	  while($stmt->fetch()) {
		//Calculates distance between 1)User input 2)all the parcel machine coordinates
		$distance = distance($userStartLat, $userStartLon, $latfromdb, $lonfromdb);
		//Finds the ID of nearest parcel machine
		if ($distance < $distanceToCompare){
			$distanceToCompare = $distance;
			$nearestID = $idfromdb;
		}
		
	  }
	   //Checks whether we're dealing with km or m
	   if ($distanceToCompare < 1){
		  $distanceToCompare = round($distanceToCompare*1000) ." m";
	  }else{
		  $distanceToCompare = round($distanceToCompare, 2) ." km";
	  }
	  $data['nearestID'] = $nearestID;
	  $data['distance'] = $distanceToCompare;
	  $data['company'] = $company;
	  $stmt->close();
	  $conn->close();
	//If address is not valid
	}else{
		echo'<span style="font-size:30px;"> Aadressiga esines viga. </span>';
		
		exit;
	}
if ($distanceToCompare==1000){
	echo'<span style="font-size:30px;"> Aadressiga esines viga. </span>';
	
	exit();
}
	  return $data;
  }


//}
  //Takes parcel id and gives  corresponding address
 function getParcelAddress($parcel_ID, $company){
	 if ($company =="omniva_machines"){
		  $companyid = "omniva_id";
	  }else{
		  $companyid = $company ."_id";
	  }
	$notice = "<p>Error finding data.</p> \n";
	  $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	  //Selects needed tables from DB
	  $conn->set_charset("utf8");
	  
	  if ($company =='omniva_machines'){
		  $stmt = $conn->prepare("select $companyid, kauplus, maakond, valla_nimi, linn, aadress, number from $company ");
		  $stmt->bind_result($idfromdb, $kauplusfromdb, $maakondfromdb, $valdfromdb, $linnfromdb, $aadressfromdb, $numberfromdb);
	  }else{
		  $stmt = $conn->prepare("select $companyid, kauplus, maakond, valla_nimi, linn, aadress from $company ");
		  $stmt->bind_result($idfromdb, $kauplusfromdb, $maakondfromdb, $valdfromdb, $linnfromdb, $aadressfromdb);
	  }
	  
	  $stmt->execute();
	  $lines = "";
	  $aadress = "";
	  
	  while($stmt->fetch()) {

		if ($parcel_ID==$idfromdb){
			$aadress = $kauplusfromdb ." " .$maakondfromdb;
		}
 }
 if(!empty($lines)) {
		  $notice = "<table>\n<tr>\n" .'<th>company id </th>';
		  $notice .= "\n" .'<th>nearestID</th>';
		  $notice .= "</tr>\n" .$lines ."</table>\n";
	  }
 
	  $stmt->close();
	  $conn->close();
	  return $aadress;
 }
  // All of the data proccessing starts from here
  function dataProcess($start, $end){
  //--------------------StartData----------------------------
  //Data of the nearest parcel machine
  $omnivaPropStart = dataForCalc($start, 'omniva_machines');
  $itellaPropStart = dataForCalc($start, 'itella');
  $dpdPropStart = dataForCalc($start, 'dpd');
  
  //Getting id for the address
  $omnivaidStart = $omnivaPropStart['nearestID'];
  $dpdidStart = $dpdPropStart['nearestID'];
  $itellaidStart = $itellaPropStart['nearestID'];
  //Distances
  $data['omnivaDistanceStart'] = $omnivaPropStart['distance'];
  $data['dpdDistanceStart'] = $dpdPropStart['distance'];
  $data['itellaDistanceStart'] = $itellaPropStart['distance'];
  //Addresses
  $data['omnivaAddressStart'] = getParcelAddress($omnivaidStart, 'omniva_machines');
  $data['dpdAddressStart'] = getParcelAddress($dpdidStart, 'dpd');
  $data['itellaAddressStart'] = getParcelAddress($itellaidStart, 'itella');
  //--------------------EndData----------------------------
  $omnivaPropEnd = dataForCalc($end, 'omniva_machines');
  $itellaPropEnd = dataForCalc($end, 'itella');
  $dpdPropEnd = dataForCalc($end, 'dpd');
  //
  $omnivaidEnd = $omnivaPropEnd['nearestID'];
  $dpdidStartEnd = $dpdPropEnd['nearestID'];
  $itellaidtEnd = $itellaPropEnd['nearestID'];
  //Distances
  $data['omnivaDistanceEnd'] = $omnivaPropEnd['distance'];
  $data['dpdDistanceEnd'] = $dpdPropEnd['distance'];
  $data['itellaDistanceEnd'] = $itellaPropEnd['distance'];
  //Addresses
  $data['omnivaAddressEnd'] = getParcelAddress($omnivaidEnd, 'omniva_machines');
  $data['dpdAddressEnd'] = getParcelAddress($dpdidStartEnd, 'dpd');
  $data['itellaAddressEnd'] = getParcelAddress($itellaidtEnd, 'itella');
  
  return $data;
  
 }


 //Generating parcel sending cost for each company
 function readresults($data, $weight){

    $userA = $_SESSION['a'];
    $userB = $_SESSION['b'];
    $userC = $_SESSION['c'];
    $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
    //With this we find the cheapest parcel service for each company
    $stmt = $conn->prepare("SELECT firma, suurus, max_kaal, MIN(hind), a, b, c FROM pakid WHERE 
    '$userA'<a AND '$userB'<b AND '$userC'<c AND  max_kaal >= '$weight' OR 
    '$userA'<a AND '$userC'<b AND '$userB'<c AND  max_kaal >= '$weight' OR 
    '$userB'<a AND '$userC'<b AND '$userA'<c AND  max_kaal >= '$weight' OR 
    '$userB'<a AND '$userA'<b AND '$userC'<c AND  max_kaal >= '$weight' OR 
    '$userC'<a AND '$userA'<b AND '$userB'<c AND  max_kaal >= '$weight' OR 
    '$userC'<a AND '$userB'<b AND '$userA'<c AND  max_kaal >= '$weight'
    GROUP BY firma ORDER BY hind");
    echo $conn->error;


    $stmt->bind_result($firma, $suurus, $max_kaal, $hind, $parcelA, $parcelB, $parcelC);
    $stmt->execute();


    //Creates table for the potential parcel services with prices
    $resultshtml = "<table cellpadding='0 30'>
						<tr>
							<th>Firma</th>
							<th>Tähis</th>
							<th>Kaugus algpunktist</th>
							<th>Kaugus lõpp-punktist</th>
							<th>Max kaal</th>
							<th>Hind</th>
							<th></th>
						</tr>";
    //When potential service found then into the loop
    while($stmt->fetch()){
        $resultshtml .= "<tr><td>" .$firma ."</td><td>" ;
			
		$resultshtml .= $suurus ."</td><td>";
		//Checks which company
		if($firma == "Omniva"){
			$resultshtml .= $data['omnivaAddressStart']. "<br>" .$data['omnivaDistanceStart'] 
			."</td><td>" .$data['omnivaAddressEnd'] ."<br>" .$data['omnivaDistanceEnd']  
			."</td><td>";
		}else if($firma == "Itella"){
			$resultshtml .= $data['itellaAddressStart']. "<br>" .$data['itellaDistanceStart'] 
			."</td><td>" .$data['itellaAddressEnd'] ."<br>" .$data['itellaDistanceEnd']  
			."</td><td>";
		}else if($firma == "DPD"){
			$resultshtml .= $data['dpdAddressStart']. "<br>" .$data['dpdDistanceStart'] 
			."</td><td>" .$data['dpdAddressEnd'] ."<br>" .$data['dpdDistanceEnd']  
			."</td><td>";
		}else{
			$resultshtml .= "ERROR</td><td>ERROR <br></td> <td>";
		}
		
        $resultshtml .= $max_kaal ."kg </td><td>" .$hind ."€ </td>";

	//Adds links to the service
        if($firma == "Omniva"){
            $resultshtml.="<td><a class=vormista href=https://minu.omniva.ee/parcel/new target='_blank'>Vormista</a></td>";
        }else if($firma == "Itella"){
            $resultshtml.="<td><a class=vormista href=https://my.smartpost.ee/new_shipment/ target='_blank'>Vormista</a></td>";
        }else if($firma == "DPD"){
            $resultshtml.="<td><a class=vormista href=https://telli.dpd.ee/ target='_blank'>Vormista</a></td>";
        }else{
            $resultshtml .= "<td>ERROR</td></tr>";
        }
		

    }
	$resultshtml .= "</table></div>";
	 //If no services found then gives courier links
	if ($resultshtml=="<table cellpadding='0 30'>
						<tr>
							<th>Firma</th>
							<th>Tähis</th>
							<th>Kaugus algpunktist</th>
							<th>Kaugus lõpp-punktist</th>
							<th>Max kaal</th>
							<th>Hind</th>
							<th></th>
						</tr></table></div>"){
							$resultshtml = "<table cellpadding='0 30'><tr><th colspan='3'>Antud pakk on liiga suur või raske pakiautomaatide jaoks. Saate kasutada kullerteenust: </th></tr>";
							$resultshtml .= "<tr><td width='33%'><a class=vormista href=https://minu.omniva.ee/parcel/new targer='_blank'>Omniva</a></td>";
							$resultshtml .= "<td width='33%'><a class=vormista href=https://itella.ee/eraklient/kojuvedu/ target='_blank'>Itella</a></td>";
							$resultshtml .= "<td width='33%'><a class=vormista href=https://telli.dpd.ee/offer/list target='_blank'>DPD</a></td></tr>";
							$resultshtml .= "</table>";
						}
	
	$stmt->close();
    $conn->close();
	return $resultshtml;
    
    
}
?>
