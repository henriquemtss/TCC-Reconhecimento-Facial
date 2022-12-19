<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>

<!--  -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/corpo.css">
    <link rel="stylesheet" href="assets/css/variaveis.css">
    <link rel="stylesheet" href="assets/css/header-login.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/variaveis.css">

    <title>Reconhecimento facial - Login</title>
</head>
<body>
    <header class="header-login">
        <img src="assets/imagens/logo.png" alt="Logo Sistema Face ID" class="header-login__image">
    </header>

    <h1 class="titulo">Login</h1>
    <?php

        if (isset($_SESSION['msgLogin'])) {
            echo '<spam class = "erroMsg">' . $_SESSION['msgLogin'] . '</spam>';
            unset($_SESSION['msgLogin']);
        }

        ?> 
    <form action="Controller/LoginController.php" method="get">
        <main class="main-login">
            <div class="main-login__container">
                <div class="container__box">
                    <label for="usuario"></label>
                    <input placeholder="Digite o Usuário" class="box__input input" type="text" name="usuario" autofocus>
                    <spam class="mensagem">Por favor preencha o campo!</spam>
                </div>
                <div class="container__box">
                    <label for="password"></label>
                    <input placeholder="Digite a Senha" class="box__input input" type="password" name="password">
                    <spam class="mensagem">Por favor preencha o campo!</spam>
                </div>

            </div>
            <div class="main-login__buttons">
                <button id="entrar" name="entrar">Entrar</button>
                <button id="esqueci-senha" name="esqueciMinhaSenha">Esqueci minha senha</button>
            </div>

        </main>

    </form>

    <script  type="module" src="assets/javascript/login.js"></script>
    <!-- botão flutuante whatsapp -->

    <a href="assets/manual/manual_user.pdf" class="manual" target="_blank" style="position: fixed;  right: 15px; bottom: 25px;">
    <img src="assets/imagens/ponto-de-interrogacao.png" alt="botão manual">
    </a>

    <a href="https://api.whatsapp.com/send?phone=51000000000&text=olá" class="whatsapp-button" target="_blank" style="position: fixed;  right: 15px; bottom: 90px;">
    <img src="https://i.ibb.co/VgSspjY/whatsapp-button.png" alt="botão whatsapp">
    </a>

    
</body>
</html>