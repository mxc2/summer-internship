<?php
session_start();
require("geoloc/fnc_dataForCalc.php");
require("../../config.php");
$database = "if20_marcus_praktika";

//Data process
$data = dataProcess(($_SESSION['start']), (($_SESSION['end'])));



function readresults($data){
	
    $userA = $_SESSION['a'];
    $userB = $_SESSION['b'];
    $userC = $_SESSION['c'];

    $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);

    $stmt = $conn->prepare("SELECT pakid_id, firma, suurus, max_kaal, hind FROM pakid WHERE 
    '$userA'<a AND '$userB'<b AND '$userC'<c OR 
    '$userA'<a AND '$userC'<b AND '$userB'<c OR 
    '$userB'<a AND '$userC'<b AND '$userA'<c OR 
    '$userB'<a AND '$userA'<b AND '$userC'<c OR 
    '$userC'<a AND '$userA'<b AND '$userB'<c OR 
    '$userC'<a AND '$userB'<b AND '$userA'<c 
    ORDER BY hind");
    echo $conn->error;

    $stmt->bind_result($pakid_id, $firma, $suurus, $max_kaal, $hind);
    $stmt->execute();
	

	//
    $resultshtml1 = "";
    $resultshtml = "";
    while($stmt->fetch()){
        $resultshtml1 .= "<div class=row>";
        $resultshtml1 .= "<div class='cell first'>" .$firma ."</div><div class='cell second'>" .$suurus ."</div><div class='cell third'>";
        
        if($firma == "Omniva"){
            $resultshtml1 .= $data['omnivaAddressStart']. "<br>" .$data['omnivaDistanceStart'] 
            ."</div> <div class='cell fourth'>" .$data['omnivaAddressEnd'] ."<br>" .$data['omnivaDistanceEnd']  
            ."</div> <div class='cell fifth'>";
        }else if($firma == "Itella"){
            $resultshtml1 .= $data['itellaAddressStart']. "<br>" .$data['itellaDistanceStart'] 
            ."</div> <div class='cell fourth'>" .$data['itellaAddressEnd'] ."<br>" .$data['itellaDistanceEnd']  
            ."</div> <div class='cell fifth'>";
        }else if($firma == "DPD"){
            $resultshtml1 .= $data['dpdAddressStart']. "<br>" .$data['dpdDistanceStart'] 
            ."</div> <div class='cell fourth'>" .$data['dpdAddressEnd'] ."<br>" .$data['dpdDistanceEnd']  
            ."</div> <div class='cell fifth'>";
        }else{
            $resultshtml1 .= "ERROR</div> <div class='cell fourth'>ERROR <br></div> <div class='cell fifth'>";
        }

        $resultshtml1 .= $max_kaal ." kg </div><div class='cell sixth'>" .$hind ." € </div>" ;

        if($firma == "Omniva"){
            $resultshtml1.="<button class=vormista><a href=https://minu.omniva.ee/parcel/new>Vormista pakk</a></button>";
        }else if($firma == "Itella"){
            $resultshtml1.="<button class=vormista><a href=https://my.smartpost.ee/new_shipment/>Vormista pakk</a></button>";
        }else if($firma == "DPD"){
            $resultshtml1.="<button class=vormista><a href=https://telli.dpd.ee/>Vormista pakk</a></button>";
        }else{
            $resultshtml1 .= "<div class=''cell seventh'><button class=vormista>ERROR</button></div>";
        }
        
        $resultshtml1 .= "</div>";
        
        $resultshtml .= "<tr><td>" .$firma ."</td><td>" .$suurus ."</td><td>";
        if($firma == "Omniva"){
            $resultshtml .= $data['omnivaAddressStart']. "<br>" .$data['omnivaDistanceStart'] 
            ."</td><td>" .$data['omnivaAddressEnd'] ."<br>" .$data['omnivaDistanceEnd']  
            ."</td><td>";
        }else if($firma == "Itella"){
            $resultshtml .= $data['itellaAddressStart']. "<br>" .$data['itellaDistanceStart'] 
            ."</td><td>" .$data['itellaAddressEnd'] ."<br>" .$data['itellaDistanceEnd']  
            ."</td><td>";
        }else if($firma == "DPD"){
            $resultshtml .= $data['dpdAddressStart']. "<br>" .$data['dpdDistanceStart'] 
            ."</td><td>" .$data['dpdAddressEnd'] ."<br>" .$data['dpdDistanceEnd']  
            ."</td><td>";
        }else{
            $resultshtml .= "ERROR</div> <div class='cell fourth'>ERROR <br></div> <div class='cell fifth'>";
        }

        $resultshtml .= $max_kaal ." kg </td><td>" .$hind ." € </td>";

        if($firma == "Omniva"){
            $resultshtml.="<td><button class=vormista><a href=https://minu.omniva.ee/parcel/new>Vormista pakk</a></button></td>";
        }else if($firma == "Itella"){
            $resultshtml.="<td><button class=vormista><a href=https://my.smartpost.ee/new_shipment/>Vormista pakk</a></button></td>";
        }else if($firma == "DPD"){
            $resultshtml.="<td><button class=vormista><a href=https://telli.dpd.ee/>Vormista pakk</a></button></td>";
        }else{
            $resultshtml .= "<td>ERROR</td></tr>";
        }

    }
    $stmt->close();
    $conn->close();
    return $resultshtml;
}

require("header.php");
?>


<section id="section10">

    <div id="enteredsize"><h2>Tulemused pakile suurusega: <?php echo $_SESSION['a']; ?>×<?php echo $_SESSION['b']; ?>×<?php echo $_SESSION['c']; ?> <br>
    <?php echo $_SESSION['start']; ?> &rarr; <?php echo $_SESSION['end']; ?></h2></div>

    <table cellpadding="0 30">
        <tr>
            <th>Firma</th>
            <th>Suurus</th>
            <th>Algpunktist</th>
            <th>Lõpp-punktist</th>
            <th>Max kaal</th>
            <th>Hind</th>
            <th></th>
        </tr>
        <?php echo readresults($data); ?>
    </table>

    <button class="backToFP"><a href="http://greeny.cs.tlu.ee/~steltam/suvepraktika">Tagasi esilehele</a></button>
    <!-- tagasi nupp!!!! -->
</section>

</div>


<?php
    require("footer.php");
?>