<?php

require("dbConnect.php");
$db = get_db();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>BOOKS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="book-list.css">
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
            <ul class="nav navbar-nav navbar-left">
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="#">Books</a></li>
                <li><a href="login.php">Login</a></li>
                <?php
                if (session_status() == 2){
                echo '<li><a href="logout.php">Logout</a></li>';
                }
                ?>
            </ul>
            <form class="navbar-form navbar-right" method="post" action="">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-danger">
                Submit
                </button>
            </form>
        </div>
        </div> 
    </nav>
<div class="container-fluid">
    <div class="row">        
    <?php
    if (isset($_POST['search'])){
        echo "POST: "  . $_POST['search'] . "</br>";
        foreach ($db->query("SELECT title, author, cover_art FROM book WHERE title like '%" . htmlspecialchars($_POST['search']) . "%'") as $row)
            {
                echo "<div class='image-block col-sm-2' style='background:" . "url(" . $row["cover_art"] . ") no-repeat center  top;background-size:cover;'>";
                echo "<p>" . "Title: " . $row["title"] . " Author: " . $row["author"] . "</p>";
                echo '</div>';
            }
    }
    else {
        for ($i = 1; $i <= 32; $i++) {
            foreach ($db->query('SELECT title, author, cover_art FROM book') as $row)
            {
                echo "<div class='image-block col-sm-2' style='background:" . "url(" . $row["cover_art"] . ") no-repeat center  top;background-size:cover;'>";
                echo "<p>" . "Title: " . $row["title"] . " Author: " . $row["author"] . "</p>";
                echo '</div>';
            }
        }
    }

    ?>
    </div>      
</div>
        

</body>
</html>