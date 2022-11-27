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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="../assets/css/corpo.css">
    <link rel="stylesheet" href="../assets/css/variaveis.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/consulta.css">
    <title>FaceID - Consulta</title>
</head>
<body>
    <!--Cabeçalho da página-->
    <header class="header">
        <img src="../assets/imagens/logo_icon.png" alt="Logo Sistema Face ID" class="header-cadastro__image">
    </header>

    <main class="consulta">
        <h1 class="consulta__titulo">Consulte</h1>
        <div class="consulta__container">
            <input type="search" name="pesquisa" id="consulta__pesquisa" placeholder="Digite o RM" required>
            <button class="consulta__botao">Pesquisar</button>
        </div>
        
        <table class="consulta__resultado">
            <tr class="resultado__campos">
                <th class="campos">Nome</th>
                <th class="campos">Curso</th>
                <th class="campos">Status</th>
            </tr>
            <tr class="resultado__puxado">
                <td class="puxado__nome"></td>
                <td class="puxado__curso"></td>
                <td class="puxado__status"></td>
            </tr>
        </table>

        <a href="cadastro.php" target="_self">
        <button class="voltar">
            <span id="voltarIcon" class="material-symbols-outlined">
                chevron_left
            </span>
        </button>
    </a>
    </main>
</body>
</html>