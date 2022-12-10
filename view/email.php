<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/variaveis.css">
    <link rel="stylesheet" href="../assets/css/corpo.css">
    <link rel="stylesheet" href="../assets/css/recuperacao.css">

    <title>E-mail de recuperação</title>
</head>

<body>
    
    <main>
    <img src="../assets/imagens/logo.png" alt="" srcset="">
        <div class="container">
        <h1>Digite um E-mail de recuperação</h1>

        <form action="../Controller/LoginController.php" method="get">
            <div class="animation">
                <input type="text" name="emailRecuperacao" class="inputEmail">
            </div>

            <input type="submit" name="enviarEmail" value="Enviar" class="enviar">
        </form>
        </div>
        
    </main>

</body>

</html>