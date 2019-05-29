<?php
session_start();


 if (!isset ( $_SESSION['username']))  {
     if (isset ($_POST['loginForm'])) {

        require 'db_connection.php';

        $sql = "SELECT *
                FROM lab7_user
                WHERE username = :username
                AND password = :password";

        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute( array(":username" => $_POST['username'],
                                ":password" => $_POST['password']));
        $record = $stmt->fetch();


        if (!empty($record)) {


            $_SESSION['username'] = $record['username'];
            $_SESSION['profilePic'] = $record['profilePic'];
            echo "<h2> Welcome  " . $record['username'] . "!</h2>";

            if (!file_exists($record['username'])) {

               mkdir($record['username']);

            }


        } else {

            $error = " Wrong username / password";
            header("Location: login.html");

        }

     }
 }

  if (isset($_FILES['fileName'])) {


     $_SESSION['profilePic'] = $_FILES['fileName']['name'];
     move_uploaded_file($_FILES['fileName']['tmp_name'], $_SESSION['username'] . "/" . $_FILES['fileName']['name'] );

    //Syntax move_uploaded_file ( string $filename , string $destination )


  }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>profile</title>
  <meta name="description" content="">
  <meta name="author" content="Christopher Calderon">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  <link rel="stylesheet" type="text/css" href="../black_blue.css" />

</head>

<body id="wrapper">
  <div>


  <?php

   if (empty($_SESSION['profilePic'])) {

           echo "<img class='profilepic' src='unknown.jpg'><br/>";

   } else {

            echo "<h2> Welcome  " . $_SESSION['username'] . "!</h2>";
           echo "<img class='profilepic' src='" . $_SESSION['username'] . "/" . $_SESSION['profilePic'] . "'><br/>";

   }



  ?>

  </div>

  <div align="left" class="upload">
  <form   method="post" enctype="multipart/form-data">
      <br/>

      Select File to update profile Picture:

      <input type="file" name="fileName" />
      <br/>
      <input type="submit" name="loginForm">

  </form>

   </div>
</body>
</html>
