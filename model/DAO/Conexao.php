
<?php

function conectar(){

   $dsn = "mysql:dbname=FACEID;host=localhost";
   $username = "root";
   $password = "";
    
   try {
       $pdo = new PDO($dsn, $username, $password);
     $pdo->exec("SET CHARACTER SET utf8");
     //$array = array('ok' => 1);
     //echo json_encode($array, JSON_PRETTY_PRINT);
     //echo "Ok: ";


   } catch (PDOException $e) {
       echo "Error: ".$e;
   }

    return $pdo;

}



?>  
