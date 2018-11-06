<?php

/**********************************************************
* File: createReview.php
* Author: Adam McPherson
* 
* Description: This page creates a review of a book.
***********************************************************/
session_start();

require("dbConnect.php");
$db = get_db();

$title = $_POST['title'];
$review = $_POST['review'];
$rating = $_POST['rating'];
$recommend = $_POST['recommend'];
$book_id = $_POST['book_id'];

echo $title . "<br>";
echo $review . "<br>";
echo $rating . "<br>";
echo $recommend . "<br>";
echo $book_id . "<br>";

try{
    // Get the Data from the GET
    
    if (isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        
        /*
       CREATE TABLE public.books_read
       (
	       id SERIAL NOT NULL PRIMARY KEY,
	       user_id INT NOT NULL REFERENCES public.user(id),
            book_id INT NOT NULL REFERENCES public.book(id),
            title VARCHAR(255) NOT NULL,
            rating INT NOT NULL,
            review TEXT,
            would_recommend BOOLEAN
            );
        */
            
        
        $query = 'INSERT INTO public.books_read (user_id, book_id, title, rating, review, would_recommend) VALUES (:user_id, :book_id, :title, :rating, :review, :recommend)';
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->bindValue(':book_id', $book_id);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':rating', $rating);
        $statement->bindValue(':review', $review);
        $statement->bindValue(':recommend', $recommend);
        
        $statement->execute();
    } 
    else {
        echo "ERROR receiving data from POST \n";
    }
}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}

header("Location: seeDetails.php?book_id=" . $book_id);

?>