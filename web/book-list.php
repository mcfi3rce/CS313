<?php

require("dbConnect.php");
$db = get_db();
session_start();

if (!isset($_SESSION['logged_in'])){
    header("Location: login.php");
}

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
                
                <?php
                if ($_SESSION['logged_in']){
                    echo '<li><a href="logout.php">Logout</a></li>';
                }
                else{
                    echo '<li><a href="login.php">Login</a></li>';
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
    try {
        if (isset($_POST['search'])){
            $search = $_POST['search'];

            $query = "SELECT id, title, author, cover_art FROM book WHERE title like '%:search%'";
            $statement = $db->prepare($query);
            $statement->bindValue(':search', $search);
            $statement->execute();
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
                    echo "<a href=\"seeDetails.php?book_id=".$row['id']."\">";
                    echo "<div class='image-block col-sm-2' style='background:" . "url(" . $row["cover_art"] . ") no-repeat center  top;background-size:cover;'>";
                    echo "<p> See Details</p>";
                    echo '</div>';
            }
        }
        else {
            $query = 'SELECT id, title, author, cover_art FROM book';
            $statement = $db->prepare($query);
            $statement->execute();
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
                echo "<a href=\"seeDetails.php?book_id=".$row['id']."\">";
                echo "<div class='image-block col-sm-2' style='background:" . "url(" . $row["cover_art"] . ") no-repeat center  top;background-size:cover;'>";
                echo "<p>See Details</p>";
                echo '</div>';
            }
            
        }
    }
    catch (Exception $ex)
    {
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
    }
    ?>
    </div>      
</div>
        

</body>
</html>