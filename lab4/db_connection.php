<?php
$host     = "localhost";
$dbname   = "cald1166";
$username = "cald1166";
$password = "Dattebayo!";

//establishes database connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//shows errors when connecting to database
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 ?>
