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

echo $_GET['book_id'];
