<?php
  require("../../../config.php");
  require("fnc_dataForCalc.php");
  $data = dataProcess("Aravete 15", "Tallinna punane 15");
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
    

	  <?php echo "Omniva info: Kaugus on "  ." Aadress on " .$data['omnivaAddressStart'];?>
	<br>

   
  </div>

</form>
</body>
</html>

