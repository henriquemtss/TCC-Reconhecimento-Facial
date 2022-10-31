<?php
include('DAO/Conexao.php');
if (!isset($_SESSION)) {
    session_start();
}


$pdo = conectar();

// 


if (isset($_GET['name']) || isset($_POST['password'])) {
    if (strlen($_GET['name']) == 0) {
        $_SESSION['msg'] = "Preencha seu usuario!";
        header("Location: index.php");
    }elseif (strlen($_GET['password']) == 0) {
        $_SESSION['msg'] = "Preencha sua senha!";
        header("Location: index.php");
    }else {
        
        
        $nome = $_GET['name'];
        $senha = $_GET['password'];

        // $sql_code =  "select * from contas where usuario = '$usuario' LIMIT 1";
        $result = $pdo->query("select * from contas where usuario = '$nome' LIMIT 1");
        // $sql_query = $mysqli->query($sql_code) or die("Falha na excução do código SQL: ". $mysqli->error);

        // $quantidade = $sql_query->num_rows;
        $conta = $result->fetch(PDO::FETCH_ASSOC);
        if($conta['usuario'] == $nome){
            if (password_verify($senha, $conta['senha']))  {

                if (!isset($_SESSION)) {
                    session_start();
                }
    
               
                $_SESSION['id'] = $conta['id'];
                $_SESSION['nome'] = $conta['nome'];
                
                session_set_cookie_params(0);
                header("Location: ../view/cadastro.php");
    
                
            } else {
                $_SESSION['msg'] = "Falha ao logar.<Br/>  Usuario ou senha incorretos!";
                header("Location: ../index.php");
            }
        }
        else {
            $_SESSION['msg'] = "Falha ao logar.<Br/>  Usuario ou senha incorretos!";
            header("Location: ../index.php");
        }


    }
}




?>