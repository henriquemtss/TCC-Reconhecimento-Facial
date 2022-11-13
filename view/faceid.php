
    <?php
    include "../Controller/Protect.php";

    ?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reconhecimento Facial</title>
    <link rel="stylesheet" href="../assets/css/corpo_faceid.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/camera.css">
    <link rel="stylesheet" href="../assets/css/article.css">
    <script src="../assets/javascript/clock.js" type="text/javascript"></script>
</head>
<body>
    <!--Cabeçalho da página-->
    <header class="header">
        <img src="../assets/imagens/logo_icon.png" alt="Logo Sistema Face ID" class="header-cadastro__image">
        <!-- Relógio -->
        <div id="clock" class="header_title">
          <h4 id="date-time"></h4>
        </div>
    </header>

    <!--Conteúdo principal-->
    <main>
        <!--Tag aside para definir o lado da página onde ficará a câmera-->
        <aside class="main__camera">
            <div class="area">
                <video 
                    autoplay
                    id="cam"
                    width="480"
                    height="320"   
                    muted      
                        ></video>
                        <script src="../assets/lib/face-api/face-api.min.js"></script>
                        <script src="../assets/javascript/api.js"></script>
            </div>
        </aside>

        <!--Tag semântica para definir o conteúdo independente do outro lado onde ficará as infos do aluno-->
        <article class="main__cadastro">
            <div class="conteudo-right"></div>

                <!--<div class="profile-right"> </div>-->

                <div class="container__box">
                    <input type="text" class="box__input" name="name" placeholder="Nome:">
                </div>
                <div class="container__box">
                    <input type="text" class="box__input" name="rm" placeholder="RM:">
                </div>
                <div class="container__box">
                    <input type="text" class="box__input" name="periodo" placeholder="Período:">
                </div>
                <div class="container__box">
                    <input type="text" class="box__input" name="curso" placeholder="Curso:">

            </div>

        <div class="button">

            <a href="registro.html" target="_self">
                <button class="btn-registros">Registros</button>
            </a>
            <a href="cadastro.html" target="_self">
                <button class="btn-cadastrar">Cadastrar</button>
            </a>
        </div>
        
        </article>

    </main>

</body>
</html>