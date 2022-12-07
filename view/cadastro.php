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

    // if (isset($_SESSION['msgCadastro'])) {
    //     echo $_SESSION['msgCadastro'];
    //     unset($_SESSION['msgCadastro']);
    // }
        

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
    <script src="../assets/javascript/tab.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/javascript/camera.js"></script>
    <script type="text/javascript" src="../assets/javascript/popup.js"></script>
    <link rel="stylesheet" href="../assets/css/popup.css">
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
            <h1 class="header__title">Registros</h1>
        </header>

        <main class="container">

            <section class="container__cadastro">

                <!--Inicio Nav Tab-->
                <div class="tab">
                    <button id="tabpadrao" class="tab-button" onclick="abrirTab(event, 'aluno')">Alunos</button>
		            <button id="Other"  class="tab-button" onclick="abrirTab(event, 'seg')">Funcionários</button>
		            
                </div>

                <!--Inicio Cadastro Alunos-->

                <div id="aluno" class="conteudo">
                    <div class="cadastro__header">
                        <h1 class="cadastro__title">Cadastrar</h1>
                        <a href="consulta.php" class="cadastro__consultar">Consultar</a>
                    </div>
                    <form class="cadastro__area alunoForm" action="../Controller/CadastroAlunoController.php" method="GET">
                        <div class="area__dado">
                            <label for="nome" class="dado__label">Nome</label>
                            <input type="text" name="nomeAluno" class="inputAluno dado__input" placeholder="Digite seu Nome" id ="nomeAluno">
                            <span class="mensagem">Preencha o campo</span>
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
                            <input type="text" name="emailAluno" class="inputAluno dado__input" placeholder="Digite seu email institucional" id ="emailAluno">
                            <span class="mensagem">Preencha o campo</span>
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
                            <input type="text" name="rmAluno" class="inputAluno dado__input" placeholder="Digite seu RM" id="rmAluno">
                            <span class="mensagem">Preencha o campo</span>
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
                            
                            <select name="cursoAluno" id="cursos-select" class="inputAluno dado__input">
                                
                                <option value="">Selecione o Curso</option>
                                <option value="Técnico em Química">Técnico em Química</option>
                                <option value="Técnico em Nutrição">Técnico em Nutrição</option>
                                <option value="Técnico em Desenvolvimento de Sistemas">Técnico em Desenvolvimento de Sistemas</option>
                                <option value="Técnico em Administração">Técnico em Administração</option>
                                <option value="Ensino Médio Integrada a Química">Ensino Médio Integrada a Química</option>
                                <option value="Ensino Médio Integrada a Nutrição">Ensino Médio Integrada a Nutrição</option>
                                <option value="Ensino Médio Integrada a Administração">Ensino Médio Integrada a Administração</option>
                            </select>
                            <span class="mensagem">Preencha o campo</span>
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
                            <select name="periodoAluno" id="periodo-select" class="inputAluno dado__input">
                                <option value="">Selecione o Período</option>
                                <option value="1º Módulo - Técnico">1º Módulo - Técnico</option>
                                <option value="2º Módulo - Técnico">2º Módulo - Técnico</option>
                                <option value="3º Módulo - Técnico">3º Módulo - Técnico</option>
                                <option value="1º Série - Ensino Médio">1º Série - Ensino Médio</option>
                                <option value="2º Série - Ensino Médio">2º Série - Ensino Médio</option>
                                <option value="3º Série - Ensino Médio">3º Série - Ensino Médio</option>
                            </select>
                            <span class="mensagem">Preencha o campo</span>
                            <!--  -->
                            <?php

                                if (isset($_SESSION['msgPeriodoAluno'])) {
                                    echo $_SESSION['msgPeriodoAluno'];
                                    unset($_SESSION['msgPeriodoAluno']);
                                }

                            ?>
                            <!--  -->
                        </div>
                        
                        <button class="reconhecimento-facial__button" type="button" id="recognize" onclick="reconhecer()" style="background-color: #F93535; color-contrast(3.72); margin-left: 10%">FAZER RECONHECIMENTO FACIAL</button>
                        <input type="submit" value="Enviar" id="enviar" class="enviarAluno" style="display: none">
                    </form>
                </div>

                <div id="seg" class="conteudo">

                    <!--Inicio Cadastro Funcionários-->
                    <div class="cadastro__header">
                        <h1 class="cadastro__title">Cadastrar</h1>
                        <a href="consulta.php" class="cadastro__consultar">Consultar</a>
                    </div>
                    <form class="cadastro__area funcionarioForm"  action="../Controller/CadastroFuncionarioController.php" method="GET">
                        <div class="area__dado">
                            <label for="nome" class="dado__label">Nome</label>
                            <input type="text" name="nomeFuncionario" class="inputFuncionario dado__input" placeholder="Digite seu Nome:" id="nomeSeg">
                            <span class="mensagem">Preencha o campo</span>
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
                            <input type="text" name="cpfFuncionario" class="inputFuncionario dado__input" placeholder="Digite seu CPF" id="cpfSeg">
                            <span class="mensagem">Preencha o campo</span>
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
                            <select name="funcaoFuncionario" id="funcao" class="inputFuncionario dado__input">
                                <option value="">Selecione a Função</option>
                                <option value="Seguranças">Seguranças</option>
                                <option value="Administração">Administração</option>
                            </select>
                            <span class="mensagem">Preencha o campo</span>
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
                            <input type="text" name="telefoneFuncionario" id="telFunc" class="inputFuncionario dado__input" placeholder="Digite seu DDD + Telefone" maxlength="15">
                            <span class="mensagem">Preencha o campo</span>
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
                            <input type="text" name="emailFuncionario" class="inputFuncionario dado__input" placeholder="Digite seu E-mail" id="emailFuncionario">
                            <span class="mensagem">Preencha o campo</span>
                            <!--  -->
                            <?php

                                if (isset($_SESSION['msgEmailFuncionario'])) {
                                    echo $_SESSION['msgEmailFuncionario'];
                                    unset($_SESSION['msgEmailFuncionario']);
                                }

                            ?>
                            <!--  -->
                        </div>
                        <button class="reconhecimento-facial__button" type="button" id="recognize2" onclick="reconhecer()" style="background-color: #F93535; color-contrast(3.72); margin-left: 10%">FAZER RECONHECIMENTO FACIAL</button>
                        <input type="submit" value="Enviar" id="enviar2" class="enviarFuncionario" style="display: none">
                    </form>
                </div>
            </section>

            <section class="container__reconhecimento-facial">
            <div class="area">
            <img style="width: 50%; margin-left: 25%" id='logoHolder' src="../assets/imagens/logo.png" alt="Logo Sistema Face ID" class="">
                <canvas id='canvas' style="display: none; margin-left: 8%"></canvas>
                <video autoplay="true" id="first" style="height: 300px; width: 400px; display: none; background-color:black; margin-left: 8%">
                </video>
                <form target="POST" method="save_photos.php">
                    <textarea  type="text" id="base_img" name="base_img" style="display: none;"></textarea>
                    
                    <button style="display: none;" class="reconhecimento-facial__button" type="button" id="active" onclick="loadCameraOne(active)">Primeira Foto</button>
                    <button style="display: none;" class="reconhecimento-facial__button" type="button" id="take" onclick="takeSnapShot(take)">Tirar foto</button>
                    <button style="width: 30%; background-color: #3D4B56; padding-top: 5px; display: none; margin-left: 2%; left: 3.4rem;" class="reconhecimento-facial__button" type="button" id="save" onclick="saveSnapShot(save, A)"> salvar</button>
                    <button style="width: 30%; background-color: #3D4B56; padding-top: 5px; display: none; margin-left: 35%;" class="reconhecimento-facial__button" type="button" id="again" onclick="retakeSnapShot(again)"> Cancelar</button>
                </form>
    
            <canvas id='canvas2' style="display: none; margin-left: 8%"></canvas>
                <video autoplay="true" id="second" style="height: 300px; width: 400px; display: none; background-color:black; margin-left: 8%">
                </video>
                <form target="POST" method="save_photos.php">
                    <textarea  type="text" id="base_img" name="base_img" style="display: none;"></textarea>
                    <button style="display: none;" class="reconhecimento-facial__button" type="button" id="active2" onclick="loadCameraOne(active2)">Segunda Foto</button>
                    <button style="display: none;" class="reconhecimento-facial__button" type="button" id="take2" onclick="takeSnapShot(take2)">Tirar foto</button>
                    <button style="width: 30%; background-color: #3D4B56; padding-top: 5px; display: none; margin-left: 2%; left: 3.4rem;" class="reconhecimento-facial__button" type="button" id="save2" onclick="saveSnapShot(save2, A)"> salvar</button>
                    <button style="width: 30%; background-color: #3D4B56; padding-top: 5px; display: none; margin-left: 35%;" class="reconhecimento-facial__button" type="button" id="again2" onclick="retakeSnapShot(again2)"> Cancelar</button>
                </form>
    
            <canvas id='canvas3' style="display: none; margin-left: 8%"></canvas>
                <video autoplay="true" id="third" style="height: 300px; width: 400px; display: none; background-color:black; margin-left: 8%">
                </video>
                <form target="POST" method="save_photos.php">
                    <textarea  type="text" id="base_img" name="base_img" style="display: none;"></textarea>
                    <button style="display: none;" class="reconhecimento-facial__button" type="button" id="active3" onclick="loadCameraOne(active3)">Terceira Foto</button>
                    <button style="display: none;" class="reconhecimento-facial__button" type="button" id="take3" onclick="takeSnapShot(take3)">Tirar foto</button>
                    <button style="width: 30%; background-color: #3D4B56; padding-top: 5px; display: none; margin-left: 2%; left: 3.4rem;" class="reconhecimento-facial__button" type="button" id="save3" onclick="saveSnapShot(save3, A)"> salvar</button>
                    <button style="width: 30%; background-color: #3D4B56; padding-top: 5px; display: none; margin-left: 35%;" class="reconhecimento-facial__button" type="button" id="again3" onclick="retakeSnapShot(again3)"> Cancelar</button>
                </form>
			<!--Scripts-->
			<script src="../assets/javascript/takeFoto.js"></script>
		    </div>
            </section>

        </main> 
        <script type="module" src="../assets/javascript/cadastro.js"></script>
</body>
</html>