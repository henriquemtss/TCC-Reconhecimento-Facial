function myFunction(funcao) {
	if (funcao === curAlu) {
		var x = document.getElementById("curAlu").value;
		document.getElementById("cursos-select").value = x;
	} else if (funcao === perSel) {
		var x = document.getElementById("perSel").value;
		document.getElementById("periodo-select").value = x;
	} else {
		var x = document.getElementById("funFun").value;
		document.getElementById("funcao").value = x;
	}
  }
function editar() {
	desabilitarCameras();
	document.getElementById('active').style.display = 'none';
	document.getElementById('editar').style.display = 'none';
	document.getElementById('editar2').style.display = 'none';
	document.getElementById('recognize').style.display = 'block';
	document.getElementById('recognize2').style.display = 'block';
	document.getElementById('Consultar').style.display = 'block';
	document.getElementById('Consultar2').style.display = 'block';
	document.getElementById("rmAluno").readOnly = false;
	document.getElementById("nomeAluno").readOnly = false;
	document.getElementById("emailAluno").readOnly = false;
	document.getElementById("cursos-select").style.display = 'none';
	document.getElementById("periodo-select").style.display = 'none';
	document.getElementById("funcao").style.display = 'none';
	document.getElementById("funcao").style.display = 'none';
	document.getElementById('other').disabled = false;
	document.getElementById('enviar').style.display = 'none';
	document.getElementById('tabpadrao').disabled = false;
	document.getElementById("nomeSeg").readOnly = false;
	document.getElementById("cpfSeg").readOnly = false;
	document.getElementById("funcao").readOnly = false;
	document.getElementById("telFunc").readOnly = false;
	document.getElementById("emailFuncionario").readOnly = false;
	document.getElementById("perSel").style.display = 'block';
	document.getElementById("curAlu").style.display = 'block';
	document.getElementById("funFun").style.display = 'block';
}

const alunos = document.querySelectorAll(".inputAluno")
console.log(alunos)
const funcionarios = document.querySelectorAll(".inputFuncionario")

const enviarAluno = document.querySelector("#recognize");
const enviarFuncionario = document.querySelector("#recognize2");


enviarAluno.addEventListener('click', function (e) {
	verificacao(alunos)
})

enviarFuncionario.addEventListener('click', function (e) {
	var cpf = document.querySelector("#cpfSeg").value.replace(/\./g, '');
	cpf = cpf.replace(/\-/g, '');
	console.log(cpf);
	verificarCPF(cpf);
	console.log(verificarCPF(cpf));
	if (verificarCPF(cpf) === true) {
		verificacao(funcionarios);
		document.getElementById('preencher').style.display='none';
		document.getElementById('invalido').style.display='none';
		document.getElementById('cpfSeg').classList.remove("erro");
	} else if (verificarCPF(cpf) === false && document.getElementById('cpfSeg').value !== "") {
		verificacao(funcionarios);
		document.getElementById('invalido').style.color = 'red';
		document.getElementById('preencher').style.display='none';
		document.getElementById('invalido').style.display='block';
		document.getElementById('cpfSeg').classList.add("erro");
	} else if (document.getElementById('cpfSeg') !== ""){
		document.getElementById('invalido').style.display='none';
		document.getElementById('preencher').style.display='block';
		verificacao(funcionarios);
	}

})

const verificacao = (campos) => {
	var verifica = true;
	for (let i = 0; i < campos.length; i++) {
		if (campos[i].value.length == 0) {
			console.log(campos[i])
			campos[i].classList.remove("sucess")
			campos[i].classList.add("erro")
			verifica = false
		}
		else {
			campos[i].classList.remove("erro")
			campos[i].classList.add("sucess")
		}
	}
	console.log(verifica)
	var cpf = document.querySelector("#cpfSeg").value.replace(/\./g, '');
	cpf = cpf.replace(/\-/g, '');
	if (document.getElementById('tabpadrao').classList.contains("ativo") && verifica) {
		reconhecer()
	} else if (verifica && verificarCPF(cpf)) {
		reconhecer()
	}
}


function reconhecer(){
	if (
		document.getElementById('tabpadrao').classList.contains("ativo")
		) {
			document.getElementById("curAlu").style.display = 'none';
			document.getElementById("perSel").style.display = 'none';
			document.getElementById("cursos-select").style.display = 'block';
			document.getElementById("cursos-select").readOnly = true;
			document.getElementById("periodo-select").style.display = 'block';
			document.getElementById("periodo-select").readOnly = true;
			document.getElementById("rmAluno").readOnly = true;
			document.getElementById("nomeAluno").readOnly = true;
			document.getElementById("emailAluno").readOnly = true;
			document.getElementById('other').disabled = true;

			document.getElementById('active').style.display = 'block';
			document.getElementById('recognize').style.display = 'none';
			document.getElementById('recognize2').style.display = 'none';
			document.getElementById('Consultar').style.display = 'none';
			document.getElementById('Consultar2').style.display = 'none';
			document.getElementById('editar').style.display = 'block';
			document.getElementById('editar2').style.display = 'block';
	}

	if (
		document.getElementById('other').classList.contains("ativo")
		) {
			document.getElementById("funFun").style.display = 'none';
			document.getElementById("funcao").style.display = 'block';
			document.getElementById('tabpadrao').disabled = true;
			document.getElementById("nomeSeg").readOnly = true;
			document.getElementById("cpfSeg").readOnly = true;
			document.getElementById("funcao").readOnly = true;
			document.getElementById("telFunc").readOnly = true;
			document.getElementById("emailFuncionario").readOnly = true;
			document.getElementById('active').style.display = 'block';
			document.getElementById('recognize').style.display = 'none';
			document.getElementById('recognize2').style.display = 'none';
			document.getElementById('Consultar').style.display = 'none';
			document.getElementById('Consultar2').style.display = 'none';
			document.getElementById('editar').style.display = 'block';
			document.getElementById('editar2').style.display = 'block';
	}
}

function loadCameraOne(ativar){
	console.log("ativando camera");
	if (ativar === active) {
		console.log("ativando camera 1");
		var video = document.querySelector("#first");
		statusVerify(document.getElementById('active'), document.getElementById('take') );
		document.getElementById('first').style.display = 'block';
		document.getElementById('posAn1').style.display = 'block';
	} else if (ativar === active2) {
		var video = document.querySelector("#second");
		statusVerify(document.getElementById('active2'), document.getElementById('take2'), null );
		document.getElementById('posAn2').style.display = 'block';
	} else if (ativar === active3) {
		var video = document.querySelector("#third");
		statusVerify(document.getElementById('active3'), document.getElementById('take3'), null );
		document.getElementById('posAn3').style.display = 'block';
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
		document.getElementById('posAn1').style.display = 'none';
		var video = document.querySelector("#first");
		var canvas = document.querySelector("#canvas");
		document.getElementById('first').style.display = 'none';
		document.getElementById('canvas').style.display = 'block';
		document.getElementById('take').style.display = 'none';
		document.getElementById('save').style.display = 'block';
		document.getElementById('again').style.display = 'block';
		
	} else if (tirar === take2) {
		document.getElementById('posAn2').style.display = 'none';
		var video = document.querySelector("#second");
		var canvas = document.querySelector("#canvas2");
		document.getElementById('second').style.display = 'none';
		document.getElementById('canvas2').style.display = 'block';
		document.getElementById('take2').style.display = 'none';
		document.getElementById('save2').style.display = 'block';
		document.getElementById('again2').style.display = 'block';
	} else if (tirar === take3) {
		document.getElementById('posAn3').style.display = 'none';
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
		document.getElementById('posAn1').style.display = 'block';
	} else if (denovo === again2) {
		document.getElementById('second').style.display = 'block';
		document.getElementById('canvas2').style.display = 'none';
		document.getElementById('take2').style.display = 'block';
		document.getElementById('save2').style.display = 'none';
		document.getElementById('again2').style.display = 'none';
		document.getElementById('posAn2').style.display = 'block';
	} else if (denovo === again3) {
		document.getElementById('third').style.display = 'block';
		document.getElementById('canvas3').style.display = 'none';
		document.getElementById('take3').style.display = 'block';
		document.getElementById('save3').style.display = 'none';
		document.getElementById('again3').style.display = 'none';
		document.getElementById('posAn3').style.display = 'block';
	}
}

function saveSnapShot(salvar, acao){
	var funcao = 'x';
	if (acao === 'A') {
		funcao = 'A';
	if (salvar === save) {
		document.getElementById('posAn1').style.display = 'none';
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
		document.getElementById('posAn2').style.display = 'none';
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
		document.getElementById('posAn3').style.display = 'none';
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
					//alert(data);
					const Toast = Swal.mixin({
						toast: true,
						position: 'top',
						showConfirmButton: false,
						timer: 3000,
						timerProgressBar: true,
						didOpen: (toast) => {
						  toast.addEventListener('mouseenter', Swal.stopTimer)
						  toast.addEventListener('mouseleave', Swal.resumeTimer)
						}
					  })
					  
					  Toast.fire({
						icon: 'error',
						title: 'Usuário Já Cadastrado!'
					  })
					document.getElementById('second').style.display = 'none';
					document.getElementById('active2').style.display = 'none';
					window.setTimeout( function() {
						window.location.reload();
					  }, 3000);
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

function desabilitarCameras() {
		document.getElementById('first').style.display = 'none';
		document.getElementById('canvas').style.display = 'none';
		document.getElementById('take').style.display = 'none';
		document.getElementById('save').style.display = 'none';
		document.getElementById('again').style.display = 'none';
		document.getElementById('second').style.display = 'none';
		document.getElementById('canvas2').style.display = 'none';
		document.getElementById('take2').style.display = 'none';
		document.getElementById('save2').style.display = 'none';
		document.getElementById('again2').style.display = 'none';
		document.getElementById('third').style.display = 'none';
		document.getElementById('canvas3').style.display = 'none';
		document.getElementById('take3').style.display = 'none';
		document.getElementById('save3').style.display = 'none';
		document.getElementById('again3').style.display = 'none';
}

function verificarCPF(numeroCPF) {
	var cpf = numeroCPF;
	var v1 = 0;
	var v2 = 0;
	var soma = 0;
	var d1 = parseInt(cpf[9]);
	var d2 = parseInt(cpf[10]);
	console.log(d1);
	console.log(d2);

	//Verificando o Primeiro Digito
	var x = 10;
	for (var i = 0; i < 9; i++) {
		v1 = cpf[i] * x;
		x--;
		soma += v1;
	}
	soma %= 11;
	if (soma >= 2) {
		v1 = 11 - soma;
	} else {
		v1 = 0;
	}
	

	//Verificando o Segundo Digito
	x = 11;
	soma = 0;
	for (var i = 0; i < 10; i++) {
		v2 = cpf[i] * x;
		x--;
		soma += v2;
	}
	console.log(soma);
	soma %= 11;
	if (soma >= 2) {
		v2 = 11 - soma;
	} else {
		v2 = 0;
	}

	console.log(v1);
	console.log(v2);
	
	//Resultado
	if (v1 === d1 && v2 === d2) {
		console.log("Positivo");
		return true;
	} else {
		console.log("Negativo");
		return false;
	}
}

document.getElementById("rmAluno").addEventListener("change", function() {
	let rm = parseInt(this.value);
	if (rm < 10000) this.value = 10000;
	if (rm > 99999) this.value = 99999;
});

document.getElementById("telFunc").addEventListener("focusout", function() {
	let tel = (this.value).length;
	if (tel < 14 && tel !== 0) {
		document.getElementById("phone").style.color = 'red';
		document.getElementById("phone").style.display = 'block';
		document.getElementById("telFunc").focus();
		document.getElementById("recognize2").disabled = true;
		document.getElementById("telFun").style.display = 'none';
	} else if (tel === 0){
		document.getElementById("recognize2").disabled = false;
		document.getElementById("phone").style.display = 'none';
		document.getElementById("telFun").style.display = 'block';
	} else {
		document.getElementById("recognize2").disabled = false;
		document.getElementById("phone").style.display = 'none';
		document.getElementById("telFun").style.display = 'none';
	}
});

document.getElementById("emailFuncionario").addEventListener("focusout", function() {
	let mail = (this.value);
	usuario = mail.substring(0, mail.indexOf("@"));
	dominio = mail.substring(mail.indexOf("@")+ 1, mail.length);

	if ((usuario.length >=1) &&
		(dominio.length >=3) &&
		(usuario.search("@")==-1) &&
		(dominio.search("@")==-1) &&
		(usuario.search(" ")==-1) &&
		(dominio.search(" ")==-1) &&
		(dominio.search(".")!=-1) &&
		(dominio.indexOf(".") >=1)&&
		(dominio.lastIndexOf(".") < dominio.length - 1)) {
		document.getElementById("mail").style.display = 'none';
		document.getElementById("recognize2").disabled = false;
	} else if ((mail.length === 0)) {
		document.getElementById("mail").style.display = 'none';
		if (document.getElementById("fmail").style.display === 'none') {
			document.getElementById("fmail").style.display = 'block';
		}
		document.getElementById("recognize2").disabled = false;
	} else {
		document.getElementById("mail").innerHTML="<font color='red'>E-mail inválido </font>";
		document.getElementById("mail").style.display = 'block';
		document.getElementById("fmail").style.display = 'none';
		document.getElementById("recognize2").disabled = true;
		document.getElementById("emailFuncionario").focus();
	}
});

document.getElementById("emailAluno").addEventListener("focusout", function() {
	let mail = (this.value);
	usuario = mail.substring(0, mail.indexOf("@"));
	dominio = mail.substring(mail.indexOf("@")+ 1, mail.length);

	if ((usuario.length >=1) &&
		(dominio.length >=3) &&
		(usuario.search("@")==-1) &&
		(dominio.search("@")==-1) &&
		(usuario.search(" ")==-1) &&
		(dominio.search(" ")==-1) &&
		(dominio.search(".")!=-1) &&
		(dominio.indexOf(".") >=1)&&
		(dominio.lastIndexOf(".") < dominio.length - 1)) {
		document.getElementById("mail2").style.display = 'none';
		document.getElementById("recognize").disabled = false;
	}
	else if ((mail.length === 0)) {
		document.getElementById("mail2").style.display = 'none';
		if (document.getElementById("amail2").style.display === 'none') {
			document.getElementById("amail2").style.display = 'block';
		}
		document.getElementById("recognize").disabled = false;
	} else {
		document.getElementById("mail2").innerHTML="<font color='red'>E-mail inválido </font>";
		document.getElementById("mail2").style.display = 'block';
		document.getElementById("amail2").style.display = 'none';
		document.getElementById("recognize").disabled = true;
		document.getElementById("emailAluno").focus();
	}
});

var cpf = document.getElementById('cpfSeg');
cpf.addEventListener("blur", function(){
	
	if(cpf.value) cpf.value = cpf.value.match(/.{1,3}/g).join(".").replace(/\.(?=[^.]*$)/,"-");
 });

 document.getElementById('cpfSeg').addEventListener("input", function(){
	var cpf = document.querySelector("#cpfSeg").value.replace(/\D/g,"");
 });