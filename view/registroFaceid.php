<?php
    include "../Controller/Protect.php";
    include ('../Controller/RegistroController.php');
    $registroController = new RegistroController();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/variaveis.css">
    <link rel="stylesheet" href="../assets/css/corpo.css">
    <link rel="stylesheet" href="../assets/css/header-cadastro.css">
    <link rel="stylesheet" href="../assets/css/historico.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="../assets/fontes/PTSans-Regular.ttf">

    <title>Registro de horário</title>
</head>
<body>

    <header class="header-cadastro">
        <img src="../assets/imagens/logo_icon.png" alt="Logo Sistema Face ID" class="header-cadastro__image">
        <h1 class="header__title">Histórico</h1>
    </header>

    <main id="registroMain">
        
        <ol id="historico">
            <?php
                $registroController ->lista();
            ?>

        </ol>
    </main>
</body>
</html>