<?php
$lat = $_REQUEST["lat"];
$locations = explode(" ", $lat);

?>
<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<p><?php echo $locations[0]; ?></p>
<p><?php echo $locations[1]; ?></p>
<p><?php echo $locations[2]; ?></p>
<p><?php echo $locations[3]; ?></p>
</body>
</html>