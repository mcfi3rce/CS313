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
if (isset($_POST['lg_username'])){
    echo "SELECT id, username, password FROM user WHERE username = " . $_POST['lg_username'] . " AND password = " . $_POST['lg_password'];
    
    $statement = $db->prepare("SELECT id, username, password FROM user WHERE username = " . $_POST['lg_username'] . " AND password = " . $_POST['lg_password']);
    $statement->execute();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
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