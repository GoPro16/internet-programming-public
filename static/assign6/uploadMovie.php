<?php
    //Connect to DB
    session_start();
    $mysqli = new mysqli("localhost", "n01038185", "Sean7zach12@", "n01038185");

    $name = $_POST["movieName"];
    $views = $_POST["movieViews"];
    $score = $_POST["movieScore"];
    $friendly = $_GET["friendly"];
    $category = $_GET["category"];
    $description = $_POST["movieDesc"];
    
    $query = "INSERT INTO movies (name, score, description, views, friendly, category) VALUES ";
    $query = $query . "(?, ?, ?, ?, ?, ?)";
    $statement = $mysqli->prepare($query);
    $statement->bind_param('sisiis', $name, $score, $description, $views, $friendly, $category);
    if($statement->execute()){
    }else{
        die('Error');
    }
    $statement->close();
    header("Location: index.php");
?>