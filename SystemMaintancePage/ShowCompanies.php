<?php
  //loeme andmebaasi login info muutujad
  require("../../../config.php");
  //kui kasutaja on vormis andmeid saatnud, siis salvestame andmebaasi
  require("fnc_showcompanies.php");
  
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

  $inputerror = "";

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<form>

<!-- LINK TO MAIN PAGE -->
<div class="center-text"><p><a href="home.php">Avalehele</a></p></div>
<hr>

<!-- TITLE -->
<div class="center-text" id="OmnivaOutput">
	<h2>Pakiautomaatide andmebaas</h2>
</div>

<!-- Select Company -->
<div class="center-text">
	<p> <a href="ShowCompanies.php">Omniva</a>  <a href="ManageAccount.php">Itella</a>  <a href="ManageAccount.php">DPD</a></p>
</div>

<br>

<!-- PARCEL COMPANY TITLE -->
<div class="center-text" id="OmnivaOutput">
	<h2>Omniva pakiautomaadid</h2>
</div>
<br>


<!-- Clicking on link brings person to spot where you add information to database -->
<div class="center-text">
	<div><a href="OmnivaDataMaintance.php">Muuda andmebaasis olevaid andmeid</a></div>
</div>

<br>
<br>
<!-- Output from fnc_showcompanies.php the transport companies info from database -->
<div class="center table-size" id="OmnivaOutput">
    <?php 
      echo OmnivaOutput(); 
    ?>
</div>

<div class="center table-size" id="OmnivaOutput">
    <?php 
      echo ItellaOutput(); 
    ?>
</div>

 <?php
        if(array_key_exists('button1', $_POST)) {
            button1();
        }
        else if(array_key_exists('button2', $_POST)) {
            button2();
        }
        function button1() {
            echo OmnivaOutput(); 
        }
        function button2() {
            echo "This is Button2 that is selected";
        }
    ?>
	
<form method="post">
        <input type="submit" name="button1"
                class="button" value="Button1" />
          
        <input type="submit" name="button2"
                class="button" value="Button2" />
    </form>

<div class="center-text">
	<p><a href="OmnivaDataMaintance.php">Muuda andmebaasis olevaid andmeid</a></p>
</div>

</body>
</html>

