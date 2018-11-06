<?php
/**********************************************************
* File: seeDetails.php
* Author: Adam McPherson
* 
* Description: This is the book review page where all the current 
* reviews will be listed for a book as well as the opportunity to 
* add a review if logged in.
***********************************************************/

require("dbConnect.php");
$db = get_db();


try{
    // Get the Data from the GET
    
    if (isset($_GET['book_id'])){
        $book_id = $_GET['book_id'];
        
        $query = 'SELECT id, title, publisher, isbn, author, cover_art FROM book WHERE id = :book_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':book_id', $book_id);
        $statement->execute();
        
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        
        $title = $row['title'];
        $author = $row['author'];
        $publisher = $row['publisher'];
        $isbn = $row['isbn'];
        $image = $row['cover_art'];
        
        #Testing all the data is received correctly
        /*echo $title . "</br>";
        echo $author . "</br>";
        echo $publisher . "</br>";
        echo $isbn . "</br>";
        echo $image . "</br>";*/
    } 
    else {

        echo "ERROR sending GET \n";
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

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $title;?></title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="seeDetails.css">
  <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="info">
    <img src="<?php echo $image; ?>" class="rounded float-left" alt="..." id="cover">
    <h3>Title</h3>
    <br>
    <p><?php echo $title;?></p>
    <br>
    <h3>Author</h3>
    <br>
    <p><?php echo $author;?></p>
    <br>
    <h3>Publisher</h3>
    <br>
    <p><?php echo $publisher;?></p>
    <br>
    <h3>ISBN</h3>
    <br>
    <p><?php echo $isbn;?></p>
    <br>
    <br>
</div>

<div class="reviews">
  <div class="row blockquote review-item">
    <div class="col-md-3 text-center">
      <img class="rounded-circle reviewer" src="http://standaloneinstaller.com/upload/avatar.png">
      <div class="caption">
        <small>by <a href="#joe">Joe</a></small>
      </div>

    </div>
    <div class="col-md-9">
      <h4>My awesome review</h4>
      <div class="ratebox text-center" data-id="0" data-rating="5"></div>
      <p class="review-text">My awesome review. My awesome review. My awesome review. My awesome review. My awesome review. My awesome review. My awesome review. My awesome review. My awesome review. My awesome review. My awesome review. </p>

      <small class="review-date">March 26, 2017</small>
    </div>                          
  </div>  
</div>


<div class="container">
	<div class="row" style="margin-top:40px;">
		<div class="col-md-6">
    	<div class="well well-sm">
            <div class="text-right">
                <a class="btn btn-success btn-green" href="#seeDetails.js" id="open-review-box">Leave a Review</a>
            </div>
        
            <div class="row" id="post-review-box" style="display:none;">
                <div class="col-md-12">
                    <form accept-charset="UTF-8" action="" method="post">
                        <input id="ratings-hidden" name="rating" type="hidden"> 
                        <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." rows="5"></textarea>
        
                        <div class="text-right">
                            <div class="stars starrr" data-rating="0"></div>
                            <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                            <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                            <button class="btn btn-success btn-lg" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
         
		</div>
	</div>
</div>


</body>
</html>





