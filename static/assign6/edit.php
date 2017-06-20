<?php
    session_start();
    $mysql_access = mysql_connect("localhost","n01038185","Sean7zach12@");
    if(!$mysql_access){
        die("Count not connect to sql");
    }
    mysql_select_db("n01038185");
    
    $id = $_GET["id"];
    $query = "SELECT * FROM movies WHERE id=" . $id;
    $result = mysql_query($query,$mysql_access);
    $row = mysql_fetch_row($result);
    $name = $row[1];
    $score = $row[2];
    $description = $row[3];
    $views = $row[4];
    $friendly = $row[5];
    $category = $row[6];
    mysql_close($mysql_access);
?>
<!DOCTYPE html>
<html>
<head>
    <title>MovieDB | New</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="../standard.css" />
    <link rel="icon" href="../favicon.ico">
    <script>
    
    checkForm = () => {
        var error = false;
        var movieName = document.getElementById("name"),
            views = document.getElementById("views"),
            score = document.getElementById("score"),
            friendly = document.getElementById("friendly"),
            notFriendly = document.getElementById("notFriendly");
        //Check stock name
        if(movieName.value == ""){
            error = true;
            var field = document.querySelector(".movie-name");
                field.classList.add("has-error");
        }else{
            var field = document.querySelector(".movie-name");
                field.classList.remove("has-error");
        }
        //Check number
        if(score.value == "" || score.value <= 0 || score.value >= 11){
            error = true;
            var field = document.querySelector(".score");
                field.classList.add("has-error");
        }else{
            var field = document.querySelector(".score");
                field.classList.remove("has-error");
        }
        //Check number
        if(views.value == "" || views.value <= 0){
            error = true;
            var field = document.querySelector(".views");
                field.classList.add("has-error");
        }else{
            var field = document.querySelector(".views");
                field.classList.remove("has-error");
        }
        //Get friendliness
        if (!friendly.checked && !notFriendly.checked) {
                error = true;
                var button = document.querySelector(".rad-io");
                button.classList.add("has-error");
        } else {
                var button = document.querySelector(".rad-io");
                button.classList.remove("has-error");
        }

        //If no error
        if (!error) {
                var categorys = document.getElementById("category");
                let category = categorys.options[categorys.selectedIndex].value;
                var friend = 1;
                if(!friendly.checked){
                    friend =0;
                }
                document.addForm.action = "updateMovie.php?friendly="+friend+"&category="+category+"&id=<?php echo $id; ?>";
                document.getElementById("error-field").classList.add("hidden");
                document.addForm.submit();
            } else {
                document.getElementById("error-field").classList.remove("hidden");
            }
    }//end checkform
    </script>
</head>
<body>
    <div class="container">
        <div class="jumbotron" style="margin-bottom:10px">
            <h1>MovieDB</h1>
        </div>
        <h3>New Movie</h3>
        <form method="POST" name="addForm">
            <div class="row">
                <div class="col-lg-12 hidden" id="error-field">
                    Please correct the red outlined fields please.
                </div>
                <div class="col-md-6 col-lg-6 movie-name">
                    <input id="name" value="<?php echo $name; ?>" name="movieName" type="text" class="form-control" placeholder="Movie Title">
                </div>
                <div class="col-md-3 col-lg-3 views">
                    <input id="views" value="<?php echo $views; ?>" name="movieViews" type="number" class="form-control" placeholder="Movie Views">
                </div>
                <div class="col-md-3 col-lg-3 score">
                    <input id="score" value="<?php echo $score; ?>" min="1" max="10" name="movieScore" type="number" class="form-control" placeholder="Movie Score">
                </div>
                 <div class="col-md-6 col-lg-6">
                    <div class="radio rad-io">
                        Kid Friendly
                        <label><input id="friendly" type="radio" name="optradio">True</label>
                        <label><input id="notFriendly" type="radio" name="optradio">False</label>
                    </div>
                 </div>
                <div class="col-lg-6">
                    <div class="checkbox">
                        <b>Additional Options</b><br />
                        <label><input type="checkbox" id="laptop"value="laptop">Still in Theaters?</label>
                        <label><input type="checkbox" id="headphones"value="headphones">Out in Stores?</label>
                        <label><input type="checkbox" id="mouse"value="mouse">Netflix Capable</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <b>Category</b><br />
                    <select id="category">
                        <option id="Family" value="Family">Family</option>
                         <option id="Action" value="Action">Action</option>
                         <option id="Adventure" value="Adventure">Adventure</option>
                         <option id="Horror" value="Horror">Horror</option>
                         <option id="Fantasy" value="Fantasy">Fantasy</option>
                         <option id="Documentary" value="Documentary">Documentary</option>
                         <option id="Sci-Fi" value="Sci-Fi">Sci-Fi</option>
                    </select>
                </div>
                <div class="col-md-12 col-lg-12">
                    <input value="<?php echo $description; ?>" style="margin-bottom:16px;" id="desc" name="movieDesc" type="textarea" class="form-control" placeholder="Movie Description">
                </div>
                <div class="col-lg-12">
                    <input onClick="checkForm()" class="btn btn-success" value="Update Movie" />
                </div>
            </div>
        </form>
        <a class="go-back col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-primary" href="index.php">Go Back</a>
    </div>
</body>
</html>