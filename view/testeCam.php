<?php
    include "../Controller/Protect.php";
    if (!isset($_SESSION)) {
        session_start();
    }
    if(!isset($_SESSION['splash']))
    {
        $_SESSION['splash'] = true;

        include('splash.php');
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/corpo.css">
    <link rel="stylesheet" href="../assets/css/variaveis.css">
    <link rel="stylesheet" href="../assets/css/header-cadastro.css">
    <link rel="stylesheet" href="../assets/css/cadastro.css">
    <title>Reconhecimento facial - Atualização de Foto</title>

    <script>
	function loadCameraOne(ativar){
        if (ativar === active) {
            var video = document.querySelector("#first");
            document.getElementById('first').style.display = 'block';
            document.getElementById('active').style.display = 'none';
            document.getElementById('deactive').style.display = 'block';
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

    function stopCameraOne(desative){
        if (desative === deactive) {
            document.getElementById('first').style.display = 'none';
            document.getElementById('active').style.display = 'block';
            document.getElementById('deactive').style.display = 'none';
        }
    }
    </script>

</head>
<body>
        <header class="header-cadastro">
            <img src="../assets/imagens/logo_icon.png" alt="Logo Sistema Face ID" class="header-cadastro__image">
            <h1 class="header__title">Registros</h1>
        </header>
        <main class="container" style="width: auto;">
            <section class="container__reconhecimento-facial"  style="width: 100%;">
            <div class="area">
            <img style="width: 50%;" id='logoHolder' src="../assets/imagens/logo.png" alt="Logo Sistema Face ID" class="">
                <canvas id='canvas' style="display: none;"></canvas>
                <video autoplay="true" id="first" style="height: 300px; width: 400px; display: none; background-color:black;">
                </video>
		    </div>
            <button class="reconhecimento-facial__button buttonCamera" type="button" id="active" onclick="loadCameraOne(active)">Testar</button>
            <button style="display: none" class="reconhecimento-facial__button buttonCamera" type="button" id="deactive" onclick="stopCameraOne(deactive)">Parar</button>
            </section>

        </main> 
</body>
</html>
