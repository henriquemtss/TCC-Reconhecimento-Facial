<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$db = "FACEID";
	$conn = new mysqli($host,$username,$password) or die("Impossível Conectar");
	mysqli_select_db($conn, $db) or die("Impossível Conectar");

	if(isset($_POST['RM'])){
		$replaced = str_replace(" ","+",$_POST['RM']);
		$sql = "INSERT
		INTO registro (rm, entradaSaida)
		VALUES ('$replaced', now());";
		$result = mysqli_query($conn,$sql)  or 
		die("Impossível executar a query");

		$sql = "SELECT * 
		FROM registro
		ORDER BY entradaSaida DESC
		LIMIT 1;";
		$result = mysqli_query($conn,$sql)  or 
		die("Impossível executar a query");

	} else {
		die("{\"error\": \"Não Localizado!\"}");
	}	
	$row = mysqli_fetch_object($result);
	echo json_encode($row, JSON_PRETTY_PRINT);	
?>