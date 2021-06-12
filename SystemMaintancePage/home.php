<?php
  session_start();
  //Check if person logged in
  if(!isset($_SESSION["userid"])){
	  header("Location: index.php");
  }
  //Moving them out
  if(isset($_GET["logout"])){
	  session_destroy();
	   header("Location: index.php");
	   exit();
  }
?>

<body>
<form>
<!-- Lingid teistele lehtedele -->
<ul>
	<li><a href="ShowCompanies.php">Vaata / Muuda andmebaasis olevaid pakiautomaate </a></li>
	<li><a href="ParcelMachineDoorSizes.php">Halda pakiautomaatide uste suurusi</a></li>
	<li><a href="ManageAccount.php"> Halda kontot</a></li>
	<li><a href="addnewuser.php">Loo uus konto</a></li>
</ul>

</form>
</body>
</html>

