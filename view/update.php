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
<head id="B">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/corpo.css">
    <link rel="stylesheet" href="../assets/css/variaveis.css">
    <link rel="stylesheet" href="../assets/css/header-cadastro.css">
    <link rel="stylesheet" href="../assets/css/cadastro.css">
    <link rel="stylesheet" href="../assets/css/splash.css">
    <link rel="stylesheet" href="../assets/css/tab_cadastro.css">
    <script src="../assets/javascript/tab.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/javascript/camera.js"></script>
    <link rel="stylesheet" href="../assets/css/popup.css">
    <title>Reconhecimento facial - Atualização de Foto</title>
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
                <form target="POST" method="save_photos.php">
                    <textarea  type="text" id="base_img" name="base_img" style="display: none;"></textarea>
                    <button class="reconhecimento-facial__button buttonCamera" type="button" id="active" onclick="loadCameraOne(active)">Primeira Foto</button>
                    <button style="display: none;" class="reconhecimento-facial__button buttonCamera" type="button" id="take" onclick="takeSnapShot(take)">Tirar foto</button>
                    <button style="width: 30%; background-color: #3D4B56; padding-top: 5px; display: none; margin-left: 20%; left: 3.4rem;" class="reconhecimento-facial__button buttonCamera" type="button" id="save" onclick="saveSnapShot(save, 'B')"> salvar</button>
                    <button style="width: 30%; background-color: #3D4B56; padding-top: 5px; display: none; margin-left: 22%;" class="reconhecimento-facial__button buttonCamera" type="button" id="again" onclick="retakeSnapShot(again)"> Cancelar</button>
                </form>
    
            <canvas id='canvas2' style="display: none;"></canvas>
                <video autoplay="true" id="second" style="height: 300px; width: 400px; display: none; background-color:black;">
                </video>
                <form target="POST" method="save_photos.php">
                    <textarea  type="text" id="base_img" name="base_img" style="display: none;"></textarea>
                    <button style="display: none;" class="reconhecimento-facial__button buttonCamera" type="button" id="active2" onclick="loadCameraOne(active2)">Segunda Foto</button>
                    <button style="display: none;" class="reconhecimento-facial__button buttonCamera" type="button" id="take2" onclick="takeSnapShot(take2)">Tirar foto</button>
                    <button style="width: 30%; background-color: #3D4B56; padding-top: 5px; display: none; margin-left: 20%; left: 3.4rem;" class="reconhecimento-facial__button buttonCamera" type="button" id="save2" onclick="saveSnapShot(save2, 'B')"> salvar</button>
                    <button style="width: 30%; background-color: #3D4B56; padding-top: 5px; display: none; margin-left: 22%;" class="reconhecimento-facial__button buttonCamera" type="button" id="again2" onclick="retakeSnapShot(again2)"> Cancelar</button>
                </form>
    
            <canvas id='canvas3' style="display: none;"></canvas>
                <video autoplay="true" id="third" style="height: 300px; width: 400px; display: none; background-color:black;">
                </video>
                <form target="POST" method="save_photos.php">
                    <textarea  type="text" id="base_img" name="base_img" style="display: none;"></textarea>
                    <button style="display: none;" class="reconhecimento-facial__button buttonCamera" type="button" id="active3" onclick="loadCameraOne(active3)">Terceira Foto</button>
                    <button style="display: none;" class="reconhecimento-facial__button buttonCamera" type="button" id="take3" onclick="takeSnapShot(take3)">Tirar foto</button>
                    <button style="width: 30%; background-color: #3D4B56; padding-top: 5px; display: none; margin-left: 20%; left: 3.4rem;" class="reconhecimento-facial__button buttonCamera" type="button" id="save3" onclick="saveSnapShot(save3, 'B')"> salvar</button>
                    <button style="width: 30%; background-color: #3D4B56; padding-top: 5px; display: none; margin-left: 22%;" class="reconhecimento-facial__button buttonCamera" type="button" id="again3" onclick="retakeSnapShot(again3)"> Cancelar</button>
                </form>
			<!--Scripts-->
			<script src="../assets/javascript/takeFoto.js"></script>
		    </div>
            </section>

        </main> 
        <script src="../assets/javascript/popup.js"></script>
        <script type="module" src="../assets/javascript/cadastro.js"></script>
</body>
</html>
