<?php
require "vendor/autoload.php";

$myfile = fopen("omnivaAutomaatideAadressid.txt", "r");
$destfile = fopen("omnivaKoodid1.txt", "w") or die("Unable to open file!");
$geocoder = new \OpenCage\Geocoder\Geocoder('da0c24be00f44f3a8fcb4da9d7cd8d47');
//$result = $geocoder->geocode(' Punane 16b, Tallinn');
if ($myfile){
	while (($line = fgets($myfile)) !== false){
		$result = $geocoder->geocode($line);
		if ($result && $result['total_results'] > 0) {
			$first = $result['results'][0];
			//echo json_encode([
			//'lat' => $first['geometry']['lat'],
			//'lon' => $first['geometry']['lng'],
			$txt = "Omniva  ".json_encode([$first['geometry']['lat'], $first['geometry']['lng']])."\n";
			fwrite($destfile, $txt);


}else{
	fwrite($destfile, "error");
}	
	}
	fclose($destfile);
	fclose($myfile);
}else{
	print("error");
}


?>