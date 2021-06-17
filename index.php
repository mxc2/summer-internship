<?php
session_start();
$inputerror="";
$LoadingMessage="";
$a=null;
$b=null;
$c=null;
$weight=null;
$continue = null;
$start="";
$end="";
$weight="";
if(isset($_POST["submit"])){ /* Kui nupp on vajutatud */
    $a=$_POST["a"];
    $b=$_POST["b"];
    $c=$_POST["c"];
    $weight=$_POST["weight"];
    $start=$_POST["start"];
    $end=$_POST["end"];
    if(empty($_POST["a"]) or empty($_POST["b"]) or empty($_POST["c"]) or empty($_POST["weight"])){ /* Kontrollib, kas mõõdud on sisestatud */
        $inputerror .= "Sisesta kõik mõõdud! <br>";
    }
    if($_POST["a"]<=0 or $_POST["b"]<=0 or $_POST["c"]<=0 or $_POST["weight"]<=0){ /*Kontrollib, kas mõõdud on suuremad kui 0 */
        $inputerror .= "Mõõdud peavad olema suuremad kui 0! <br>";
    }
    if(empty($_POST["start"]) or empty($_POST["end"])){ /* Kontrollib, kas aadressid on sisestatud */
        $inputerror .= "Sisesta mõlemad aadressid! ";
    }
    if(empty($inputerror)){
		$inputerror .= "Otsime teile lähimaid pakiautomaate...";
		
        /* Saadab form'i väärtused sessiooni muutujateks, et results.php kätte saaks andmed */
        $_SESSION["a"] = $_POST["a"];
        $_SESSION["b"] = $_POST["b"];
        $_SESSION["c"] = $_POST["c"];
        $_SESSION["weight"] = $_POST["weight"];
        $_SESSION["start"] = $_POST["start"];
        $_SESSION["end"] = $_POST["end"];
		$continue = 1; /* Loading screen tuleb ette */
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Ikoonide import --> 
    <link rel="stylesheet" href="style.css"> <!-- css'i import -->
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon32.png"> <!-- Favicon -->
    <link rel="preconnect" href="https://fonts.gstatic.com"> <!-- Font'ide import -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&family=Quicksand:wght@500;600&display=swap" rel="stylesheet">
    <title>Parimautomaat</title>
</head>


<body>
<div id="container"> <!-- container, et header'il ja section1'l oleks sama taust -->
    <div id="navIndex">
        <div id="head1"> <!-- logo lingiga esilehele -->
            <a href=http://greeny.cs.tlu.ee/~steltam/suvepraktika>
                <img src="img/logoNew.png" alt="Logo" width="300">
            </a>
        </div>
        <div id="head2"> <!-- Info nupp ikooniga -->
            <a href="http://greeny.cs.tlu.ee/~steltam/suvepraktika/#section4">
                <i class="fa fa-question-circle"></i>
                Info
            </a>
        </div>
    </div>


    
    <section id="section1"> <!-- esimene sektsioon -->
        <div id="info">
            <h1>Iga sekund pannakse teele rohkem kui 3000 pakki</h1>
            <h3>Võrdleme Teile lähedal asuvate teenustepakkujate hindu vastavalt Teie paki suurusele ja leiame kõige odavamad pakkumised</h3>
        </div>
        <div id="inputs"> <!-- Andmete sisestuse kast -->
            <div id="head-input"><h2>Sisesta andmed siia</h2></div>
            <div id="form"> <!-- Form -->
                <form method="post">
                    <label for="a"></label>
                    <input type="number" id="a" name="a" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" placeholder="1. külg (cm)" value="<?php echo $a; ?>">
                    <label for="b"></label>
                    <input type="number" id="b" name="b" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" placeholder="2. külg (cm)" value="<?php echo $b; ?>">
                    <label for="c"></label>
                    <input type="number" id="c" name="c" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" placeholder="3. külg (cm)" value="<?php echo $c; ?>">
                    <label for="weight"></label>
                    <input type="number" id="weight" name="weight" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" placeholder="Kaal (kg)" value="<?php echo $weight; ?>">
                    <label for="start"></label>
                    <input type="text" id="start" name="start" pattern="[a-zA-Z0-9 ,]+" placeholder="Algpunkt (Mooni 8, Tallinn)" value="<?php echo $start; ?>">
                    <label for="end"></label>
                    <input type="text" id="end" name="end" pattern="[a-zA-Z0-9 ,]+" placeholder="Lõpp-punkt (Kivi 4, Tartu)" value="<?php echo $end; ?>"><br>
                    <input onclick="myFunction()" type="submit" name="submit" value="Leia parim pakiautomaat">					
					
                </form>
				<p><?php /* Loading screen */
                    if($continue == 1){
                        header( "refresh:1; url=results.php" );
                        echo '<div id="lock-modal"></div>';
                        echo '<div id="loading-circle"></div>';
                    }
				?></p>
				<script>function myFunction() {
                    document.getElementById("lock-modal").style.display = "block";
                    document.getElementById("loading-circle").style.display = "block";
				}</script>
                <p><?php echo $inputerror; ?></p>
            </div>
        </div>
        <div id="scroll"> <!-- Allakerimise tekst ja ikoon -->
            <h3>Keri alla, et näha rohkem</h3>
            <i class="fa fa-angle-double-down"></i>

            <!-- Shape divider (näha vaid arvutivaates) -->
            <div class="custom-shape-divider-bottom-1623233967">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                    <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                    <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
                </svg>
            </div>
        </div>
    </section>
</div>


<section id="section3"> <!-- "Miks meie lehte kasutada" sektsioon -->
	<h2>Miks kasutada parimautomaat.ee?</h2>
    <div id="procontainer">
        <div class="pros">
            <img src="img/cash-on-delivery.png" alt="Säästa raha" class="pic-pros" width="200">
            <h2 class="h-pros">Säästa raha</h2>
            <p class="txt-pros">Aitame leida Teie pakile parima hinna, kõiki teenusepakkujaid võrreldes. Maksate vähem, saate endiselt suurepärast teenust!</p>
        </div>
        <div class="pros">
            <img src="img/24-hours.png" alt="Säästa aega" class="pic-pros" width="200">
            <h2 class="h-pros">Säästa aega</h2>
            <p class="txt-pros">Parimat hinda pole vaja otsida, meie teeme selle Teie eest! Mõne sekundi jooksul saate võrrelda mitme teenusepakkuja hindu ühes kohas.</p>
        </div>
        <div class="pros">
            <img src="img/check-list.png" alt="Saa rohkem tehtud" class="pic-pros" width="200">
            <h2 class="h-pros">Tee rohkem</h2>
            <p class="txt-pros">Võtame enda kanda igavad ülesanded, et saaksite oma aja ja raha investeerida oma ettevõtte arendamisse!</p>
        </div>
    </div>
</section>


<!-- Logode sektsioon -->
<section id="section2" style="background-color:rgba(0, 0, 0, 0);">

    <h2>Kasutage postipakkide saatmisel usaldusväärseid ettevõtteid!</h2>
    <div id="logos">
        <img src="img/DPD.png" alt="omniva" width="250">
        <img src="img/Itella_logo.png" alt="itella" width="250">
        <img src="img/Omniva.png" alt="dpd" width="250">
    </div>
</section>


<!-- KKK sekstsioon -->
<section id="section4">
    <h2>Korduma kippuvad küsimused</h2>
	
	<button class="accordion">Kuidas pakki saata?</button> <!-- Klikkides küsimusele (accordion button), avab vastuse -->
    <div class="panel"> <!-- Vastus -->
            <ul>
                <li>Mõõtke paki külgede suurused sentimeetrites.</li>
                <li>Avalehel sisestage paki pikkus, laius ja kõrgus.</li>
                <li>Sisestage oma algpunkt (aadress, kus te praegu asute) ja lõpp-punkt (aadress, kuhu te soovite pakki saata. Näiteks sugulaste maja).</li>
                <li>Vajutage nuppu “Leia parim automaat”.</li>
                <li>Süsteem pakub vastavalt Teie paki suurusele kõik võimalikud lahendused, kuidas saate pakki saata.</li>
                <li>Valige Teile sobivaim pakkumine ja vajutaga selle peale.</li>
                <li>Süsteem suunab Teid teenusepakkuja veebilehele, kus saate vormistada paki iseteeninduses</li>
            </ul>

    </div>
	
	<button class="accordion">Kas pakki on võimalik saata rahvusvaheliselt?</button>
    <div class="panel">
        <p>Antud süsteem võimaldab saata pakke ainult Eestis.</p>
    </div>
	
	<button class="accordion">Kuidas saata mitut pakki korraga?</button>
    <div class="panel">
        <p>Kahjuks praegusel hetkel puudub võimalus saata mitut pakki korraga aga selle probleemi lahenduseks on võimalik läbida süsteem korduvalt erinevate pakkidega.</p>
    </div>
	
	<button class="accordion">Millised esemed tohin posti teel saata?</button>
    <div class="panel">
        <p>Palun pöörduge teenuspakkujate enda üldtingimustele ja piirangutele.</p>
		<br>
		<p>Omniva üldtingimused: <a href="https://www.omniva.ee/abi/paki_pakendamine_ja_adresseerimine">Vajuta siia</a></p>
		<p>Itella üldtingimused: <a href="https://www.smartpost.ee/kuidas-saata-ja-vastu-votta">Vajuta siia</a></p>
		<p>DPD üldtingimused: <a href="https://www.dpd.com/ee/et/info-ja-abi/pakkimine/">Vajuta siia</a></p>
    </div>
	
	<button class="accordion">Milline on paki maksimaalne kaal?</button>
    <div class="panel">
        <p>Omniva ühe paki maksimaalne kaal on 30 kg.</p>
        <p>Itella ühe paki maksimaalne kaal on 35 kg.</p>
        <p>DPD ühe paki maksimaalne kaal on 20 kg.</p>
		<br>
		<p>NB! Palun järgige tulemuste lehel välja toodud maksimaalset kaalu. Erinevate pakiautomaatide uste suurustel võivad olla erinevad paki maksimaalsed kaalud.</p>
    </div>
	
	<button class="accordion">Kuidas parimautomaat.ee töötab?</button>
    <div class="panel">
        <p>Võrdleme Teile lähedal asuvate teenustepakkujate hindu vastavalt Teie paki suurusele ja leiame kõige odavamad pakkumised! Säästame nii Teie raha kui ka aega!</p>
    </div>
	
	<button class="accordion">Kuidas ma saaks võrrelda ka teisi teenusepakkujaid?</button>
    <div class="panel">
        <p>Kahjuks on praegusel hetkel võimalik võrrelda ainult eestisiseseid teenusepakkujaid: Omniva, Itella ja DPD. Juhul kui soovite lisada valikusse veel mõne firma, palun teavitage meid läbi e-maili info@parimautomaat.ee</p>
    </div>


    <button class="accordion">Kuhu pöörduda probleemide juhul?</button>
    <div class="panel">
        <p>Palun kirjutage meile info@parimautomat.ee. Võtame Teiega ühendust nii kiiresti kui võimalik.</p>
    </div>
    
</section>

<!-- Kutsub välja footer'i -->
<?php
    require("footer.php");
?>

<!-- KKK's avab button'i vajutamise peale panel'id -->
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
    }
	
	function myFunction() {
        document.getElementById("lock-modal").style.display = "block";
        document.getElementById("loading-circle").style.display = "block";
	}
</script>