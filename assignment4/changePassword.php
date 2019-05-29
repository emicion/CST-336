<?php
require 'db_connection.php';
$sql = "SELECT *
        FROM movie_admin
        WHERE username = :username
        AND password = :password";
$stmt = $dbconn -> prepare($sql);
$stmt -> execute(array(":username" => $_POST['username'], ":password" => hash("sha1", $_POST['password'])));
$record = $stmt -> fetch();

if (isset($_POST['password']))
{
    $sql = "INSERT INTO movie_admin (password)
            VALUE (:password)";
    $stmt = $dbconn -> prepare($sql);
    $stmt -> execute(array (":password" => hash("sha1", $_POST['change password'])));
    echo "Password Changed";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="background"><img src="fantasticBeasts.jpg"></div>
<div class="modal">
    <div class="modal_item"><h1>Change Password</h1></div>
    <form method="post">
    <div class="modal_row">
        <div class="modal_item"><textarea name="review" rows="1" cols="60"></textarea></div>
    </div>
    <div class="modal_row">
        <div class="modal_item"><input type="submit" value="change password"/></div>
    </div>
    </form>
</div>
</body>
</html>
