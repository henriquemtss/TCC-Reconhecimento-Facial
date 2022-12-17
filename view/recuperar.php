<?php
    include('../Model/DAO/Conexao.php');
    include('../assets/lib/PHPMailer/conexaoEmail.php');
    $pdo = conectar();

    if(isset($_POST['enviarSenha'])){
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
                if (isset($_POST['novaSenha']) ) {
                    $novaSenha = password_hash($_POST['novaSenha'], PASSWORD_DEFAULT);
    
                    $atualizar = $pdo->query("UPDATE Contas set senha = '$novaSenha' where email = '$emailCriptografado' ;");
                    if ($atualizar->execute()) {
                        enviarEmail("testandoophpmaile@gmail.com", "Senha modificada!", "Senha modificada com sucesso!");
                        $pdo->query("DELETE from codigolink where codigo = '$codigo';");
                        echo "Senha modificada!";
                        header("Location: ../index.php");
                    }
                }
    }
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

    <title>Reconhecimento facial - recuperação Senha</title>
</head>

<body>
    
    <main>
    <img src="../assets/imagens/logo.png" alt="" srcset="">
        <div class="container">
        <h1>Digite a sua nova senha</h1>
        <span class="mensagem"></span>
        
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="animation">
                <input type="password" class="inputSenha first" placeholder="Nova senha:">
            </div>

            <div class="animation">
                <input type="password" name="novaSenha" class="inputSenha second" placeholder="Digite a nova senha novamente:">
            </div>

            <input type="submit" name="enviarSenha" value="Enviar" class="enviar">
        </form>

        </div>
        
        <script src="../assets/javascript/recuperacaoVerificacao.js"></script>
    </main>
</body>

</html>
