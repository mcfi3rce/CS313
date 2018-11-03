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
    $username = $_POST['reg_username'];
    $password = $_POST['reg_password'];
    $password = password_hash($password);
    $email = $_POST['reg_email'];
    $displayName = $_POST['reg_displayname'];
    
    if (isset($_POST['reg_username'])){
        
        $query = 'INSERT INTO public.user(username, password, email, display_name) VALUES (:username, :password, :email, :displayName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':displayName', $displayName);
        
        $statement->execute();    
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

header("Location: login.php");
die();

?>