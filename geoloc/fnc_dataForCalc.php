<?php
require "vendor/autoload.php";
$database = "if20_marcus_praktika";
//$start = 'Aravete 15';//User input start address for calc
//$end = 'Kollane 14a, Tartu';//User input end address for calc
//Converts user input to a processable coordinate
function geoCodeFinder($input){
	//echo $input;
	$geocoder = new \OpenCage\Geocoder\Geocoder('5a7f44a78bf947aebdaaa1a484c50cfe');//<--API key neccessary for gecoding//API key2, for just in case('da0c24be00f44f3a8fcb4da9d7cd8d47'), another one 388d369f44d14ec39e73894df210035c 5a7f44a78bf947aebdaaa1a484c50cfe
	$result = $geocoder->geocode($input);
	//print_r( $result);
	if ($result && $result['total_results'] > 0) {
		$first = $result['results'][0];

		$txt = json_encode([$first['geometry']['lat'], $first['geometry']['lng']]);	//Gets coordinate	
		$txt = trim($txt, '[]');//Changes the coordinate to processable one
		$coords = explode(',', $txt);
		//print_r ($coords);

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
//echo ' '.$km; 
return $km; 
}
//Finds the nearest parcel machine to the user input
function dataForCalc($location, $company) {

	 //echo geoCodeFinder($location)[0];
	//Converts user input to coordinates
	if ((geoCodeFinder($location))!==null){
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
	  //Selects needed tables from DB
	  $conn->set_charset("utf8");
	  //$SQLsentence = "select omniva_id, lon, lat from '$company'"; 
	  $stmt = $conn->prepare("select $companyid, lon, lat from $company");
	  
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
		
	  }
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
  
 function getParcelAddress($parcel_ID, $company){
	 //echo $parcel_ID;
	 if ($company =="omniva_machines"){
		  $companyid = "omniva_id";
	  }else{
		  $companyid = $company ."_id";
	  }
	$notice = "<p>Error finding data.</p> \n";
	  $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	  //Selects needed tables from DB
	  $conn->set_charset("utf8");
	  
	  //$SQLsentence = "select omniva_id, kauplus, maakond, valla_nimi, linn, aadress, number from omniva_machines ";
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
  function dataProcess($start, $end){

  //--------------------StartData----------------------------
  //Some data
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
 function readresults($data){
    $userA = $_SESSION['a'];
    $userB = $_SESSION['b'];
    $userC = $_SESSION['c'];

    $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);

    $stmt = $conn->prepare("SELECT firma, suurus, max_kaal, hind, a, b, c FROM pakid WHERE 
    '$userA'<a AND '$userB'<b AND '$userC'<c OR 
    '$userA'<a AND '$userC'<b AND '$userB'<c OR 
    '$userB'<a AND '$userC'<b AND '$userA'<c OR 
    '$userB'<a AND '$userA'<b AND '$userC'<c OR 
    '$userC'<a AND '$userA'<b AND '$userB'<c OR 
    '$userC'<a AND '$userB'<b AND '$userA'<c OR
	('$userA'*'$userA') + ('$userB'*'$userB') + ('$userC'*'$userC') <= (a*a) + (b*b) + (c*c)
    ORDER BY hind");
    echo $conn->error;

    $stmt->bind_result($firma, $suurus, $max_kaal, $hind, $parcelA, $parcelB, $parcelC);
    $stmt->execute();

	//
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
    while($stmt->fetch()){
                
        $resultshtml .= "<tr><td>" .$firma ."</td><td>" ;
		if ($userA<$parcelA && $userB<$parcelB && $userC<$parcelC || 
			$userA<$parcelA && $userC<$parcelB && $userB<$parcelC || 
			$userB<$parcelA && $userC<$parcelB && $userA<$parcelC || 
			$userB<$parcelA && $userA<$parcelB && $userC<$parcelC || 
			$userC<$parcelA && $userA<$parcelB && $userB<$parcelC || 
			$userC<$parcelA && $userB<$parcelB && $userA<$parcelC){
			
			$resultshtml .= $suurus ."</td><td>";
			
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
				$resultshtml .= "ERROR</div> <div class='cell fourth'>ERROR <br></div> <div class='cell fifth'>";
			}
		}else{
			 $resultshtml .= $suurus ." **</td><td>";

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
				$resultshtml .= "ERROR</div> <div class='cell fourth'>ERROR <br></div> <div class='cell fifth'>";
			}
		}
        $resultshtml .= $max_kaal ."kg </td><td>" .$hind ."€ </td>";

        if($firma == "Omniva"){
            $resultshtml.="<td><button class=vormista><a href=https://minu.omniva.ee/parcel/new>Vormista pakk</a></button></td>";
        }else if($firma == "Itella"){
            $resultshtml.="<td><button class=vormista><a href=https://my.smartpost.ee/new_shipment/>Vormista pakk</a></button></td>";
        }else if($firma == "DPD"){
            $resultshtml.="<td><button class=vormista><a href=https://telli.dpd.ee/>Vormista pakk</a></button></td>";
        }else{
            $resultshtml .= "<td>ERROR</td></tr>";
        }
		$resultshtml .= "</table></div><p>** - Antud pakiautomaati mahub pakk vaid diagonaalis</p>";

    }
	if ($resultshtml=="<table cellpadding='0 30'>
						<tr>
							<th>Firma</th>
							<th>Tähis</th>
							<th>Kaugus algpunktist</th>
							<th>Kaugus lõpp-punktist</th>
							<th>Max kaal</th>
							<th>Hind</th>
							<th></th>
						</tr>"){
							$resultshtml = "<table cellpadding='0 30'><tr><th colspan='3'>Antud pakk on liiga suur pakiautomaatide jaoks. Saate kasutada kullerteenust: </th></tr>";
							$resultshtml .= "<tr><td width='33%'><button class=vormista><a href=https://minu.omniva.ee/parcel/new>Omniva</a></button></td>";
							$resultshtml .= "<td width='33%'><button class=vormista ><a href=https://itella.ee/eraklient/kojuvedu/>Itella</a></button></td>";
							$resultshtml .= "<td width='33%'><button class=vormista><a href=https://telli.dpd.ee/offer/list>DPD</a></button></td></tr>";
							//$resultshtml .= "<tr><td> siin on omniva kuller <br> siin on dpd kuller <br> siin on itella kuller";
							$resultshtml .= "</table></div>";
						}
	
	$stmt->close();
    $conn->close();
	return $resultshtml;
    
    
}
?>