<?php
session_start();
require("geoloc/fnc_dataForCalc.php");
require("../../config.php");
$database = "if20_marcus_praktika";


require("header.php");
?>
<link rel="stylesheet" type="text/css" href="test.css" />
<script> $body = $("body");

$(document).on({
    ajaxStart: function() { $body.addClass("loading");    },
     ajaxStop: function() { $body.removeClass("loading"); }    
});</script>
<script> document.onreadystatechange = function () {
	  var state = document.readyState
	  if (state == 'interactive') {
		   document.getElementById('contents').style.visibility="hidden";
	  } else if (state == 'complete') {
		  setTimeout(function(){
			 document.getElementById('interactive');
			 document.getElementById('load').style.visibility="hidden";
			 document.getElementById('contents').style.visibility="visible";
		  },1000);
	  }
} </script>
	<div id="load"></div>
    <div id="contents">
          <section id="section10">

    <div id="enteredsize"><h2>Tulemused pakile suurusega: 
	<?php if (!empty($_SESSION['start'])){
	echo $_SESSION['a']; ?>×<?php echo $_SESSION['b']; ?>×<?php echo $_SESSION['c'];
}?> 
<br>	
	
    <?php if (!empty($_SESSION['start'])){
	echo $_SESSION['start']; ?> &rarr; <?php echo $_SESSION['end'];
}?></h2></div>

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
        <?php
		if (!empty($_SESSION['start'])){
			$data = dataProcess(($_SESSION['start']), (($_SESSION['end'])));
}
		if (!empty($_SESSION['start'])){
			echo readresults($data);
} ?>
    </table>

    <button class="backToFP"><a href="http://greeny.cs.tlu.ee/~steltam/suvepraktika">Tagasi esilehele</a></button>
    <!-- tagasi nupp!!!! -->
</section>

</div>
    </div>
	



<?php
    require("footer.php");
?>
<div class="modal"><!-- Place at bottom of page --></div>