<?php
require 'db_connection.php';

$sql = "SELECT *
        FROM movies
        ORDER BY movieName ASC";
$stmt = $dbconn -> prepare($sql);
$stmt -> execute();
$movies = $stmt -> fetchAll();

if (isset($_POST['addReview']))
{
    $sql = "INSERT INTO movie_reviews (reviews)
            VALUE (:review)";
    $stmt = $dbconn -> prepare($sql);
    $stmt -> execute(array (":review" => $_POST['review']));
    echo "Review was added!";
}

function ratedSort()
{
    global $movies;
    $lastIndex = count($movies) - 1;
    for ($i = 0; $i < $lastIndex; $i++)
    {
        for ($j = ($i + 1); $j <= $lastIndex; $j++)
        {
            $movie = $movies[$i];
            $movie2 = $movies[$j];
            if ($movie['imdbRating'] < $movie2['imdbRating'])
            {
                $temp = $movies[$i];
                $movies[$i] = $movies[$j];
                $movies[$j] = $temp;
            }
        }
    }
    return $movies;
}

function sumMinutes()
{
    global $dbconn;
    $sql = "SELECT SUM( duration) sumMinutes
        FROM movies";
    $stmt = $dbconn -> prepare($sql);
    $stmt -> execute();
    $sumMinutes = $stmt -> fetchAll();
    return $sumMinutes;
}

function avgMinutes()
{
    global $dbconn;
    $sql = "SELECT AVG( duration) avgMinutes
        FROM movies";
    $stmt = $dbconn -> prepare($sql);
    $stmt -> execute();
    $avgMinutes = $stmt -> fetchAll();
    return $avgMinutes;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>2016 Movies</title>
</head>
<body>
<h2>All 2016 Box Office Hits</h2>
<?php
echo "It would take ";
$sumMin = sumMinutes();
foreach ($sumMin as $item)
{
    echo $item['sumMinutes'];
}
echo " minutes to watch all these films! <br />";
echo "The average film length is ";
$avgMin = avgMinutes();
foreach ($avgMin as $item)
{
    echo $item['avgMinutes'];
}
echo " minutes. <br />";
?>
<form>
    Sort By
    <select name="sortBy">
        <option value="0">A - Z</option>
        <option value="1">Top Rated</option>
    </select>
    <input type="submit" value="Go">
</form>
<?php
echo "<table border='1'>";
if (isset($_GET['sortBy']))
{
    $sortBy = $_GET['sortBy'];
    if ($sortBy == 1)
    {
        echo "<tr><td colspan='2'>Top Rated</td></tr>";
        $ratedSort = ratedSort();
        foreach ($ratedSort as $movie)
        {
            echo "<tr>";
            echo "<td>" . $movie['movieName'] . "</td>";
            echo "<td>" . $movie['imdbRating'] . "</td>";
        }
    }
    else
    {
        echo "<tr><td colspan='2'>A - Z</td></tr>";
        foreach ($movies as $movie)
        {
            echo "<tr>";
            echo "<td>" . $movie['movieName'] . "</td>";
        }
    }
}
else
{
    echo "<tr><td colspan='2'>A - Z</td></tr>";
    foreach ($movies as $movie)
    {
        echo "<tr>";
        echo "<td>" . $movie['movieName'] . "</td>";
    }
}
?>
<br />
<form method="post">
    Write a review!<br />
    <textarea name="review" rows="15" cols="60"></textarea><br />
    <input type="submit" value="submit review" name="addReview">
</form>
<?php
$dbconn = null;
?>
</body>
</html>
