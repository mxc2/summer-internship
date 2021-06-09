<?php
require "vendor/autoload.php";

$geocoder = new \OpenCage\Geocoder\Geocoder('da0c24be00f44f3a8fcb4da9d7cd8d47');

$myfile = fopen("koikAutomaatideKoodid.txt", "r");
$start = 'Narva-Jõesuu linn, Kesk tn, 3';//$_POST['start'];
$end = 'Kollane 14a, Tartu';//$_POST['end'];

function koodiLeidmine($input){
	$geocoder = new \OpenCage\Geocoder\Geocoder('da0c24be00f44f3a8fcb4da9d7cd8d47');

	$result = $geocoder->geocode($input);
	if ($result && $result['total_results'] > 0) {
		$first = $result['results'][0];

		$txt = json_encode([$first['geometry']['lat'], $first['geometry']['lng']]);
			//json_encode([ 'lat' => $coords->getLatitude(), 'lon' => $coords->getLongitude() ]) . "\n";
		//$editedtxt = trim($txt, "[]");//array
		//echo $txt;
		$txt = trim($txt, '[]');
		echo $txt."\n";
		return $txt;
		
	}
}
$startKoordString = koodiLeidmine($start);//stringina
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
?>
<!DOCTYPE html>
<html lang="et">
<head>
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

/////////////////////////////////////////
function readTextFile(file)
{
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                var allText = rawFile.responseText;
                //alert(allText);
				console.log(allText)
				var x = '|f|oo||';
				var y = x.replace(/^\|+|\|+$/g, '');
				document.write(x + '<br />' + y);
				
            }
        }
    }
    rawFile.send(null);
}
 readTextFile("koikAutomaatideKoodid.txt"); 
  
   
</script>

</body>
</html>