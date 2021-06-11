<?php
  require("../../../config.php");
  require("fnc_dataForCalc.php");
  //$value = koodiLeidmine($start);
  //echo $value;
?>
<!DOCTYPE html>
<html lang="et">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<head>
  <meta charset="utf-8">
</head>
<body>
<form>

<div id="kalk">
    <h2>Kalk</h2>
    

	  <?php echo "start l2hima_id on  --> " .dataForCalc($start)['nearestID'];?>
	  
	  <br>
	  <?php echo "selle distants kasutaja inputist on    -->" .dataForCalc($start)['distanceToCompare'] ." km";?>
	   
	  <br>
	  <?php echo "Aadress1:   --> " .getParcelAddress(dataForCalc($start)['nearestID']); ?>
	  
	  <br>
	  <?php echo "end l2hima_id on    -->" .dataForCalc($end)['nearestID'];?>
	  
	  <br>
	  <?php echo "selle distants kasutaja inputist on   --> " .dataForCalc($end)['distanceToCompare'] ." km";?>
	  <br>
	  <br>
	  <?php echo "Aadress1:   --> " .getParcelAddress(dataForCalc($end)['nearestID']); ?>
	  
   
  </div>

</form>
</body>
</html>

