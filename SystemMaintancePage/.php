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
	   //exit();
  }
?>
<head>
	<link rel="stylesheet" href="styles.css">

</head>
<body>
<!-- PAGE LOGO -->
<div class="center-logo"> <img src="../img/logo.png" alt="Logo Parimautomaat"width=300>

<form>
<!-- Links to other pages -->
	<ul>
		<li> <a href="ShowCompanies.php">Vaata / Muuda andmebaasis olevaid pakiautomaate </a></li>
		<li><a href="ParcelMachineDoorSizes.php">Halda pakiautomaatide uste suurusi</a></li>
		<li><a href="ManageAccount.php"> Halda kontot</a></li>
		<li><a href="addnewuser.php">Loo uus konto</a></li>
		<li><a href="LogOut.php">Logi välja</a></li>
	</ul>
</form>
</body> 	
</html>
<style>
</style>