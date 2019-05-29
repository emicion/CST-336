<?php

session_start();

if (isset($_POST['username']))
{
    require 'db_connection.php';

    $sql = "SELECT *
    FROM movie_admin
    WHERE username = :username
    AND password = :password";
    $stmt = $dbconn -> prepare($sql);
    $stmt -> execute(array(":username" => $_POST['username'], ":password" => hash("sha1", $_POST['password'])));
    $record = $stmt -> fetch();

    if (empty($record))
    {
        echo "Wrong username/password!";
    } else
    {
        $_SESSION['username'] = $record['username'];
        $_SESSION['name'] = $record['firstname'] . " " . $record['lastname'];
        header("Location: movieHomepage.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <style>
        form
        {
            display: inline;
        }
    </style>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="background"><img src="moviePosterCollage.jpg"></div>
<div class="modal">
    <h1>Login</h1>
    <form method="post">
    <div class="modal_row">
        <div class="modal_item">Username:</div>
        <div class="modal_item"><input type="text" name="username"/></div>
    </div>
    <div class="modal_row">
        <div class="modal_item">Password:</div>
        <div class="modal_item"><input type="password" name="password"/></div>
    </div>
    <div class="modal_row">
        <div class="modal_item"><input type="submit" value="Login"/></div>
    </div>
    <div class="modal_row">
        <div class="modal_item">Username: movieguy</div>
        <div class="modal_item">Password: password</div>
    </div>
    </form>
</div>
</body>
</html>
