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

    if (isset($_SESSION['msgCadastro'])) {
        echo $_SESSION['msgCadastro'];
        unset($_SESSION['msgCadastro']);
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
    <script type="text/javascript" src="../assets/javascript/camera.js"></script>
    <link rel="stylesheet" href="../assets/css/popup.css">
    <title>Reconhecimento facial - Cadastro</title>
</head>
<body>
        <header class="header-cadastro">
            <img src="../assets/imagens/logo_icon.png" alt="Logo Sistema Face ID" class="header-cadastro__image">
            <h1 class="header__title">Registros</h1>
        </header>

        <main class="container">

            <section class="container__reconhecimento-facial">
                <img src="../assets/imagens/logo.png" alt="Tela de aguardo" class="reconhecimento-facial__wait" id="noCamera">
                <button class="reconhecimento-facial__button">Fazer Reconhecimento facial</button>
                <video id="webCamera"  style="display: none; width: 80%;"></video>
                <button class="reconhecimento-facial__button" onclick="loadCamera()" id="reconhecer">Fazer Reconhecimento facial</button>
                <button class="reconhecimento-facial__button" id="capturar" style="display: none;">Capturar de Imagem</button>
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
                    <form class="cadastro__area" action="../Controller/CadastroAlunoController.php" method="GET">
                        <div class="area__dado">
                            <label for="nome" class="dado__label">Nome</label>
                            <input type="text" name="nomeAluno" class="dado__input" placeholder="Digite seu Nome:">
                            <!--  -->
                            <?php

                                if (isset($_SESSION['msgNomeAluno'])) {
                                    echo $_SESSION['msgNomeAluno'];
                                    unset($_SESSION['msgNomeAluno']);
                                }

                            ?>
                            <!--  -->
                        </div>
                        <div class="area__dado">
                            <label for="email" class="dado__label">Email institucional</label>
                            <input type="text" name="emailAluno" class="dado__input" placeholder="Digite seu email institucional">
                            <!--  -->
                            <?php

                                if (isset($_SESSION['msgEmailAluno'])) {
                                    echo $_SESSION['msgEmailAluno'];
                                    unset($_SESSION['msgEmailAluno']);
                                }

                            ?>
                            <!--  -->
                        </div>
                        <div class="area__dado">
                            <label for="rm" class="dado__label">RM</label>
                            <input type="text" name="rmAluno" class="dado__input" placeholder="Digite seu RM">
                            <!--  -->
                            <?php

                                if (isset($_SESSION['msgRMAluno'])) {
                                    echo $_SESSION['msgRMAluno'];
                                    unset($_SESSION['msgRMAluno']);
                                }

                            ?>
                            <!--  -->
                        </div>
                        <div class="area__dado">
                            <label for="cursos" class="dado__label">Cursos</label>
                            
                            <select name="cursoAluno" id="cursos-select" class="dado__input">
                                <option value="">Selecione o Curso</option>
                                <option value="quim">Técnico em Química</option>
                                <option value="nut">Técnico em Nutrição</option>
                                <option value="ds">Técnico em Desenvolvimento de Sistemas</option>
                                <option value="adm">Técnico em Administração</option>
                                <option value="em-quim">Ensino Médio Integrada a Química</option>
                                <option value="em-nut">Ensino Médio Integrada a Nutrição</option>
                                <option value="em-adm">Ensino Médio Integrada a Administração</option>
                            </select>
                            <!--  -->
                            <?php

                                if (isset($_SESSION['msgCursoAluno'])) {
                                    echo $_SESSION['msgCursoAluno'];
                                    unset($_SESSION['msgCursoAluno']);
                                }

                            ?>
                            <!--  -->
                        </div>
                        <div class="area__dado">
                            <label for="periodoAluno" class="dado__label">Período</label>
                            <select name="periodoAluno" id="periodo-select" class="dado__input">
                                <option value="">Selecione o Período</option>
                                <option value="pr-modulo">1º Módulo - Técnico</option>
                                <option value="seg-modulo">2º Módulo - Técnico</option>
                                <option value="ter-modulo">3º Módulo - Técnico</option>
                                <option value="pr-em">1º Série - Ensino Médio</option>
                                <option value="seg-em">2º Série - Ensino Médio</option>
                                <option value="ter-em">3º Série - Ensino Médio</option>
                            </select>
                            <!--  -->
                            <?php

                                if (isset($_SESSION['msgPeriodoAluno'])) {
                                    echo $_SESSION['msgPeriodoAluno'];
                                    unset($_SESSION['msgPeriodoAluno']);
                                }

                            ?>
                            <!--  -->
                        </div>
                        <input type="submit" value="Enviar" id="enviar" >
                    </form>
                </div>

                <div id="seg" class="conteudo">

                    <!--Inicio Cadastro Funcionários-->
                    <div class="cadastro__header">
                        <h1 class="cadastro__title">Cadastrar</h1>
                        <button class="cadastro__consultar">Consultar<button>
                    </div>
                    <form class="cadastro__area"  action="../Controller/CadastroFuncionarioController.php" method="GET">
                        <div class="area__dado">
                            <label for="nome" class="dado__label">Nome</label>
                            <input type="text" name="nomeFuncionario" class="dado__input" placeholder="Digite seu Nome:">
                            <!--  -->
                            <?php

                                if (isset($_SESSION['msgNomeFuncionario'])) {
                                    echo $_SESSION['msgNomeFuncionario'];
                                    unset($_SESSION['msgNomeFuncionario']);
                                }

                            ?>
                            <!--  -->
                        </div>
                        
                        <div class="area__dado">
                            <label for="cpf" class="dado__label">CPF</label>
                            <input type="text" name="cpfFuncionario" class="dado__input" placeholder="Digite seu CPF">
                            <!--  -->
                            <?php

                                if (isset($_SESSION['msgCPFFuncionario'])) {
                                    echo $_SESSION['msgCPFFuncionario'];
                                    unset($_SESSION['msgCPFFuncionario']);
                                }

                            ?>
                            <!--  -->
                        </div>
                        <div class="area__dado">
                            <label for="funcaoFuncionario" class="dado__label">Função</label>
                            <select name="funcaoFuncionario" id="periodo-select" class="dado__input">
                                <option value="">Selecione a Função</option>
                                <option value="fun-seg">Seguranças</option>
                                <option value="fun-adm">Administração</option>
                            </select>
                            <!--  -->
                            <?php

                                if (isset($_SESSION['msgFuncaoFuncionario'])) {
                                    echo $_SESSION['msgFuncaoFuncionario'];
                                    unset($_SESSION['msgFuncaoFuncionario']);
                                }

                            ?>
                            <!--  -->
                        </div>
                        
                        <div class="area__dado">
                            <label for="tel" class="dado__label">Telefone</label>
                            <input type="text" name="telefoneFuncionario" id="telefone" class="dado__input" placeholder="Digite seu DDD + Telefone" maxlength="15">
                            <!--  -->
                            <?php

                                if (isset($_SESSION['msgTelefoneFuncionario'])) {
                                    echo $_SESSION['msgTelefoneFuncionario'];
                                    unset($_SESSION['msgTelefoneFuncionario']);
                                }

                            ?>
                            <!--  -->
                        </div>
                        <div class="area__dado">
                            <label for="mail" class="dado__label">E-mail</label>
                            <input type="text" name="emailFuncionario" class="dado__input" placeholder="Digite seu E-mail">
                            <!--  -->
                            <?php

                                if (isset($_SESSION['msgEmailFuncionario'])) {
                                    echo $_SESSION['msgEmailFuncionario'];
                                    unset($_SESSION['msgEmailFuncionario']);
                                }

                            ?>
                            <!--  -->
                        </div>
                        
                        <input type="submit" value="Enviar" id="enviar" >
                    </form>
                </div>
            </section>
            <div id="confirm">
                <div class="message" id="texto"></div>
                <button class="yes">OK</button>
            </div>
        </main> 
</body>
</html>