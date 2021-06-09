<?php
require "vendor/autoload.php";

$geocoder = new \OpenCage\Geocoder\Geocoder('da0c24be00f44f3a8fcb4da9d7cd8d47');

$myfile = fopen("koikAutomaatideKoodid.txt", "r");
$start = 'Tööstuse 103, Tallinn';//$_POST['start'];
$end = 'Kollane 14a, Tartu';//$_POST['end'];

//Muudab aadressi loetavaks koordinaadiks
function koodiLeidmine($input){
	$geocoder = new \OpenCage\Geocoder\Geocoder('5a7f44a78bf947aebdaaa1a484c50cfe');//vajalik api

	$result = $geocoder->geocode($input);
	if ($result && $result['total_results'] > 0) {
		$first = $result['results'][0];

		$txt = json_encode([$first['geometry']['lat'], $first['geometry']['lng']]);
			//json_encode([ 'lat' => $coords->getLatitude(), 'lon' => $coords->getLongitude() ]) . "\n";
		
		//echo $txt;
		$txt = trim($txt, '[]');//Trimmib koordinaadi loetavaks, eemaldab bracketid
		echo $txt."\n";
		return $txt;
		
	}
}
$startKoordString = koodiLeidmine($start);//Siit tuleb koordinaat
//$startKoord = (array)$startKoordString;//peaks olema array nyyd, ...nvm lol
$startKoord = (string)$startKoordString;
echo gettype($startKoord);
echo $startKoord."\n";
$startIDs = explode(',', $startKoord);



echo gettype($startIDs)."\n";
echo $startIDs[0]."\n";
//echo $startIDs."\n";
print_r ($startIDs);

$endKoordString = koodiLeidmine($end);
$endKoord = (string)$endKoordString;
$endIDs = explode(',', $endKoord);
print_r ($endIDs);

/**
 * Calculates the great-circle distance between two points, with
 * the Vincenty formula.
 * @param float $latitudeFrom Latitude of start point in [deg decimal]
 * @param float $longitudeFrom Longitude of start point in [deg decimal]
 * @param float $latitudeTo Latitude of target point in [deg decimal]
 * @param float $longitudeTo Longitude of target point in [deg decimal]
 * @param float $earthRadius Mean earth radius in [m]
 * @return float Distance between points in [m] (same as earthRadius)
 */
/*function vincentyGreatCircleDistance(
  $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
{
  // convert from degrees to radians
  $latFrom = deg2rad($latitudeFrom);
  $lonFrom = deg2rad($longitudeFrom);
  $latTo = deg2rad($latitudeTo);
  $lonTo = deg2rad($longitudeTo);

  $lonDelta = $lonTo - $lonFrom;
  $a = pow(cos($latTo) * sin($lonDelta), 2) +
    pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
  $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

  $angle = atan2(sqrt($a), $b);
  return $angle * $earthRadius;
}
vincentyGreatCircleDistance($startIDs[0], $startIDs[1], $endIDs[0], $endIDs[1], $earthRadius = 6371000);
*/
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <meta charset="utf-8">
</head> 
<body>

<div id="asi"></div>
<title>Asi</title>
<script>
function degreesToRadians(degrees) {
  return degrees * Math.PI / 180;
}
var lat1 = <?php echo $startIDs[0]; ?>;
var lon1 = <?php echo $startIDs[1]; ?>;

var lat2 = <?php  echo $endIDs[0]; ?>;
var lon2 = <?php  echo $endIDs[1]; ?>;

function distanceInKmBetweenEarthCoordinates(lat1, lon1, lat2, lon2) {
  var earthRadiusKm = 6371;

  var dLat = degreesToRadians(lat2-lat1);
  var dLon = degreesToRadians(lon2-lon1);

  lat1 = degreesToRadians(lat1);
  lat2 = degreesToRadians(lat2);

  var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
          Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2); 
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
  var resultant = earthRadiusKm * c;
  console.log(resultant);
  document.getElementById('asi').innerHTML=resultant
}
distanceInKmBetweenEarthCoordinates(lat1, lon1, lat2, lon2);
function loeteksti(){
	var txtFile = new XMLHttpRequest(); //muutuja tekstifaili jaoks
	//avan tekstifaili
	txtFile.open("GET", "http://greeny.cs.tlu.ee/~steltam/projekt/geoloc/koikAutomaatideKoodid.txt", true);
	//kui tekstifaili olek on muutunud - ehk siis fail ilmselt avatakse, tأ¤idetakse kohe أ¼ks funktsioon (siin أ¼ks funktsioon kirjeldatud teise sees)
	txtFile.onreadystatechange = function (){
		//fail oli ikka olemas ja valmis lugemiseks
		if (txtFile.readyState === 4){  
			if (txtFile.status === 200){  
				//mida tehakse, kui fail loetud
				//siin kirjutatakse loetud sisu أ¼he <div> elemendi sisse aga vأµib teha ka muud		
				document.getElementById("sisu").innerHTML = txtFile.responseText;  
			}
		}
	}
	txtFile.send(null)
}
</script> 

</body>
</html>