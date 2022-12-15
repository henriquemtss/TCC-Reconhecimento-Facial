<?php
	$cont = 1;
	$name = 1;
	if(!isset($_POST['base_img'])){
		die("{\"error\": \" Flopou. Cadê o base_img?\"}");
	}

	$result = [];
	$replaced = str_replace(" ","+",$_POST['base_img']); //O envio do dado pelo XMLHttpRequest tende a trocar o + por espaço, por isso a necessidade de substituir.
	if (substr($replaced, -6, 1) === 'A' || substr($replaced, -6, 1) === 'B') {
		$folder = substr($replaced, -5);
	} else {
		$folder = substr($replaced, -11);
	}
	$data = explode(',',$replaced);

	if (file_exists("../assets/lib/face-api/labels/{$folder}")) {
		foreach(scandir("../assets/lib/face-api/labels/{$folder}") as $item){
			if($item != '.' AND $item != '..'){
				$cont += 1;
			}
		}
	}

	if(substr($replaced, -6, 1) === 'A' || 
	substr($replaced, -12, 1) === 'A' ||
	substr($replaced, -6, 1) === 'B' || 
	substr($replaced, -12, 1) === 'B'
	) {

		//Tirar 3 fotos para cada pasta
		if (!file_exists("../assets/lib/face-api/labels/{$folder}")) {
			mkdir("../assets/lib/face-api/labels/{$folder}");
		} else if(substr($replaced, -6, 1) === 'A' || substr($replaced, -12, 1) === 'A' AND $cont < 4) {
			while (file_exists("../assets/lib/face-api/labels/{$folder}/{$name}.jpg")) {
				$name++;
			}
		} else if (substr($replaced, -6, 1) === 'B' || substr($replaced, -12, 1) === 'B' AND $cont === 4) {
			$cont = 1;
			$mask = "*.jpg";
			array_map("unlink", glob('../assets/lib/face-api/labels/'.$folder.'/'.$mask));
			rmdir("../assets/lib/face-api/labels/{$folder}");
			mkdir("../assets/lib/face-api/labels/{$folder}");
		} else if (substr($replaced, -6, 1) === 'B' || substr($replaced, -12, 1) === 'B' AND $cont < 4) {
			while (file_exists("../assets/lib/face-api/labels/{$folder}/{$name}.jpg")) {
				$name++;
			}
		} else {
			die("{\"error\": \"Usuário Já Cadastrado!\"}");
		}
		
	}
	
	$path = "../assets/lib/face-api/labels/{$folder}/{$name}.jpg";	
		file_put_contents($path, base64_decode(trim($data[1])));

		die("{\"error\": \" $cont\"}");	
?>