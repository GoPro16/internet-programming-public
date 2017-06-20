<?php
    session_start();
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
    <script>
    filterItems = (type) => {
        //Get items
        var xhttp;
        if (window.XMLHttpRequest) { // Mozilla, Safari
            xhttp = new XMLHttpRequest();
        } else if (window.ActiveXObject) { // IE 8 and older
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhttp.open("POST", "filterItems.php?filter="+type, true);            
        xhttp.send();
	    xhttp.onreadystatechange = () => {
	        if (xhttp.readyState == 4) {
                if (xhttp.status == 200) {
                    //alert(xhr.responseText);	   
	                document.getElementById("tableView").innerHTML = xhttp.responseText;
                    } else {
                       alert('Request Error');
                    }
                }//if 200
	        }//if ready
        }//end showAll
        filterCat = (type) => {
        //Get items
        var xhttp;
        if (window.XMLHttpRequest) { // Mozilla, Safari
            xhttp = new XMLHttpRequest();
        } else if (window.ActiveXObject) { // IE 8 and older
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        type = '"' + type + '"';
        xhttp.open("POST", "filterCat.php?filter="+type, true);            
        xhttp.send();
	    xhttp.onreadystatechange = () => {
	        if (xhttp.readyState == 4) {
                if (xhttp.status == 200) {
                    //alert(xhr.responseText);	   
	                document.getElementById("tableView").innerHTML = xhttp.responseText;
                    } else {
                       alert('Request Error');
                    }
                }//if 200
	        }//if ready
        }//end showAll
        filterItems();
    </script>
</head>

<body>
    <div class="container">
        <div class="jumbotron jum">
            <h1>MovieDB List</h1>
        </div>
            <ul class="nav nav-tabs">
                <li role="presentation"><button onClick="filterItems()">Show All</button></li>
                <li role="presentation"><button onClick="filterItems('WHERE friendly=1')">Friendly</button></li>
                <li role="presentation"><button onClick="filterItems('WHERE friendly=0')">NotFriendly</button></li>
                <li role="presentation"><button onClick="filterCat('Action')">Action</button></li>
                <li role="presentation"><button onClick="filterCat('Adventure')">Adventure</button></li>
                <li role="presentation"><button onClick="filterCat('Documentary')">Documentary</button></li>
                <li role="presentation"><button onClick="filterCat('Drama')">Drama</button></li>
                <li role="presentation"><button onClick="filterCat('Horror')">Horror</button></li>
            </ul>
            <div class="panel panel-default">
            <div class="panel-heading">Movies</div>
            <table class="table" id="tableView">
            </table>
        </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h3 id="output-u"></h3>
            </div>
        <a class="go-back col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-primary" href="../index.html">Go Back</a>
    </div>
</body>

</html>