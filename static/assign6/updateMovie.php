<?php
    //Connect to DB
    session_start();
    $mysqli = new mysqli("localhost", "n01038185", "Sean7zach12@", "n01038185");

    $id = $_GET["id"];
    $name = $_POST["movieName"];
    $views = $_POST["movieViews"];
    $score = $_POST["movieScore"];
    $friendly = $_GET["friendly"];
    $category = $_GET["category"];
    $description = $_POST["movieDesc"];
    
    $statement = $mysqli->prepare("UPDATE movies set name=?, score=?, description=?, views=?, friendly=?, category=? WHERE id=?");
    $statement->bind_param('sisiiisi', $name, $score, $description, $views, $friendly, $category,$id);
   
    if($statement->execute()){
    }else{
        die('Error');
    }
    $statement->close();
    header("Location: index.php");
?>