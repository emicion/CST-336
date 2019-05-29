<?php


$host     = "localhost";
$dbname   = "cald1166"; //change this to your otterID
$username = "cald1166"; //change this to your otter ID
$password = "Dattebayo!"; //change this to your database account password

//establishes database connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//shows errors when connecting to database
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/**** Getting all team names and their stadium Id ****/
$sql = "SELECT teamName, stadiumId
        FROM nfl_team
        ORDER BY teamName ASC";

$stmt = $dbConn -> prepare($sql); //prepares a statement for execution and returns a statement object
$stmt -> execute(); //execute the prepared statement
$teamNames = $stmt->fetchAll(); //store the obtained data into an array variable

if (isset ($_GET['stadiumId'])) {
   $stadiumId = $_GET['stadiumId'];
   $sql = "SELECT *
           FROM nfl_stadium
           WHERE stadiumId = :stadiumId ";

   $stmt = $dbConn -> prepare($sql);
   $stmt -> execute( array (':stadiumId' => $stadiumId));
   $stadiumInfo = $stmt->fetch();
}

?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
  <h2> NFL Teams & Stadiums Queries </h2>

    <form>
        <select name="stadiumId">
          <option value="-1"> - Select Team -</option>
          <?php
               foreach ($teamNames as $team) {
                   echo "<option  value=" . $team['stadiumId'] . ">" . $team['teamName'] . "</option>";

               //foreach provides an easy way to iterate over arrays. foreach works only on arrays and objects.

               //In the above statement, it loops over $teamNames array. On each iteration, the value of the current element is assigned to $team and the internal array pointer is advanced by one (so on the next iteration, you'll be looking at the next element).

               }

          ?>
        </select>
        <input type="submit" value="Get Stadium Info!" />
    </form>
    <?php

        if (isset($stadiumInfo) && !empty($stadiumInfo)) {
            echo $stadiumInfo['stadiumName'] . "<br />";
            echo $stadiumInfo['street'] . "<br />";
            echo $stadiumInfo['city'] . ", " . $stadiumInfo['state'] . " " . $stadiumInfo['zip']  . " <br />";
        }

    ?>
</body>
</html>
