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
        <div class="jumbotron">
            <h1>Stock Portfolio Manager</h1><p><?php echo "Logged in as ".$_SESSION["username"];?></p>
        </div>
        
         <a class="go-back col-sm-12 col-md-12 col-lg-12 btn btn-primary" href="../">Go Back</a>
    </div>
</body>
</html>