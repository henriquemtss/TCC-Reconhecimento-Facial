<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/variaveis.css">
    <link rel="stylesheet" href="../assets/css/corpo.css">
    <link rel="stylesheet" href="../assets/css/recuperacao.css">
    <link rel="stylesheet" href="../assets/css/logout.css">
    <script src="../assets/javascript/emailRec.js"></script>
    <title>Reconhecimento facial - Recuperação de E-mail </title>
</head>

<body>
    
    <header>
    <form action="../Controller/LoginController.php" method="get">
            <button name="logout" class="logout">
                <img  class="logoutIcon" src="../assets/imagens/logout.png" alt="Sair do Sistema">
            </button>   
        </form>
    </header>
    <main>
    <img src="../assets/imagens/logo.png" alt="" srcset="">
        <div class="container">
        <h1>Digite um E-mail para recuperação</h1>

        <form action="../Controller/LoginController.php" method="get">
            <div class="animation">
                <input type="text" name="emailRecuperacao" class="inputEmail" id="emailRecuperar">
            </div>
            
            <input style="display: none"  type="submit" name="enviarEmail" value="Enviar" class="enviar" id="envEmail">
            
        </form>
            <button id="eRec" type="submit" name="enviarEmail" class="enviar" onclick="emailVer()">Confirmar</button>
            <span style="width: 100%; height: 10px;" class="mensagem" id = "mail3" value=empty></span>
        </div>
        
    </main>

</body>

</html>