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

// Get the Data from the POST
$username = $_POST['lg_username'];
$password = $_POST['lg_password'];

echo "username= $username </br>";
echo "password= $password </br>";

    
if (isset($_POST['lg_username'])){
    
    $query = 'SELECT id, username, password FROM user WHERE username = :username AND password = :password';
    $statement = $db->prepare($query);
    
    $statement->bindValue(':username', $username;
	$statement->bindValue(':password', $password);
	
    $statement->execute();
    echo "EXECUTE";
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        echo "WHILE";
        
        if ($row['username'] == $_POST['lg_username'] && 
            $row['password'] == $_POST['lg_password'])
        {
            echo "LOGGED IN";   
        }
        else
        {
            echo "INVALID PASSWORD";   
        }
    }
}
else{
    
    echo "DIDN'T WORK";
}
    

?>