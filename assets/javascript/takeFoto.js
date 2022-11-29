function reconhecer(){
	document.getElementById('active').style.display = 'block';
	document.getElementById('recognize').style.display = 'none';
}
function loadCameraOne(ativar){
	if (ativar === active) {
		var video = document.querySelector("#first");
		//console.log("Camera Um")
		statusVerify(document.getElementById('active'), document.getElementById('take') );
		//document.getElementById('logoHolder').style.display = 'flex';
		document.getElementById('first').style.display = 'block';
	} else if (ativar === active2) {
		var video = document.querySelector("#second");
		statusVerify(document.getElementById('active2'), document.getElementById('take2'), null );
	} else if (ativar === active3) {
		var video = document.querySelector("#third");
		statusVerify(document.getElementById('active3'), document.getElementById('take3'), null );
	}
		//As opções abaixo são necessárias para o funcionamento correto no iOS
		video.setAttribute('autoplay', '');
	    video.setAttribute('muted', '');
	    video.setAttribute('playsinline', '');
	    //--

	//Verifica se o navegador pode capturar mídia
	if (navigator.mediaDevices.getUserMedia) {
		navigator.mediaDevices.getUserMedia({audio: false, video: {facingMode: 'user'}})
		.then( function(stream) {
			//Definir o elemento víde a carregar o capturado pela webcam
			video.srcObject = stream;
		})
		.catch(function(error) {
			//alert("Oooopps... Falhou :'(");
			alert("Não Será Possível Capturar Imagem, Recarregue a página e Tente Novamente. Caso o erro persista, contate o administrador!");
		});
	}
}

function takeSnapShot(tirar){
	if (tirar === take) {
		var video = document.querySelector("#first");
		var canvas = document.querySelector("#canvas");
		document.getElementById('first').style.display = 'none';
		document.getElementById('canvas').style.display = 'block';
		document.getElementById('take').style.display = 'none';
		document.getElementById('save').style.display = 'block';
		document.getElementById('again').style.display = 'block';
		
	} else if (tirar === take2) {
		var video = document.querySelector("#second");
		var canvas = document.querySelector("#canvas2");
		document.getElementById('second').style.display = 'none';
		document.getElementById('canvas2').style.display = 'block';
		document.getElementById('take2').style.display = 'none';
		document.getElementById('save2').style.display = 'block';
		document.getElementById('again2').style.display = 'block';
	} else if (tirar === take3) {
		var video = document.querySelector("#third");
		var canvas = document.querySelector("#canvas3");
		document.getElementById('third').style.display = 'none';
		document.getElementById('canvas3').style.display = 'block';
		document.getElementById('take3').style.display = 'none';
		document.getElementById('save3').style.display = 'block';
		document.getElementById('again3').style.display = 'block';
	}
	 
	canvas.height = 300;
	canvas.width = 400;
	var context = canvas.getContext('2d');
	context.drawImage(video, 0, 0, canvas.width, canvas.height);
}

function retakeSnapShot(denovo){
	if (denovo === again) {
		document.getElementById('first').style.display = 'block';
		document.getElementById('canvas').style.display = 'none';
		document.getElementById('take').style.display = 'block';
		document.getElementById('save').style.display = 'none';
		document.getElementById('again').style.display = 'none';
	} else if (denovo === again2) {
		document.getElementById('second').style.display = 'block';
		document.getElementById('canvas2').style.display = 'none';
		document.getElementById('take2').style.display = 'block';
		document.getElementById('save2').style.display = 'none';
		document.getElementById('again2').style.display = 'none';
	} else if (denovo === again3) {
		document.getElementById('third').style.display = 'block';
		document.getElementById('canvas3').style.display = 'none';
		document.getElementById('take3').style.display = 'block';
		document.getElementById('save3').style.display = 'none';
		document.getElementById('again3').style.display = 'none';
	}
}

function saveSnapShot(salvar){
	if (salvar === save) {
		document.getElementById('first').style.display = 'none';
		document.getElementById('take').style.display = 'none';
		document.getElementById('canvas').style.display = 'none';
		document.getElementById('save').style.display = 'none';
		document.getElementById('again').style.display = 'none';
		document.getElementById('second').style.display = 'block';
		document.getElementById('active2').style.display = 'block';
		//Criando o JPG
		var canvas = document.querySelector("#canvas"); 
	} else if (salvar === save2) {
		document.getElementById('second').style.display = 'none';
		document.getElementById('canvas2').style.display = 'none';
		document.getElementById('take2').style.display = 'none';
		document.getElementById('save2').style.display = 'none';
		document.getElementById('again2').style.display = 'none';
		document.getElementById('third').style.display = 'block';
		document.getElementById('active3').style.display = 'block';
		//Criando o JPG
		var canvas = document.querySelector("#canvas2"); 
	} else if (salvar === save3) {
		document.getElementById('third').style.display = 'none';
		document.getElementById('take3').style.display = 'none';
		document.getElementById('save3').style.display = 'none';
		document.getElementById('again3').style.display = 'none';
		//Criando o JPG
		var canvas = document.querySelector("#canvas3"); 
	}
	//Criando o JPG
	//var canvas = document.querySelector("#canvas"); 
	var dataURI = canvas.toDataURL('image/jpeg'); //O resultado é um BASE64 de uma imagem.
	document.querySelector("#base_img").value = dataURI;
	sendSnapShot(dataURI); //Gerar Imagem e Salvar Caminho no Banco
}

function sendSnapShot(base64){	
	var request = new XMLHttpRequest();
		request.open('POST', '../model/save_photos.php', true);
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
			} else {
				alert( "Erro ao salvar. Tipo:" + request.status );
			}
		};
		
		request.onerror = function() {
		 	alert("Erro ao salvar. Back-End inacessível.");
		}
		
		request.send("base_img="+base64); // Enviar dados
}

function statusVerify(active, take, cancel) {
	active.style.display = 'block' ? 
	active.style.display = 'none' : 
	active.style.display = 'block' ;

	take.style.display = 'none' ? 
	take.style.display = 'block' : 
	take.style.display = 'none' ;

	if (cancel != null) {
		cancel.style.display = 'none' ? 
		cancel.style.display = 'block' : 
		cancel.style.display = 'none' ;

	}
	
}