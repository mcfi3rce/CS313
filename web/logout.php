<?php

session_destroy();
$_SESSION = array();
session_cache_expire();

header("Location: login.php");

die();
?>