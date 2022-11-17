<?php
    include "../Controller/Protect.php";
    include ('../Controller/RegistroController.php');
    $registroController = new RegistroController();

    $res = $registroController -> pegarTodosRegistros();
    echo "<pre>";
    print_r($res);
    echo "<pre>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/variaveis.css">
    <link rel="stylesheet" href="assets/css/corpo.css">
    <link rel="stylesheet" href="assets/css/header-cadastro.css">
    <link rel="stylesheet" href="assets/css/historico.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="assets/fontes/PTSans-Regular.ttf">

    <title>Registro de horário</title>
</head>
<body>

    <header class="header-cadastro">
        <img src="./assets/imagens/logo_icon.png" alt="Logo Sistema Face ID" class="header-cadastro__image">
        <h1 class="header__title">Histórico</h1>
    </header>

    <main id="registroMain">
        <ol id="historico">
            <li class="registro">
                <div class="nome">Victor Laguna Rodrigues</div>
                <div class="rm">RM</div>
                <div class="periodo">Período</div>
                <div class="curso">Curso</div>
                <div class="entradaSaida">Entrada/Saída</div>
            </li>
            <li class="registro">
                <div class="nome">Henrique Gomes</div>
                <div class="rm">RM</div>
                <div class="periodo">Período</div>
                <div class="curso">Curso</div>
                <div class="entradaSaida">Entrada/Saída</div>
            </li>
            <li class="registro">
                <div class="nome">Wesley Michael Rocha da silva</div>
                <div class="rm">RM</div>
                <div class="periodo">Período</div>
                <div class="curso">Curso</div>
                <div class="entradaSaida">Entrada/Saída</div>
            </li>
            <li class="registro">
                <div class="nome">Nome</div>
                <div class="rm">RM</div>
                <div class="periodo">Período</div>
                <div class="curso">Curso</div>
                <div class="entradaSaida">Entrada/Saída</div>
            </li>
            <li class="registro">
                <div class="nome">Nome</div>
                <div class="rm">RM</div>
                <div class="periodo">Período</div>
                <div class="curso">Curso</div>
                <div class="entradaSaida">Entrada/Saída</div>
            </li>
            <li class="registro">
                <div class="nome">Nome</div>
                <div class="rm">RM</div>
                <div class="periodo">Período</div>
                <div class="curso">Curso</div>
                <div class="entradaSaida">Entrada/Saída</div>
            </li>
            <li class="registro">
                <div class="nome">Nome</div>
                <div class="rm">RM</div>
                <div class="periodo">Período</div>
                <div class="curso">Curso</div>
                <div class="entradaSaida">Entrada/Saída</div>
            </li>
            <li class="registro">
                <div class="nome">Nome</div>
                <div class="rm">RM</div>
                <div class="periodo">Período</div>
                <div class="curso">Curso</div>
                <div class="entradaSaida">Entrada/Saída</div>
            </li>
            <li class="registro">
                <div class="nome">Victor Laguna Rodrigues</div>
                <div class="rm">RM</div>
                <div class="periodo">Período</div>
                <div class="curso">Curso</div>
                <div class="entradaSaida">Entrada/Saída</div>
            </li>
            <li class="registro">
                <div class="nome">Henrique Gomes</div>
                <div class="rm">RM</div>
                <div class="periodo">Período</div>
                <div class="curso">Curso</div>
                <div class="entradaSaida">Entrada/Saída</div>
            </li>
            <li class="registro">
                <div class="nome">Wesley Michael Rocha</div>
                <div class="rm">RM</div>
                <div class="periodo">Período</div>
                <div class="curso">Curso</div>
                <div class="entradaSaida">Entrada/Saída</div>
            </li>
            <li class="registro">
                <div class="nome">Nome</div>
                <div class="rm">RM</div>
                <div class="periodo">Período</div>
                <div class="curso">Curso</div>
                <div class="entradaSaida">Entrada/Saída</div>
            </li>
            <li class="registro">
                <div class="nome">Nome</div>
                <div class="rm">RM</div>
                <div class="periodo">Período</div>
                <div class="curso">Curso</div>
                <div class="entradaSaida">Entrada/Saída</div>
            </li>


        </ol>
    </main>
    
    <a href="faceid.html" target="_self">
        <button class="voltar">
            <span id="voltarIcon" class="material-symbols-outlined">
                chevron_left
            </span>
        </button>
    </a>
</body>
</html>