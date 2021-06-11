<?php
require "vendor/autoload.php";

$geocoder = new \OpenCage\Geocoder\Geocoder('5a7f44a78bf947aebdaaa1a484c50cfe');
$result = $geocoder->geocode(' Punane 16b, Tallinn');
if ($result && $result['total_results'] > 0) {
    $first = $result['results'][0];
    echo json_encode([
        'lat' => $first['geometry']['lat'],
        'lon' => $first['geometry']['lng'],
    ]);

}
?>


<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
</head> 
<body>

<title>Asi</title>
<script>
function degreesToRadians(degrees) {
  return degrees * Math.PI / 180;
}
var lat1 = 58.1260316;
var lon1 = 25.358787;

var lat2 = 58.59;
var lon2 = 25.48;

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

  
   
</script>
<div id="asi"></div>



    
</body>
</html>