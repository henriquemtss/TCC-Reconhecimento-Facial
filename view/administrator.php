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
<head id="A">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/corpo.css">
    <link rel="stylesheet" href="../assets/css/variaveis.css">
    <link rel="stylesheet" href="../assets/css/header-cadastro.css">
    <link rel="stylesheet" href="../assets/css/cadastro.css">
    <link rel="stylesheet" href="../assets/css/splash.css">
    <link rel="stylesheet" href="../assets/css/tab_cadastro.css">
    <link rel="stylesheet" href="../assets/css/logout.css">
    <title>Reconhecimento facial - Cadastro</title>
</head>
<body>
        <?php
            if (isset($_SESSION['msgCadastro'])) {
                echo '<div id="confirm">
                <div class="message" id="texto">' . $_SESSION['msgCadastro'] . '</div>
                    <button class="yes">OK</button>
                </div>';
                unset($_SESSION['msgCadastro']);
            }
            
        ?>

        <header class="header-cadastro">
            <img src="../assets/imagens/logo_icon.png" alt="Logo Sistema Face ID" class="header-cadastro__image">
            <h1 class="header__title">Teste de Funcionalidades</h1>

                <button name="logout" class="logout">
                    <img  class="logoutIcon" src="../assets/imagens/logout.png" alt="Sair do Sistema">
                </button>
        </header>

        <main class="container">

            <section class="container__cadastro">
            <h1 class="header__title" style="margin-top: 5%;" >Conexão</h1>
            <a href="cadastro.php" style="margin-top: 10%; margin-right: 12%; width: 60%; text-align: center" class="cadastro__consultar">Tela de Cadastro</a>
            <a href="fadceid.php" style="margin-top: 20%; margin-right: 12%; width: 60%; text-align: center" class="cadastro__consultar">Reconhecimento Facil</a>
            <a href="Consulta.php" style="margin-top: 30%; margin-right: 12%; width: 60%; text-align: center" class="cadastro__consultar">Consulta</a>
            <a href="registro.php" style="margin-top: 40%; margin-right: 12%; width: 60%; text-align: center" class="cadastro__consultar">Registro</a>
            <h1 class="header__title" style="margin-top: 50%;">Hardware</h1>
            <button style="margin-bottom: 10%" class="reconhecimento-facial__button" type="button" id="recognize">Teste Camera</button>
            <button style="background-color: black" class="reconhecimento-facial__button" type="button" id="recognize">Solicitar Suporte</button>
            </section>
            <section class="container__reconhecimento-facial">
            <div class="area">
            <img style="width: 50%;" id='logoHolder' src="../assets/imagens/logo.png" alt="Logo Sistema Face ID" class="">
		    </div>
            </section>

        </main> 
</body>
</html>
