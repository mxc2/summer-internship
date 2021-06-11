<?php
$geocoder = new \OpenCage\Geocoder\Geocoder('5a7f44a78bf947aebdaaa1a484c50cfe');

$result = $geocoder->geocode('Saare maakond, Saaremaa vald, Kuressaare linn, Tallinna tn, 64')
print($result);

if ($result && $result['total_results'] > 0) {
  $first = $result['results'][0];
  print $first['geometry']['lng'] . ';' . $first['geometry']['lat'] . "\n";
	echo $result;
}
?>