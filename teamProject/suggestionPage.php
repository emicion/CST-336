<?php

$host = "localhost";
$dbname = "maug5727";
$username = "maug5727";
$password = "Tranetrane1!!";

$dbconn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$dbconn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$IMDBScore = $_GET['IMDBScore'];
$MPAARating = $_GET['MPAARating'];
$genre = $_GET['genre'];

$sql = "SELECT * FROM movies WHERE imdbRating >= :imdbRating &&
                  MPAAId = :MPAAId &&
                  genreId = :genreId";
$stmt = $dbconn -> prepare($sql);
$stmt -> execute(array(':imdbRating' => $IMDBScore,
                       ':MPAAId' => $MPAARating,
                       ':genreId' => $genre));
$movieMatches = $stmt->fetchAll();

function suggestMovie()
{
    global $movieMatches;
    $max = count($movieMatches) - 1;
    $randIndex = rand(0, $max);
    $movie = $movieMatches[$randIndex];
    return $movie;
}

function moreInfo($movie)
{
    global $dbconn;
    $sql = "SELECT rating
            FROM MPAA_ratings
            WHERE MPAAId = :MPAAId";
    $stmt = $dbconn -> prepare($sql);
    $stmt -> execute(array (':MPAAId' => $movie['MPAAId']));
    $rating = $stmt->fetch();

    $sql = "SELECT movieDescription
            FROM movie_descriptions
            WHERE movieId = :movieId";
    $stmt = $dbconn -> prepare($sql);
    $stmt -> execute(array (':movieId' => $movie['movieId']));
    $description = $stmt->fetch();

    print "<h2 style=\"color:red\">" .$movie['movieName'] . "</h2>";

    print "<div id=\"modal_background\" class=\"modal_background\" onclick=\"closeModal()\">";
    print "<div class=\"modal\">";

    print "<div id=\"INFO_rating\"><p>RATING:" . $rating['rating'] . "</p></div>";
    print "<div id=\"INFO_description\"><p>Description:" . $description['movieDescription'] . "</p></div>";
    print "<div id=\"INFO_duration\"><p>Duration:" . $movie['duration'] . "</p></div>";

    print "</div>"; // end modal
    print "</div>"; // end modal background

    print "<div id=\"infoButton\" onclick=\"openModal()\">More Info</div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>2016 Movies</title>
    <link rel="stylesheet" href="suggestionStyles.css">
</head>
<script>
    function openModal() {
        document.getElementById('modal_background').visible = true;
    }

    function closeModal() {
        document.getElementById('modal_background').visible = false;
    }
</script>
<body>
<h2>2016 Movie Suggestion Generator</h2>
<?php
if (count($movieMatches) == 0)
{
    echo "No Matches <br />";
}
else
{
    $movie = suggestMovie();
    if($movie != "") {
        moreInfo($movie);
    }
}
?>
<form action="movieHomepage.php">
    <input type="submit" value="change parameters" formaction="movieHomepage.php">
</form>
<?php
$dbconn = null;
?>
<script>
    function openModal() {
        document.getElementById('modal_background').style.visibility = "visible";
    }

    function closeModal() {
        document.getElementById('modal_background').style.visibility = "hidden";
    }
</script>
</body>
</html>