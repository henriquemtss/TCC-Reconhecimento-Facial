<?php
    include "../Controller/Protect.php";

    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
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
    <link rel="stylesheet" href="../assets/css/splash.css">
    <link rel="stylesheet" href="../assets/css/tab_cadastro.css">
    <script src="../assets/javascript/tab.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/javascript/popup.js"></script>
    <link rel="stylesheet" href="../assets/css/popup.css">
    <title>Reconhecimento facial - Cadastro</title>
</head>
<body>
    <div class="splash">
        <div class="intro">
            <img src="../assets/imagens/logo.png" style="width: 35%;" alt="Etec logo">
            <h1 class="logo">
                <span class="logo-parts">I</span>
                <span class="logo-parts">N</span>
                <span class="logo-parts">I</span>
                <span class="logo-parts">C</span>
                <span class="logo-parts">I</span>
                <span class="logo-parts">A</span>
                <span class="logo-parts">N</span>
                <span class="logo-parts">D</span>
                <span class="logo-parts">O</span>
            </h1>
        </div>
    </div>

        <header class="header-cadastro">
            <img src="../assets/imagens/logo_icon.png" alt="Logo Sistema Face ID" class="header-cadastro__image">
            <h1 class="header__title">Registros</h1>
        </header>

        <main class="container">
            <section class="container__reconhecimento-facial">
                <img src="./assets/imagens/logo.png" alt="Tela de aguardo" class="reconhecimento-facial__wait">
                <button class="reconhecimento-facial__button">Fazer Reconhecimento facial</button>
            </section>

            <section class="container__cadastro">

                <!--Inicio Nav Tab-->
                <div class="tab">
                    <button id="tabpadrao" class="tab-button" onclick="abrirTab(event, 'aluno')">Alunos</button>
		            <button  class="tab-button" onclick="abrirTab(event, 'seg')">Funcionários</button>
		            
                </div>

                <!--Inicio Cadastro Alunos-->

                <div id="aluno" class="conteudo">
                    <div class="cadastro__header">
                        <h1 class="cadastro__title">Cadastrar</h1>
                        <button class="cadastro__consultar">Consultar<button>
                    </div>
                    <form class="cadastro__area" action="../Controller/CadastroController.php" method="GET">
                        <div class="area__dado">
                            <label for="nome" class="dado__label">Nome</label>
                            <input type="text" name="nome" class="dado__input" placeholder="Digite seu Nome:">
                            <?php

                                if (isset($_SESSION['msgNome'])) {
                                    echo $_SESSION['msgNome'];
                                    unset($_SESSION['msgNome']);
                                }

                            ?>
                        </div>
                        <div class="area__dado">
                            <label for="email" class="dado__label">Email institucional</label>
                            <input type="text" name="email" class="dado__input" placeholder="Digite seu email institucional">
                            <?php

                                if (isset($_SESSION['msgEmail'])) {
                                    echo $_SESSION['msgEmail'];
                                    unset($_SESSION['msgEmail']);
                                }

                            ?>
                        </div>
                        <div class="area__dado">
                            <label for="rm" class="dado__label">RM</label>
                            <input type="text" name="rm" class="dado__input" placeholder="Digite seu RM">
                            <?php

                                if (isset($_SESSION['msgRM'])) {
                                    echo $_SESSION['msgRM'];
                                    unset($_SESSION['msgRM']);
                                }

                            ?>
                        </div>
                        <div class="area__dado">
                            <label for="cursos" class="dado__label">Cursos</label>
                            
                            <select name="curso" id="cursos-select" class="dado__input">
                                <option value="">Selecione o Curso</option>
                                <option value="quim">Técnico em Química</option>
                                <option value="nut">Técnico em Nutrição</option>
                                <option value="ds">Técnico em Desenvolvimento de Sistemas</option>
                                <option value="adm">Técnico em Administração</option>
                                <option value="em-quim">Ensino Médio Integrada a Química</option>
                                <option value="em-nut">Ensino Médio Integrada a Nutrição</option>
                                <option value="em-adm">Ensino Médio Integrada a Administração</option>
                            </select>
                            <?php

                                if (isset($_SESSION['msgCurso'])) {
                                    echo $_SESSION['msgCurso'];
                                    unset($_SESSION['msgCurso']);
                                }

                            ?>
                        </div>
                        <div class="area__dado">
                            <label for="periodo" class="dado__label">Período</label>
                            <select name="periodo" id="periodo-select" class="dado__input">
                                <option value="">Selecione o Período</option>
                                <option value="pr-modulo">1º Módulo - Técnico</option>
                                <option value="seg-modulo">2º Módulo - Técnico</option>
                                <option value="ter-modulo">3º Módulo - Técnico</option>
                                <option value="pr-em">1º Série - Ensino Médio</option>
                                <option value="seg-em">2º Série - Ensino Médio</option>
                                <option value="ter-em">3º Série - Ensino Médio</option>
                            </select>
                            <?php

                                if (isset($_SESSION['msgPeriodo'])) {
                                    echo $_SESSION['msgPeriodo'];
                                    unset($_SESSION['msgPeriodo']);
                                }

                            ?>
                        </div>
                        
                    <input type="submit" value="Enviar" id="enviar" > <!-- onclick="functionAlert();"-->
                    </form>
                </div>

                <div id="seg" class="conteudo">

                    <!--Inicio Cadastro Funcionários-->
                    <div class="cadastro__header">
                        <h1 class="cadastro__title">Cadastrar</h1>
                        <button class="cadastro__consultar">Consultar<button>
                    </div>
                    <form class="cadastro__area"  action="../Controller/CadastroController.php" method="GET">
                        <div class="area__dado">
                            <label for="nome" class="dado__label">Nome</label>
                            <input type="text" name="nome" class="dado__input" placeholder="Digite seu Nome:">
                        </div>
                        
                        <div class="area__dado">
                            <label for="cpf" class="dado__label">CPF</label>
                            <input type="text" name="cpf" class="dado__input" placeholder="Digite seu CPF">
                        </div>
                        <div class="area__dado">
                            <label for="periodo" class="dado__label">Função</label>
                            <select name="cursos" id="periodo-select" class="dado__input">
                                <option value="">Selecione a Função</option>
                                <option value="fun-seg">Seguranças</option>
                                <option value="fun-adm">Administração</option>
                            </select>
                        </div>
                        
                    <input type="submit" value="Enviar" id="enviar" > <!--onclick="functionAlert();"-->
                    </form>
                </div>
            </section>
            <!-- <div id="confirm">
                <div class="message" id="texto"></div>
                <button class="yes">OK</button>
            </div>             -->
        </main> 
    <script src="../assets/javascript/splash.js"></script>
</body>
</html>