<?php
$dbuser = 'postgres';
$dbpass = 'wordtreeattack';
$host = 'localhost';
$port = '8888';
$dbname = 'postgres';
$pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $dbuser, $dbpass);

$books = $pdo->query('SELECT * FROM public.book');
while ($row = $books->fetch())
{
    echo $row['title'] . "</br>";
    echo $row['author'] . "</br>";
    echo $row['publisher'] . "</br>";
    echo $row['isbn'] . "</br>";
}
    
?>