<?php
    include_once('../model/contas.php');
    include('../assets/lib/PHPMailer/conexaoEmail.php');

    if (!isset($_SESSION)) {
        session_start();
    }
    //botao login
    if (isset($_GET['entrar'])) {
        unset($_GET['entrar']);
        $conta =  new Contas($_GET['usuario'], $_GET['password']);
        $conta->logar();
    }
    //botao Esqueci Minha Senha
    if (isset($_GET['esqueciMinhaSenha'])) {
        unset($_GET['esqueciMinhaSenha']);
        header("Location: ../View/email.php");
    }
    //botao que envia email de recuperação
    if (isset($_GET['enviarEmail'])) {
        unset($_GET['enviarEmail']);
        enviaLinkEmail($_GET['emailRecuperacao']);
        
    }
    
    


        function enviaLinkEmail($email){
            $pdo = conectar();
            $sql = "Select email from CadastroFuncionario where email=:email limit 1";
            $res = $pdo->prepare($sql);
            $res->bindValue(':email', $email);
            $resul = $res->execute();
            if (!empty($resul)) {
            date_default_timezone_set("America/Sao_Paulo");
            
            //PreparaEmail
            $now = date("d/m/Y H:i:s"); 
            $emailCrip = base64_encode($email);
            $linkCodigo = password_hash(base64_encode($now), PASSWORD_DEFAULT);
            $dataExpirar = date('Y-m-d H:i:s', strtotime('+1 hour'));
            $pdo->query("insert into codigolink values (0,'$linkCodigo','$dataExpirar', '$emailCrip');");
            //manda email
            try {
                enviarEmail("$email", "Link para recuperar", "<a href=\"http://localhost/workspace/View/recuperar.php?linkCodigo=$linkCodigo\">Recuperar Senha</a>");
            }catch (Exception $e) {
                echo $e->getMessage();
            }
            }
            
        
        
        }




?>