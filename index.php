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

    <h1 class="titulo">Login Admin</h1>
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
                    <label for="usuario">Nome:</label>
                    <input class="box__input input" type="text" name="usuario">
                    <spam class="mensagem">Por favor preencha o campo!</spam>
                </div>
                <div class="container__box">
                    <label for="password">Senha:</label>
                    <input class="box__input input" type="password" name="password">
                    <spam class="mensagem">Por favor preencha o campo!</spam>
                </div>

            </div>
            <div class="main-login__buttons">
                <button id="esqueci-senha">Esqueci minha senha</button>
                <button id="entrar">Entrar</button>
            </div>

        </main>

    </form>

    <script  type="module" src="assets/javascript/login.js"></script>
</body>
</html>