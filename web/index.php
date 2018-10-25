<?php
echo session_status();
session_start();
echo session_status();
session_destroy();
echo session_status();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Adam McPherson Homepage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>

  </style>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="img/mylogo.png"></a>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="book-list.php">Books</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>    
        </div>
        </div> 
    </nav>
        
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to"0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to"1"></li>
            <li data-target="#myCarousel" data-slide-to"2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
            <img src="img/mountains.png">
                <div class="carousel-caption">
                    <h1>Books and Mountains</h1>
                    <br>
                    <button type="submit" onClick="location.href='login.php'" class="btn btn-default">
                    Get Started
                    </button>
                </div>
            </div><!--- End Active -->
            <div class="item">
                <img src="img/snow.png">
            </div>
            <div class="item">
                <img src="img/red.png">
            </div>
        </div>
        <!-- Start Slider Controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div> <!---- END OF SLIDER -->
    
</body>
</html>

<?php

    echo "This is where your books will show once you add some"
?>