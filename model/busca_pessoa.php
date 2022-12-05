<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$db = "FACEID";
	$conn = new mysqli($host,$username,$password) or die("Impossível Conectar");
	mysqli_select_db($conn, $db) or die("Impossível Conectar");

	if(!isset($_POST['RM'])){
		die("{\"error\": \" Não Localizado!\"}");
	} else {
		$replaced = str_replace(" ","+",$_POST['RM']); //O envio do dado pelo XMLHttpRequest tende a trocar o + por espaço, por isso a necessidade de substituir.
		$sql = "SELECT *
		FROM CadastroAluno
		WHERE RM = $replaced;";
		$result = mysqli_query($conn,$sql)  or 
		die("Impossível executar a query");
		
		$row = mysqli_fetch_object($result);
		echo json_encode($row, JSON_PRETTY_PRINT);
	}		
?>
