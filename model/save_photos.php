<?php
	$cont = 1;
	$name = 1;
	if(!isset($_POST['base_img'])){
		die("{\"error\": \" Flopou. Cadê o base_img?\"}");
	}

	$result = [];
	$data = str_replace(" ","+",$_POST['base_img']); //O envio do dado pelo XMLHttpRequest tende a trocar o + por espaço, por isso a necessidade de substituir.


	//Tirar 3 fotos para cada pasta
	if ($cont == 1 && !file_exists("../assets/lib/face-api/labels/{$cont}")) {
		mkdir("../assets/lib/face-api/{$cont}");
	}
	while (file_exists("../assets/lib/face-api/labels/{$cont}/{$name}.jpg")) {
		$name++;
		if ($name == 4) {
			$cont++;
			$name = 1;
		}
		if (!file_exists("../assets/lib/face-api/labels/{$cont}")) {
			mkdir("../assets/lib/face-api/labels/{$cont}");
			$name = 1;
		}
	}
	$path = "../assets/lib/face-api/labels/{$cont}/{$name}.jpg";	
		//data
		$data = explode(',', $data);
		
		//Save data
		file_put_contents($path, base64_decode(trim($data[1])));
		
		//Print Data
		$result['img'] = $path;
		echo json_encode($result, JSON_PRETTY_PRINT);	

	//while nao criou aumentar $cont		
?>