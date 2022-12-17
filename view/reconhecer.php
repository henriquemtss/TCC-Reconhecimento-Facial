
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
        alert("Pastas Encontradas: \n" +<?php echo json_encode ($pastas); ?>);
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
    <title>Reconhecimento Facial - Reconhecer</title>
    <link rel="stylesheet" href="../assets/css/corpo_faceid.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/camera.css">
    <link rel="stylesheet" href="../assets/css/article.css">
    <script src="../assets/javascript/registrar.js" type="text/javascript"></script>
</head>
<body>
    
    <!--Cabeçalho da página-->
    <header class="header">
        <img src="../assets/imagens/logo_icon.png" alt="Logo Sistema Face ID" class="header-cadastro__image">
    </header>

    <!--Conteúdo principal-->
    <main>
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
    </main>
</body>
</html>
