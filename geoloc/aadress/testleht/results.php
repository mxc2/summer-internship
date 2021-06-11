<?php
session_start();

require("../../config.php");
$database = "if20_marcus_praktika";


function readresults(){
    $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
    
    $stmt = $conn->prepare("SELECT * FROM pakid");
    echo $conn->error;

    $stmt->bind_result($pakid_id, $firma, $suurus, $a, $b, $c, $max_kaal, $hind);
    $stmt->execute();
    
    $resultshtml = "<ol> \n";
    while($stmt->fetch()){
        $resultshtml .= "\t <li>" .$pakid_id ."\n";
        $resultshtml .= "\t \t <ul> \n";
        $resultshtml .= "\t \t <li>Firma: " .$firma ." </li> \n";
        $resultshtml .= "\t \t <li>Suurus: " .$suurus ." minutit</li> \n";
        $resultshtml .= "\t \t <li>1. külg: " .$a ." </li> \n";
        $resultshtml .= "\t \t <li>2. külg: " .$b ." </li> \n";
        $resultshtml .= "\t \t <li>3. külg: " .$c ." </li> \n";
        $resultshtml .= "\t \t <li>Max kaal: " .$max_kaal ." </li> \n";
        $resultshtml .= "\t \t <li>Hind: " .$hind ." </li> \n";
        $resultshtml .= "\t \t </ul> \n";
        $resultshtml .= "\t \t </li> \n";
    }
    $resultshtml .= "</ol>"; 
    $stmt->close();
    $conn->close();
    return $resultshtml;
}

require("header.php");
?>


<section id="section10">

    <div id="enteredsize"><h2>Tulemused pakile suurusega: <?php echo $_SESSION['a']; ?>×<?php echo $_SESSION['b']; ?>×<?php echo $_SESSION['c']; ?> <br>
    <?php echo $_SESSION['start']; ?> &rarr; <?php echo $_SESSION['end']; ?></h2></div>

    <div></div>

    <div class="row row1" >
        <div class="cell first">Firma</div>
        <div class="cell second">Suurus</div>
        <div class="cell third">Aadress1</div>
        <div class="cell fourth">Aadress2</div>
        <div class="cell fifth">Max kaal</div>
        <div class="cell sixth">Hind</div>
        <div class="cell seventh"></div>
    </div>
    <div class="row" >
        <div class="cell first">Omniva</div>
        <div class="cell second">M</div>
        <div class="cell third">Endla 45, Tallinn<br>300 m</div>
        <div class="cell fourth">Turu 2, Tartu<br>2 km</div>
        <div class="cell fifth">30 kg</div>
        <div class="cell sixth">2.89 €</div>
        <div class="cell seventh"><button class="vormista"><a href="https://minu.omniva.ee/parcel/new">Vormista pakk</a></button></div>
    </div>
    <div class="row" >
        <div class="cell first">DPD</div>
        <div class="cell second">S</div>
        <div class="cell third">Tatari 64, Tallinn<br>700 m</div>
        <div class="cell fourth">Riia 2, Tartu<br>1 km</div>
        <div class="cell fifth">3 kg</div>
        <div class="cell sixth">2.99 €</div>
        <div class="cell seventh"><button class="vormista"><a href="https://telli.dpd.ee/">Vormista pakk</a></button></div>
    </div>
    <div class="row" >
        <div class="cell first">Itella</div>
        <div class="cell second">M</div>
        <div class="cell third">Videviku 23, Tallinn<br>200 m</div>
        <div class="cell fourth">Küüni 2, Tartu<br>100 m</div>
        <div class="cell fifth">35 kg</div>
        <div class="cell sixth">3.99 €</div>
        <div class="cell seventh"><button class="vormista"><a href="https://my.smartpost.ee/new_shipment/">Vormista pakk</a></button></div>
    </div>


    <!-- tagasi nupp!!!! -->
</section>

</div>


<?php
    require("footer.php");
?>