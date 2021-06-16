<?php
$Output = "";

  if(isset($_POST['lat']))
{
    $uid = $_POST['lat'];
	$Output = $uid;
   // Do whatever you want with the $uid
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>In-ADS komponent</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width">
<script type="text/javascript" src="https://inaadress.maaamet.ee/inaadress/js/inaadress.min.js"></script>
</head>
<body>
<p><?php echo $Output; ?></p>

<!--<input  type="submit" name="submit" value="Leia parim pakiautomaat">-->
<div id="InAadress" style="width: 600px; height: 450px"></div>
<div id="InAadress2" style="width: 600px; height: 450px"></div>
<script defer>
var lat = 0;
var lon = 0;
let whichbox = 0;
let inputs = [];

 window.onload = function(){
	inputs = document.getElementsByTagName("input");
	console.log(inputs[1]);
	console.log("Juhhei");
	inputs[1].id = "Kast1";
	inputs[0].id = "Kast2";
	document.getElementById("Kast1");
	document.getElementById("Kast1").addEventListener("keydown", testing);
	document.getElementById("Kast2").addEventListener("keydown", testing2);

 }
 
var inAadress = new InAadress({"container":"InAadress","mode":"2","nocss":false,"appartment":0,"ihist":"2014","lang":"et"});

var inAadress2 = new InAadress({"container":"InAadress2","mode":"3","nocss":false,"appartment":0,"ihist":"2014","lang":"et"});

// inputs[1].addEventListener("addressSelected", testing);


function testing(){
	console.log("Teine");
	whichbox = 2;
}

function testing2(){
	console.log("Esimene");
	whichbox = 1;
}

document.addEventListener('addressSelected', function(e){
 var info = e.detail;

console.log(e.detail);
console.log(e.target.id);



 if(whichbox == 1){
	 var aadress = e.detail[0]["aadress"];
	 inAadress.setAddress(aadress);
	 lat = e.detail[0]["b"];
	 lon = e.detail[0]["l"];
	 console.log("test");
	 console.log(lat);
	 console.log(lon);
	 var test = 1;
 } else if (whichbox == 2){
	 var aadress2 = e.detail[0]["aadress"];
	 inAadress2.setAddress(aadress2);
	 lat2 = e.detail[0]["b"];
	 lon2 = e.detail[0]["l"];
	 console.log("test2");
	 console.log(lat2);
	 console.log(lon2);
 }
 data: { lat : lat };
 inAadress.hideResult();
 inAadress2.hideResult();
});


</script>
</body>
</html>