<?php
    //Get variables
    $name = $_GET["name"];
    $count = $_GET["count"];
    
    //Find and replace 
    $data = file_get_contents("information.dat");
    $data = str_replace("$name,$count","", $data);
    file_put_contents('information.dat', $data);
    //Redirect
    header("Location: admin.php");
?>