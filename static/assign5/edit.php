<?php
    session_start();
    if($_SESSION["username"] == null){
         header("Location: index.php"); /* Redirect browser */
                    exit();
    }
     $name = $_GET["name"];
    $count = $_GET["count"];
    
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
        <h3>Edit Stock</h3>
        <form method="POST" action="editStock.php?name=<?php echo"$name"; ?>&count=<?php echo"$count"; ?>">
            <div class="row">
                <div class="col-md-6 col-lg-6 stock-name">
                    <input id="stockName" name="stockName" type="text" class="form-control" value=<?php echo "$name";?> disabled>
                </div>
                <div class="col-md-6 col-lg-6 stock-count">
                    <input id="stockCount" name="stockCount" type="number" class="form-control" value=<?php echo "$count";?>>
                </div>
                <div class="col-lg-12">
                    <input type="submit" name="submit" class="btn btn-success" value="Update Stock" />
                </div>
            </div>
        </form>
        <a class="go-back col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-primary" href="admin.php">Go Back</a>
    </div>
</body>
</html>