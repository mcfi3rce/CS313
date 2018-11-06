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

        echo "ERROR reading GET \n";
    }
}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}

try{
    // Get the Data from the GET
    
    if (isset($_GET['book_id'])){
        
        $query = 'SELECT display_name, title, review, rating, would_recommend 
        FROM public.books_read AS b
        INNER JOIN public.user AS u
        ON b.user_id = u.id
        WHERE b.book_id = :book_id';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':book_id', $book_id);
        $statement->execute();
        
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        echo "SUCCESS!";
        } 
    else {

        echo "ERROR reading GET \n";
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="seeDetails.css">
  <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="info">
    <img src="<?php echo $image; ?>" class="rounded float-left" alt="..." id="cover">
    <h3>Title</h3>
    <p><?php echo $title;?></p>
    <h3>Author</h3>
    <p><?php echo $author;?></p>
    <h3>Publisher</h3>
    <p><?php echo $publisher;?></p>
    <h3>ISBN</h3>
    <p><?php echo $isbn;?></p>
</div>

<?php
    foreach ($row){
        echo '<div class="reviews">';
        echo  '<div class="row blockquote review-item">';
        echo    '<div class="col-md-3 text-center">';
        echo      '<img class="rounded-circle reviewer" src="https://standaloneinstaller.com/upload/avatar.png">';
        echo      '<div class="caption">';
        echo        "<small>by " . $row['display_name'] . "</small>";
        echo      '</div>';
        echo    '</div>';
        echo    '<div class="col-md-9">';
        echo      "<h4>" . $row['title'] . "</h4>";
        echo      '<div class="ratebox text-center" data-id="0" data-rating="5"></div>';
        echo      "<p class='review-text'>" . $row['review'] . "</p>";
        echo      "<p class='review-text'>" . $row['rating'] . "</small>";
        echo    "</div>";                          
        echo  '</div>' ;  
        echo '</div>';
    }
?>

<form action="createReview.php" method="POST" id="myform">
    <div class="form-group">
       <input type="hidden" name="book_id" value="<?php echo $book_id;?>">
        <label for="title">Title:</label>
        <input type="text" class="form-control" rows="1" name="title">
      
        <label for="review">Review:</label>
        <textarea class="form-control" form="myform" rows="5" name="review"></textarea>
        
      
        <label for="rating">Rating:</label>
        <div class="slidecontainer">
            <input type="range" min="1" max="100" value="50" class="slider" name="rating" id="myRange">
          <p>Rating: <span id="demo"></span></p>
        </div>
        <script>
            var slider = document.getElementById("myRange");
            var output = document.getElementById("demo");
            output.innerHTML = slider.value;

            slider.oninput = function() {
              output.innerHTML = this.value;
            }
        </script>
    
    <div>
        <label for="recommend">Would Recommend?:</label>
     <!-- Use an element to toggle between a like/dislike icon -->
    <i onclick="myFunction(this)" class="fa fa-thumbs-up"></i>
     <input type="hidden" name="recommend" id="recommend" value="1">
      <script>
        function myFunction(x) {
            x.classList.toggle("fa-thumbs-down");
            if (document.getElementById("recommend").getAttribute("value") == "1"){
                document.getElementById("recommend").setAttribute("value", "0");
            }
            else{
                document.getElementById("recommend").setAttribute("value", "1");
            }
            console.log(document.getElementById("recommend").getAttribute("value"));
        }
    </script>   
    </div>
    
     <button type="submit" class="btn btn-primary">Submit Review</button>
      
    </div>
</form>

</body>
</html>





