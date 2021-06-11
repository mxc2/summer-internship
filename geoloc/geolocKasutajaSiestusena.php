<?php
require "vendor/autoload.php";
/////////////////////////////DB

require("../../../config.php");

$database = "if20_marcus_praktika";

/////////////////////////////DB
//API key2, for just in case('da0c24be00f44f3a8fcb4da9d7cd8d47');

$start = 'Tööstuse 103, Tallinn';//$_POST['start'];
$end = 'Kollane 14a, Tartu';//$_POST['end'];

//Changes users address into a coordinate
function koodiLeidmine($input){
	$geocoder = new \OpenCage\Geocoder\Geocoder('5a7f44a78bf947aebdaaa1a484c50cfe');//vajalik api

	$result = $geocoder->geocode($input);
	if ($result && $result['total_results'] > 0) {
		$first = $result['results'][0];

		$txt = json_encode([$first['geometry']['lat'], $first['geometry']['lng']]);
			//json_encode([ 'lat' => $coords->getLatitude(), 'lon' => $coords->getLongitude() ]) . "\n";
		
		//echo $txt;
		$txt = trim($txt, '[]');//Changes the coordinate to processable one
		//echo $txt."\n";
		return $txt;
		
	}
}
$startKoordString = koodiLeidmine($start);
echo gettype($startKoordString);
echo $startKoordString."\n";
$startIDs = explode(',', $startKoordString);
print_r ($startIDs);
//echo $startIDs;


// echo gettype($startIDs)."\n";
// echo $startIDs[0]."\n";
//echo $startIDs."\n";
// print_r ($startIDs);

// $endKoordString = koodiLeidmine($end);
// $endKoord = (string)$endKoordString;
// $endIDs = explode(',', $endKoord);
// print_r ($endIDs);

function getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'kilometers') {
  $theta = $longitude1 - $longitude2; 
  $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
  $distance = acos($distance); 
  $distance = rad2deg($distance); 
  $distance = $distance * 60 * 1.1515; 
  switch($unit) { 
    case 'miles': 
      break; 
    case 'kilometers' : 
      $distance = $distance * 1.609344; 
  } 
  return (round($distance,2)); 
}
?>
<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">

</body>
</html>