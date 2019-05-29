<?php

require 'db_connection.php';


         $sql = "SELECT * FROM movie_list " .
                " WHERE year = " . $_GET['movie_list'];
         $stmt = $dbConn->query($sql);
         $results = $stmt->fetchAll();

         echo "{";
         foreach ($results as $record){
             echo "\"title\":" . "\"" . $record['title'] . "\",";
              ;
         }
         echo "}";

?>
