function loadCameraOne(ativar){
	console.log("ativando camera");
	if (ativar === active) {
		console.log("ativando camera 1");
		var video = document.querySelector("#first");
		statusVerify(document.getElementById('active'), document.getElementById('take') );
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

function saveSnapShot(salvar, acao){
	var funcao = 'x';
	if (acao === 'A') {
		funcao = 'A';
	if (salvar === save) {
		document.getElementById('first').style.display = 'none';
		document.getElementById('take').style.display = 'none';
		document.getElementById('canvas').style.display = 'none';
		document.getElementById('save').style.display = 'none';
		document.getElementById('again').style.display = 'none';
		document.getElementById('second').style.display = 'block';
		document.getElementById('active2').style.display = 'block';
		document.getElementById('editar').style.display = 'none';
		document.getElementById('editar2').style.display = 'none';
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
		document.getElementById('enviar').style.display = 'block';
		document.getElementById('enviar2').style.display = 'block';
		document.getElementById('enviar').style.display = 'block';
		document.getElementById('enviar2').style.display = 'block';
		//Criando o JPG
		var canvas = document.querySelector("#canvas3"); 
	}

	} else if (acao === 'B') {
		funcao = 'B';
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
			alert("Fotos Atualizadas Com Sucesso");
			window.open('','_parent',''); 
    		window.close();
			//Criando o JPG
			var canvas = document.querySelector("#canvas3"); 
		}
	}
	//Criando o JPG
	//var canvas = document.querySelector("#canvas"); 
	var dataURI = canvas.toDataURL('image/jpeg'); //O resultado é um BASE64 de uma imagem.

	if (funcao === 'A') {
		if(document.getElementById('tabpadrao').classList.contains("ativo")){
			var folder = funcao + document.querySelector("#rmAluno").value;
			//alert('Numero aluno: ' + folder);
		} else {
			var folder = document.querySelector("#cpfSeg").value.replace(/\./g, '');
			folder = folder.replace(/\-/g, '');
			folder = funcao + folder;
			//alert('Numero Funcionario: ' + folder);
		}
	} else {
		var folder = funcao + JSON.parse(sessionStorage.getItem("codigo"));
	}
	//alert(folder);
	//alert(JSON.parse(sessionStorage.getItem("codigo")));
	
	//var folder = funcao + document.querySelector("#rmAluno").value;
	document.querySelector("#base_img").value = dataURI;
	sendSnapShot(dataURI, folder); //Gerar Imagem e Salvar Caminho no Banco
}

function sendSnapShot(base64, folder){	
	var request = new XMLHttpRequest();
		request.open('POST', '../model/save_photos.php', true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		
		request.onload = function() {
			console.log(request);
			if (request.status >= 200 && request.status < 400) {
				//Colocar o caminho da imagem no SRC
				var data = JSON.parse(request.responseText).error;
				//alert(data);
				if (data === "Usuário Já Cadastrado!") {
					document.getElementById('second').style.display = 'none';
					document.getElementById('active2').style.display = 'none';
					window.setTimeout( function() {
						window.location.reload();
					  }, 1000);
				}
				
				//verificar se houve erro
				if(request.error){
					alert(request.error);
					return false;
				}
			} else {
				alert( "Erro ao salvar. Tipo:" + request.status );
			}
		};
		
		request.onerror = function() {
		 	alert("Erro ao salvar. Back-End inacessível.");
		}
		
		request.send("base_img="+base64+folder); // Enviar dados
		console.log(folder);
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
