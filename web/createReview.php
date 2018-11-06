<?php

    $title = $_POST['title'];
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];
    $recommend = $_POST['recommend'];
    $book_id = $_POST['book_id'];

echo $title . "<br>";
echo $comment . "<br>";
echo $rating . "<br>";
echo $recommend . "<br>";

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
	       rating FLOAT NOT NULL,
	       review TEXT,
            would_recommend BOOLEAN
        );
        
        */
            
        
        $query = 'INSERT INTO public.books_read(user_id, book_id, email, display_name) VALUES (:username, :password, :email, :displayName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':displayName', $displayName);
        
        $statement->execute();
        
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
