<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Portfolio | Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="../standard.css" />
    <link rel="icon" href="../favicon.ico">
    <script>
        var throwErr = () =>{
            document.getElementById("error-text").innerHTML ="Invalid Username or Password";
        };
    </script>
</head>

<body>
    <div class="container">
        <div class="jumbotron jum">
            <h1>Stock Portfolio Manager</h1>
        </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
            <form class="form" method="post" action="">
                <h2>Login</h2>
                <?php
                    if(isset($_POST['submit'])){
                        $fp = fopen("login.dat","r");
                        $line = fgets($fp);
                        fclose($fp);
                        $arr = split(",",$line);
                        if($_POST["username"] == $arr[0] && $_POST["password"] == $arr[1]){
                             $_SESSION["username"] = $_POST["username"];
                             $_SESSION["password"] = $_POST["password"];
                            ?>
                                 <meta http-equiv="Refresh" content="0; url=./admin.php">
                            <?php
                            
                         }else{ 
                            ?>
                                <p style="color:red">Invalid Username or Password</p>
                            <?php
                        }
                    }
            ?>
                <input name="username" class="form-field" type="text" id="username" placeholder="Username"/>
                <input name="password" class="form-field" type="password" id="password" placeholder="Password"/>
                <button name="submit" type="submit" class="form-field btn btn-primary" >Login</button>
            </form>
            </div>
            <div>
                <h3 id="output-u"></h3>
            </div>
        <a class="go-back col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-primary" href="../index.html">Go Back</a>
    </div>
</body>

</html>