<?php
$host     = "localhost";
$dbname   = "cald1166";
$username = "cald1166";
$password = "Dattebayo!";

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

/****  Top 5 states with the largest combined number of seats in NFL stadiums ***/
   function largestCombinedCapacity() {
       global $dbConn, $stmt;  //it uses the variables declared previously
    $sql = "SELECT state, SUM( capacity ) combinedCapacity
            FROM nfl_stadium
            GROUP BY state
            ORDER BY combinedCapacity DESC
            LIMIT 5";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    return $stmt->fetchAll();
   }
   /****  NFL teams and their home stadiums ***/
      function teamsAndStadiums() {
          global $dbConn, $stmt;  //it uses the variables declared previously
       //NOTE: field names MUST match the ones in database, they are case sensitive!
       $sql = "SELECT teamName, stadiumName, state
               FROM nfl_team t
               JOIN nfl_stadium s ON t.stadiumId = s.stadiumId
               ORDER BY teamname";
       $stmt = $dbConn -> prepare($sql);
       $stmt -> execute();
       return $stmt->fetchAll();
      }

?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Lab 4A</title>
<style type = "text/css">
@font-face {font-family: JosefinSans-Bold; src: url(JosefinSans-Bold.ttf);}
body {background-color: black; color: white; font-family: sans-serif;}
h2 {color:#0099cc; font-family: JosefinSans-Bold}
</style>
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

    <br />
    <strong>Top 5 states with the largest combined number of seats in NFL stadiums</strong>
    <br />
    <?php
        $records = largestCombinedCapacity();
        foreach ($records as $record) {
          echo $record['state'] . " - " . $record['combinedCapacity']  . "<br />";
        }
    ?>

    <br />
    <strong>List of all teams and their home stadium</strong>
    <br />
    <?php
        $records = teamsAndStadiums();
        foreach ($records as $record) {
          echo $record['teamName'] . " - " . $record['stadiumName'] . "  - " . $record['state'] . "<br />";
        }
    ?>


    <?php

    $dbConn = null; //closes the database connection.

    ?>
</body>
</html>
