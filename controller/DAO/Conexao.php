<!-- //   $hostname = "localhost";
   //   $username = "root";
   //   $password = "";
   //   $database = "login";

   //   $mysqli = new mysqli($hostname, $username,$password,$database);

   //  if ($mysqli->connect_error) {
   //        die("Connection failed: " . $conn->connect_error);
   //    } -->

     
    
    


<?php

function conectar(){

   $dsn = "mysql:dbname=FACEID;host=localhost";
   $username = "root";
   $password = "";
    
   try {
       $pdo = new PDO($dsn, $username, $password);
     $pdo->exec("SET CHARACTER SET utf8");

   } catch (PDOException $e) {
       echo "Error: ".$e;
   }

    return $pdo;

}



?>  
