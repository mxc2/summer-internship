<?php
session_start();
require("geoloc/fnc_dataForCalc.php");
require("../../config.php");
$database = "if20_marcus_praktika";
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&family=Quicksand:wght@500;600&display=swap" rel="stylesheet">
    <title>Tulemused | Parimautomaat</title>
</head>
<body>

<!-- header -->
<div id="navResults">
    <div id="head1results">
        <a href=http://greeny.cs.tlu.ee/~steltam/suvepraktika>
            <img src="img/logo.png" alt="Logo" width="300">
        </a>
    </div>
    <div id="head2results">
        <a href="http://greeny.cs.tlu.ee/~steltam/suvepraktika/#section4">
            <i class="fa fa-question-circle"></i>
            KKK
        </a>
    </div>
</div>


<!-- terve lehe sektsioon -->
<section id="section10">

    <!-- sessioonimuutujatest tulevad andmed näidatakse kastis -->
    <div id="enteredsize"><h2>Tulemused pakile suurusega: 
        <?php if (!empty($_SESSION['start'])){
            echo $_SESSION['a']; ?> cm × <?php echo $_SESSION['b']; ?> cm × <?php echo $_SESSION['c'];?> cm<br>
            Kaaluga: <?php echo $_SESSION['weight']; ?> kg<hr>
            <?php echo $_SESSION['start']; ?> &rarr; <?php echo $_SESSION['end'];}?></h2>
    </div>
		
    <!-- tabelina näidatakse kõik tulemused, kutsutakse välja funktsioonid tabeli kuvamiseks -->
    <div id="table">
        <?php 
            if (!empty($_SESSION['start'])){
                $data = dataProcess(($_SESSION['start']), ($_SESSION['end']));}
            if (!empty($_SESSION['start'])){
                echo readresults($data, $_SESSION['weight']);} 
        ?>
    </div>

    <!-- tagasi esilehele nupp -->
    <a href="http://greeny.cs.tlu.ee/~steltam/suvepraktika"><button id="backToFP">Tagasi esilehele</button></a>


</section>



<!-- kutsub footer'i välja -->
<?php
    require("footer.php");
?>