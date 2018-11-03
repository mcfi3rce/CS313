<?php
/**********************************************************
* File: authenticate.php
* Author: Adam McPherson
* 
* Description: This will allow the users to add Books they like to the 
* collection. It will take in the user's input and add it to the database.
***********************************************************/

require("dbConnect.php");
$db = get_db();

/***********************************************************
* This is the query that I would like to run
* INSERT INTO public.book (title, author, publisher, isbn, cover_art)
*/

try{
    // Get the Data from the POST
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $isbn = $_POST['isbn'];
    $cover_art = $_POST['cover_art'];
    
    /*echo $title . '</br>';
    echo $author . '</br>';
    echo $publisher . '</br>';
    echo $isbn . '</br>';
    echo $cover_art . '</br>';*/
    
    if (isset($_POST['title'])){
        
        $query = 'INSERT INTO public.user(title, author, publisher, isbn, cover_art) VALUES (:title, :author, :publisher, :isbn, :cover_art)';
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':author', $author);
        $statement->bindValue(':publisher', $publisher);
        $statement->bindValue(':isbn', $isbn);
        $statement->bindValue(':cover_art', $cover_art);
        $statement->execute();    
        
        echo "SUCCESS!";
    } 
    else {

        echo "ERROR sending POST \n";
    }
}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}
