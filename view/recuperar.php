<?php
    include('../Model/DAO/Conexao.php');
    include('../assets/lib/PHPMailer/conexaoEmail.php');
    $pdo = conectar();

    if (isset($_GET['linkCodigo'])) {
        $codigo = $_GET['linkCodigo'];
        //descriptografaremail

        $res = $pdo->query("SELECT * from codigolink where codigo = '$codigo' AND data > Now();");
        $resul = $res->fetch(PDO::FETCH_ASSOC);
        if (!empty($resul)) {
            $emailCriptografado = base64_decode($resul['emailCriptografado']);
        }
        

        if (isset($resul['codigo'])) {
            //
            if (isset($_POST['acao']) && $_POST['acao'] == "mudar") {
                $novaSenha = password_hash($_POST['novaSenha'], PASSWORD_DEFAULT);

                $atualizar = $pdo->query("UPDATE Contas set senha = '$novaSenha' where email = '$emailCriptografado' ;");
                if ($atualizar) {
                    enviarEmail("testandoophpmaile@gmail.com", "Senha modificada!", "Senha modificada com sucesso!");
                    $pdo->query("DELETE from codigolink where codigo = '$codigo';");
                    echo "Senha modificada!";
                    header("Location: ../index.php");
                }
            }

?>

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
        <h1>Digite A sua Nova Senha!</h1>
        <form action="../Controller/LoginController.php" method="get">
            <div class="animation">
                <input type="text" name="emailRecuperacao" class="inputSenha" placeholder="Nova senha:">
            </div>

            <div class="animation">
                <input type="text" name="emailRecuperacao" class="inputSenha" placeholder="Digite a nova senha novamente:">
            </div>

            <input type="submit" name="enviarEmail" value="Enviar" class="enviar" >
        </form>
        </div>
        
    </main>


    <script src="../assets/javascript/recuperacaoVerificacao.js"></script>
</body>


<?PHP
}else {
    echo "<h1>\"Link Expirado\"</h1>";
}
}

?>