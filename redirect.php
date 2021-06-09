<?php
if(isset($_POST['submit'])){
    // Fetching variables of the form which travels in URL
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    if($a !=''&& $b !=''&& $c !='' /* && $start !='' && $end!='' */){
        //  To redirect form on a particular page
        header("Location:http://greeny.cs.tlu.ee/~steltam/projekt/results.php");
    }else{
        ?>
        <span><?php echo "Täitke kõik väljad";?></span> <?php
    }
}
?>