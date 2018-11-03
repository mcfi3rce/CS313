<?php
/**********************************************************
* File: authenticate.php
* Author: Adam McPherson
* 
* Description: This is the login page and will hopefully be able 
* to authenticate the user and allow for them to create their own 
* shelves to put books on as well as adding books to the database.
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

    if (isset($_POST['lg_username'])){
        $query = 'SELECT id, username, password FROM public.user WHERE username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        
        $hashed_password = $row['password'];
        
        $match = password_verify($password, $hashed_password);
        if($match){ 
            echo 'Password is valid';
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['logged_in'] = true;
            #header("Location: index.php");
        } else {
            echo 'Password is not valid' ;
            #header("Location: login.php");
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
    