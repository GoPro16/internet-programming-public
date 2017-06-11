<?php
    session_start();
    if($_SESSION["username"] == null){
         header("Location: index.php"); /* Redirect browser */
                    exit();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Portfolio | Manager</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="../standard.css" />
    <link rel="icon" href="../favicon.ico">
</head>

<body>
    <div class="container">
        <div class="jumbotron" style="margin-bottom:10px">
            <h1>Stock Portfolio Manager</h1><p><?php echo "Logged in as ".$_SESSION["username"];?></p>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Your Stocks</div>
            <table class="table">
            <tr>
                <th>Stock</th>
                <th>Tick</th>
                <th>Price</th>
                <th>Shares</th>
                <th>Value</th>
                <th>Options</th>
            </tr>
            <?php
            //Open .dat file
            $fp = fopen("information.dat","r");
            $total = 0;
            while($stock = fgets($fp)){
                if(!($stock == "\n")){
                    $stock_arr = split(',',$stock);
                //For each stock fetch the new quote and create a new th
                $open = fopen("http://finance.yahoo.com/d/quotes.csv?s=$stock_arr[0]&f=sl1d1t1c1ohgv&e=.csv", "r");
                echo"<tr>";
                while($line = fgets($open)){
                    $arr =split(',',$line);
                    $value = number_format(round($arr[1]*$stock_arr[1],2),2,'.','');
                    $st_name = str_replace('"', "", $arr[0]);
                    $total+=$value;
                    echo"<td>$st_name</td><td>$arr[4]</td><td>$arr[1]</td><td>$stock_arr[1]</td><td>$$value</td><td><a href='edit.php?name=$st_name&count=$stock_arr[1]'>Edit</a><b> | </b><a href='delete.php?name=$st_name&count=$stock_arr[1]'>Delete</a></td>";
                }
                fclose($open);             
                echo"</tr>";
                }
            }
            echo"<th>Total Value</th><td>$$total</td>";   
            fclose($fp);
            ?>
            </table>
            <a href="add.php" style="width:100%;" class="btn btn-success">Add Stock</a>
        </div>
         <a class="go-back col-sm-12 col-md-12 col-lg-12 btn btn-primary" href="../">Go Back</a>
    </div>
</body>
</html>