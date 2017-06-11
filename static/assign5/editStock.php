<?php
    //Get variables
    $name = $_GET["name"];
    $count = $_GET["count"];
    $newCount = $_POST["stockCount"];

    //Find and replace 
    $data = file_get_contents("information.dat");
    $data = str_replace("$name,$count","$name,$newCount", $data);
    file_put_contents('information.dat', $data, LOCK_EX);

    //Redirect
    header("Location: admin.php");
?>