<?php

if (isset($_POST['title']))
{
require 'db_connection.php';
$sql = "SELECT title
        FROM movie_list
        WHERE title = :title";

$stmt = $dbConn -> prepare($sql);
$stmt -> execute(array(":title" => $_POST['title']));
$record = $stmt->fetch();

$output = array();

if (empty($record))
{
    //echo "{\"exists\":\"true\"}";
    $output["exists"] = "false";

}
else
    {
        //echo "title already taken";
        $output["exists"] = "true";
    }

    echo json_encode($output);
}


?>
