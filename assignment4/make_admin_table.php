<?php

require "db_connection.php";


$sql = "CREATE TABLE movie_admin (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
firstname varchar (50),
lastname varchar (50),
username varchar (50) NOT NULL,
password varchar (50) NOT NULL)";

$stmt = $dbconn -> prepare($sql);
$stmt -> execute();

$sql = "INSERT INTO movie_admin
(firstname, lastname, username, password)
VALUES
(:firstname, :lastname, :username, :password)";
$stmt = $dbConn -> prepare($sql);
$stmt -> execute ( array (":firstname" => "Christopher", ":lastname" => "Calderon", ":username" => "movieguy", ":password" => hash('sha1', 'password')));


echo "Your admin table is created!";

?>
