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

<input  type="submit" name="submit" value="Leia parim pakiautomaat">
<div id="InAadress" style="width: 600px; height: 450px"></div>
<div id="InAadress2" style="width: 600px; height: 450px"></div>
<script>
var lat = 0;
var lon = 0;
var test = 0;

var inAadress = new InAadress({"container":"InAadress","mode":"2","nocss":false,"appartment":0,"ihist":"2014","lang":"et"});

var inAadress2 = new InAadress({"container":"InAadress2","mode":"3","nocss":false,"appartment":0,"ihist":"2014","lang":"et"});

document.addEventListener('addressSelected', function(e){
 var info = e.detail;
 
 
 if(test == 0){
	 var aadress = e.detail[0]["aadress"];
	 inAadress.setAddress(aadress);
	 lat = e.detail[0]["b"];
	 lon = e.detail[0]["l"];
	 console.log("test");
	 console.log(lat);
	 console.log(lon);
	 test += 1;
 } else if (test == 1){
	 var aadress2 = e.detail[0]["aadress"];
	 inAadress2.setAddress(aadress2);
	 lat = e.detail[0]["b"];
	 lon = e.detail[0]["l"];
	 console.log(e.detail);
	 console.log(lat);
	 console.log(lon);
 }
 data: { lat : lat };
 inAadress.hideResult();
 inAadress2.hideResult();
});


</script>
</body>
</html>