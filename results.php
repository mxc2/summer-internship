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
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="script.js" defer></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&family=Quicksand:wght@500;600&display=swap" rel="stylesheet">
    <title>Projekt</title>
</head>
<body>


<div id="navResults">
    <div id="head1results">
        <a href=http://greeny.cs.tlu.ee/~steltam/suvepraktika>
            <img src="img/logo.png" alt="Logo" width="300">
        </a>
    </div>
    <div id="head2results">
        <a href="http://greeny.cs.tlu.ee/~steltam/suvepraktika/#section4">
            <i class="fa fa-question-circle"></i>
            Info
        </a>
    </div>
</div>

    
<section id="section10">

    <div id="enteredsize"><h2>Tulemused pakile suurusega: 
        <?php if (!empty($_SESSION['start'])){
            echo $_SESSION['a']; ?> cm × <?php echo $_SESSION['b']; ?> cm × <?php echo $_SESSION['c'];}?> cm<br>
        
        <?php if (!empty($_SESSION['start'])){
            echo $_SESSION['start']; ?> &rarr; <?php echo $_SESSION['end'];}?></h2>
    </div>
		
    <div id="table">
        <?php 
            if (!empty($_SESSION['start'])){
                $data = dataProcess(($_SESSION['start']), (($_SESSION['end'])));}
            if (!empty($_SESSION['start'])){
                echo readresults($data);} 
        ?>
    </div>
    <button id="backToFP"><a href="http://greeny.cs.tlu.ee/~steltam/suvepraktika">Tagasi esilehele</a></button>

</section>


<?php
    require("footer.php");
?>
