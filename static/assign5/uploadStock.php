<?php
    //Get vars
    $stockName = $_POST["stockName"];
    $stockCount = $_POST["stockCount"];
    //append to file
    $filename = "information.dat";
    $fptr = fopen($filename,"a") or die("Couldn't Open file");
    fwrite($fptr,"$stockName,$stockCount\n") or die("Couldn't write to file");
    //close writer and redirect
    fclose($fptr);
    header("Location: admin.php");
?>