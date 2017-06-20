<?php
    session_start();
    $mysql_access = mysql_connect("localhost","n01038185","Sean7zach12@");
    if(!$mysql_access){
        die("Count not connect to sql");
    }
    mysql_select_db("n01038185");

?>
<!DOCTYPE html>
<html>

<head>
    <title>MovieDB | Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="../standard.css" />
    <link rel="icon" href="../favicon.ico">
</head>

<body>
    <div class="container">
        <div class="jumbotron jum">
            <h1>MovieDB List</h1>
        </div>

            <a class="btn btn-primary" href="./erd">ERD Diagram</a>
            <div class="panel panel-default">
            <div class="panel-heading">Movies</div>
            <table class="table">
            <tr>
                <th>Title</th>
                <th>Views</th>
                <th>Category</th>
                <th>Kid Friendly</th>
                <th>Description</th>
                <th>Options</th>
            </tr>
            <?php
               $query = "SELECT * FROM movies";
                    $result = mysql_query($query,$mysql_access);
                    while($row = mysql_fetch_row($result)){
                        $id = $row[0];
                        $name = $row[1];
                        $score = $row[2];
                        $description = $row[3];
                        $views = $row[4];
                        $friendly = $row[5];
                        $category = $row[6];
                        if($friendly == "1"){
                            $friendly = "Yes";  
                        }else{
                            $friendly = "No";
                        }
                        echo "<tr>";
                        echo "<td>$name</td><td>$views</td><td>$category</td><td>$friendly</td><td>$description</td><td><a href='edit.php?id=$row[0]'>Edit</a><b> | </b><a href='delete.php?id=$row[0]'>Delete</a></td>";
                        echo"</tr>";
                    }
                    mysql_close($mysql_access);

            ?>
            </table>
            <a href="add.php" style="width:100%;" class="btn btn-success">New Movie</a>
        </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h3 id="output-u"></h3>
            </div>
        <a class="go-back col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-primary" href="../index.html">Go Back</a>
    </div>
</body>

</html>