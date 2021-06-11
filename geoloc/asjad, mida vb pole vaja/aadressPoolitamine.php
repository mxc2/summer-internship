<?php

$myfile = fopen("itellaAad.txt", "r");
$destfile = fopen("itellaOige.txt", "w") or die("Unable to open file!");

//$result = $geocoder->geocode(' Punane 16b, Tallinn');
if ($myfile){
	while (($line = fgets($myfile)) !== false){
		$result = $geocoder->geocode($line);
		if ($result && $result['total_results'] > 0) {
			$first = $result['results'][0];
			//echo json_encode([
			//'lat' => $first['geometry']['lat'],
			//'lon' => $first['geometry']['lng'],
			$txt = "Dpd ".json_encode([$first['geometry']['lat'], $first['geometry']['lng']])."\n";
			fwrite($destfile, $txt);


}
	}
	fclose($destfile);
	fclose($myfile);
}else{
	print("error");
}
?>