<?php
require "vendor/autoload.php";

$myfile = fopen("omnivaAutomaatideAadressid2.txt", "r");
$destfile = fopen("omnivaKoodid2.txt", "w") or die("Unable to open file!");
$geocoder = new \OpenCage\Geocoder\Geocoder('5a7f44a78bf947aebdaaa1a484c50cfe');
//$result = $geocoder->geocode(' Punane 16b, Tallinn');
if ($myfile){
	while (($line = fgets($myfile)) !== false){
		$result = $geocoder->geocode($line);
		if ($result && $result['total_results'] > 0) {
			$first = $result['results'][0];
			//echo json_encode([
			//'lat' => $first['geometry']['lat'],
			//'lon' => $first['geometry']['lng'],
			$txt = "Omniva ".json_encode([$first['geometry']['lat'], $first['geometry']['lng']])."\n";
			fwrite($destfile, $txt);


}
	}
	fclose($destfile);
	fclose($myfile);
}else{
	print("error");
}


?>