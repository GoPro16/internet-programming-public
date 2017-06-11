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
    <script>
    checkForm = () => {
        var error = false;
        var stockName = document.getElementById("stockName"),
            stockCount= document.getElementById("stockCount");
        //Check stock name
        if(stockName.value == ""){
            error = true;
            var field = document.querySelector(".stock-name");
                field.classList.add("has-error");
        }else{
            var field = document.querySelector(".stock-name");
                field.classList.remove("has-error");
        }
        //Check number
        if(stockCount.value == "" || stockCount.value <= 0){
            error = true;
            var field = document.querySelector(".stock-count");
                field.classList.add("has-error");
        }else{
            var field = document.querySelector(".stock-count");
                field.classList.remove("has-error");
        }
        if (!error) {
                document.getElementById("error-field").classList.add("hidden");
            } else {
                document.getElementById("error-field").classList.remove("hidden");
            }
    }
    </script>
</head>
<body>
    <div class="container">
        <div class="jumbotron" style="margin-bottom:10px">
            <h1>Stock Portfolio Manager</h1><p><?php echo "Logged in as ".$_SESSION["username"];?></p>
        </div>
        <h3>New Stock</h3>
        <p style="color:black">Stock name is the abbreviation used.</p>
        <form method="POST" action="uploadStock.php">
            <div class="row">
                <div class="col-lg-12 hidden" id="error-field">
                    Please correct the red outlined fields please.
                </div>
                <div class="col-md-6 col-lg-6 stock-name">
                    <input id="stockName" name="stockName" type="text" class="form-control" placeholder="Stock Symbol">
                </div>
                <div class="col-md-6 col-lg-6 stock-count">
                    <input id="stockCount" name="stockCount" type="number" class="form-control" placeholder="Stock Count">
                </div>
                <div class="col-lg-12">
                    <input type="submit" name="submit" class="btn btn-success" value="Add Stock" />
                </div>
            </div>
        </form>
        <a class="go-back col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-primary" href="admin.php">Go Back</a>
    </div>
</body>
</html>