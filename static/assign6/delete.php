<?php
    $mysql_access = mysql_connect("localhost","n01038185","Sean7zach12@");
    if(!$mysql_access){
        die("Count not connect to sql");
    }
    mysql_select_db("n01038185");

    //Get variables
    $id = $_GET["id"];
    $query = "DELETE FROM movies WHERE id =" . $id;

    $result = mysql_query($query,$mysql_access);
    mysql_close($mysql_access);

    //Redirect
    header("Location: index.php");
?>