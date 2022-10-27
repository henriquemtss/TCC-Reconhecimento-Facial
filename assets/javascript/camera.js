var click = 0;
function loadCamera(){
	click++;
	//Captura elemento de vídeo
	var video = document.querySelector("#webCamera");
	
	//As opções abaixo são necessárias para o funcionamento correto no iOS
	video.setAttribute('autoplay', '');
	video.setAttribute('muted', '');
	video.setAttribute('playsinline', '');
	//--
	
	//Verifica se o navegador pode capturar mídia
	if (click == 1 && navigator.mediaDevices.getUserMedia) {
		navigator.mediaDevices.getUserMedia({audio: false, video: {facingMode: 'user'}})
		.then( function(stream) {
			//Definir o elemento víde a carregar o capturado pela webcam
			video.srcObject = stream;
			//if (document.getElementById('webCamera').style.display == 'none') {
				document.getElementById('webCamera').style.display = 'block';
				document.getElementById('noCamera').style.display = 'none';
				document.getElementById('reconhecer').style.display = 'none';
				document.getElementById('capturar').style.display = 'block';
			// } else {
			// 	document.getElementById('webCamera').style.display = 'none';
			// 	document.getElementById('noCamera').style.display = 'block';
			// }
		})
		.catch(function(error) {
			alert("Não Será Possível Capturar Imagem, Recarregue a página e Tente Novamente. Caso o erro persista, contate o administrador!");
		});
	}
}

function takeSnapShot(){
	//Captura elemento de vídeo
	var video = document.querySelector("#webCamera");
	
	//Criando um canvas que vai guardar a imagem temporariamente
	var canvas = document.createElement('canvas');
	canvas.width = video.videoWidth;
	canvas.height = video.videoHeight;
	var ctx = canvas.getContext('2d');
	
	//Desnehando e convertendo as minensões
	ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
	
	//Criando o JPG
	var dataURI = canvas.toDataURL('image/jpeg'); //O resultado é um BASE64 de uma imagem.
	document.querySelector("#base_img").value = dataURI;
	
	sendSnapShot(dataURI); //Gerar Imagem e Salvar Caminho no Banco
}

function sendSnapShot(base64){	
	var request = new XMLHttpRequest();
		request.open('POST', 'save_photos.php', true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		
		request.onload = function() {
			console.log(request);
			if (request.status >= 200 && request.status < 400) {
				//Colocar o caminho da imagem no SRC
				var data = JSON.parse(request.responseText);
				
				//verificar se houve erro
				if(data.error){
					alert(data.error);
					return false;
				}
				
				//Mostrar informações
				document.querySelector("#imagemConvertida").setAttribute("src", data.img);
				document.querySelector("#caminhoImagem a").setAttribute("href", data.img);
				document.querySelector("#caminhoImagem a").innerHTML = data.img.split("/")[1];
			} else {
				alert( "Erro ao salvar. Tipo:" + request.status );
			}
		};
		
		request.onerror = function() {
		 	alert("Erro ao salvar. Back-End inacessível.");
		}
		
		request.send("base_img="+base64); // Enviar dados
}


                