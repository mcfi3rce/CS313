<?php
/**********************************************************
* File: create-user.php
* Author: Adam McPherson
* 
* Description: This will create a new user in the database for the new 
* users added.
***********************************************************/

require("dbConnect.php");
$db = get_db();

/***********************************************************
* This is the query that I would like to run
* SELECT id, username, password FROM user WHERE username = 
*/
try{
    // Get the Data from the POST
    $username = $_POST['lg_username'];
    $password = $_POST['lg_password'];
    $email = $_POST['lg_password'];
    $displayName = $_POST['lg_password'];
    
    
    
    

    echo "username= $username </br>";
    echo "password= $password </br>";


    if (isset($_POST['lg_username'])){
        echo "SET";
        $query = 'SELECT id, username, password FROM public.user WHERE username = :username AND password = :password';
        $statement = $db->prepare($query);

        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute();
        
        if ($row = $statement->fetch(PDO::FETCH_ASSOC)){
            header("Location: book-list.php");
        }
        else
        {
            header("Location: login.php");
        }
            
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
    