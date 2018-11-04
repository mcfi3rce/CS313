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
        echo $title . "</br>";
        echo $author . "</br>";
        echo $publisher . "</br>";
        echo $isbn . "</br>";
        echo $image . "</br>";
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
  <title>Adam McPherson Homepage</title>
  <meta charset="utf-8">
</head>
<body>

<img src="<?php echo $image; ?>" class="rounded float-left" alt="...">

</body>
</html>





