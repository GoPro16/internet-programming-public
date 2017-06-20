<?php
    $mysql_access = mysql_connect("localhost","n01038185","Sean7zach12@");
        if(!$mysql_access){
            die("Count not connect to sql");
        }
        mysql_select_db("n01038185");
        $extra = $_GET["filter"];
        $query = "SELECT * FROM movies WHERE category=".$extra;
        $result = mysql_query($query,$mysql_access);
        echo"<tr>
                <th>Title</th>
                <th>Release Date</th>
                <th>Views</th>
                <th>Category</th>
                <th>Kid Friendly</th>
                <th>Description</th>
            </tr>";
        while($row = mysql_fetch_row($result)){
            $id = $row[0];
            $name = $row[1];
            $score = $row[2];
            $description = $row[3];
            $views = $row[4];
            $friendly = $row[5];
            $category = $row[6];
            echo "<tr>";
            echo "<td>".$name."</td><td>".$released."</td><td>".$views."</td><td>".$category."</td><td>".$friendly."</td><td>".$description."</td>";
            echo "</tr>";
        }
        mysql_close($mysql_access);
?>