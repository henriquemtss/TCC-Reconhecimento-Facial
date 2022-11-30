<?php
	$cont = 1;
	$name = 1;
	if(!isset($_POST['base_img'])){
		die("{\"error\": \" Flopou. Cadê o base_img?\"}");
	}

	$result = [];
	$replaced = str_replace(" ","+",$_POST['base_img']); //O envio do dado pelo XMLHttpRequest tende a trocar o + por espaço, por isso a necessidade de substituir.
	$folder = substr($replaced, -5);
	$data = explode(',',$replaced);

	if (file_exists("../assets/lib/face-api/labels/{$folder}")) {
		foreach(scandir("../assets/lib/face-api/labels/{$folder}") as $item){
			if($item != '.' AND $item != '..'){
				$cont += 1;
			}
		}
	}
	//die("{\"error\": \"$folder\"}");

	if(substr($replaced, -6, 1) === 'A') {
		//Tirar 3 fotos para cada pasta
		if (!file_exists("../assets/lib/face-api/labels/{$folder}")) {
			mkdir("../assets/lib/face-api/labels/{$folder}");
		} else if(substr($replaced, -6, 1) === 'A' AND $cont < 4) {
			while (file_exists("../assets/lib/face-api/labels/{$folder}/{$name}.jpg")) {
				$name++;
			}
		} else if (substr($replaced, -6, 1) === 'B' AND $cont === 4) {
			$mask = "*.jpg";
			array_map("unlink", glob('../assets/lib/face-api/labels/'.$folder.'/'.$mask));
			rmdir("../assets/lib/face-api/labels/{$folder}");
			mkdir("../assets/lib/face-api/labels/{$folder}");
		} else {
			die("{\"error\": \"Flopou! Usuário Já Cadastrado!\"}");
		}
		
	}
	
	$path = "../assets/lib/face-api/labels/{$folder}/{$name}.jpg";	
		//data
		//$data = explode(',', $data);
		
		//Save data
		file_put_contents($path, base64_decode(trim($data[1])));

		die("{\"error\": \" $cont\"}");
		//Print Data
		//$result['img'] = $path;
		//echo json_encode($result, JSON_PRETTY_PRINT);	

	//while nao criou aumentar $cont		
?>