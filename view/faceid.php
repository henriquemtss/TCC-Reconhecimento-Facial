
    <?php
        include "../Controller/Protect.php";
        if (!isset($_SESSION)) {
            session_start();
        }
        // if(!isset($_SESSION['splash']))
        // {
        //     $_SESSION['splash'] = true;

        //     include('splash.php');
        // }
        ?>
        <?php
        $pastas = [];
        foreach (scandir("../assets/lib/face-api/labels/") as $object){
            if ($object != '.' AND $object != '..'){
                $x = 0;
                //$pastas[] = $object;
                for ($i=1; $i < 4; $i++) { 
                    if (!file_exists("../assets/lib/face-api/labels/".$object."/".$i.".jpg")) {
                        echo  "<script> alert('Arquivo Perdido! RM: ' + $object + '/' + $i + '.jpg');</script>";
                        //echo "Arquivo Perdido".$object;
                    } else if (file_exists("../assets/lib/face-api/labels/".$object."/".$i.".jpg")) {
                        $x++;
                        if ($x == 3) {
                            $pastas[] = $object;
                            $x = 0;
                        }
                    }
                }
            }
        } 
    ?>
    <script>
        //alert("Pastas Encontradas: \n" +<?php echo json_encode ($pastas); ?>);
        var pastas = <?php echo json_encode ($pastas); ?>;
        var labels = [];
        for(var i = 0; i < pastas.length; i++){
            labels[i] = pastas[i];
        }
        sessionStorage.setItem("folders", JSON.stringify(labels));
    </script>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reconhecimento Facial - FaceID</title>
    <link rel="stylesheet" href="../assets/css/corpo_faceid.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/camera.css">
    <link rel="stylesheet" href="../assets/css/article.css">
    <link rel="stylesheet" href="../assets/css/logout.css">
    <script src="../assets/javascript/sweetalert2.all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../assets/javascript/clock.js" type="text/javascript"></script>
    <script src="../assets/javascript/registrar.js" type="text/javascript"></script>
</head>
<body>
    
    <!--Cabeçalho da página-->
    <header class="header">
        <img src="../assets/imagens/logo_icon.png" alt="Logo Sistema Face ID" class="header-cadastro__image">
        <!-- Relógio -->
        <div id="clock" class="header_title">
          <h4 id="date-time"></h4>
        </div>

        <form action="../Controller/LoginController.php" method="get">
            <button name="logout" class="logout">
                <img  class="logoutIcon" src="../assets/imagens/logout.png" alt="Sair do Sistema">
            </button>   
        </form>
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
        <article class="main__cadastro" id="sumir">
            <div class="conteudo-right"></div>

                <!--<div class="profile-right"> </div>-->

                <div class="container__box">
                    <input type="text" class="box__input" name="name" placeholder="Nome:" id="nome" readonly>
                </div>
                <div class="container__box">
                    <input type="text" class="box__input" name="rm" placeholder="RM:" id="rm" readonly>
                </div>
                <div class="container__box">
                    <input type="text" class="box__input" name="rm" placeholder="RM:" id="rmMan" style="display: none">
                </div>
                <div class="container__box">
                    <input type="text" class="box__input" name="periodo" placeholder="Período:" id="periodo" readonly>
                </div>
                <div class="container__box">
                    <input type="text" class="box__input" name="curso" placeholder="Curso:" id="curso" readonly>
                </div>
                <div class="container__box">
                    <input type="text" class="box__input" name="funcao" placeholder="Função:" id="funcao" style="display: none" readonly>
                </div>
            </div>

        <div class="buttons">

            <!--a href="registro.php" target="_self">
                <button class="btn-registros">Registros</button>
            </a-->
            <a href="" style="text-decoration: none; text-align: center" class="btn-registros" onclick="window.open('registroFaceid.php','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=1350,height=630,left=150,top=20'); return false;">Registros</a>
            <!--a href="cadastro.php" target="_self">
                <button class="btn-cadastrar">Cadastrar</button>
            </a-->
            <a href="" style="text-decoration: none; text-align: center" class="btn-cadastrar" onclick="window.open('cadastro.php','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=1350,height=700,left=150,top=20'); return false;">Cadastro</a>
        </div>
        <button class="btn-cadastrar" style="width: 54%" id="manual" onclick="register()">Registro Manual</button>
        <button class="btn-cadastrar" style="width: 54%; display: none" id="sendRm" onclick="registro('sendRm')">Enviar RM</button>
        </article>
    </main>
</body>
</html>
