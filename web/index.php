<?php
session_start();
if (!isset($_SESSION['logged_in'])){
    header("Location: login.php");
}
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
                <?php
                if ($_SESSION['logged_in']){
                    echo '<li><a href="logout.php">Logout</a></li>';
                }
                else{     
                    echo '<li><a href="login.php">Login</a></li>';
                }
                ?>
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
    
    <div id="book-form">
       <form>
           <div class="form-group">
               <label for="titleArea">Title</label>
               <textarea class="form-control" id="titleArea" rows="1"></textarea>
           </div>
           <div class="form-group">
               <label for="publisherArea">Author</label>
               <textarea class="form-control" id="publisherArea" rows="1"></textarea>
           </div>
           <div class="form-group">
               <label for="publisherArea">Publisher</label>
               <textarea class="form-control" id="publisherArea" rows="1"></textarea>
           </div>
           <div class="form-group">
               <label for="isbnArea">ISBN</label>
               <textarea class="form-control" id="isbnArea" rows="1"></textarea>
           </div>
           <div class="form-group">
               <label for="coverArtArea">Cover Art</label>
               <textarea class="form-control" id="coverArtArea" rows="1"></textarea>
           </div>
           <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
    </div>
</body>
</html>

<?php

    echo "This is where your books will show once you add some"
?>