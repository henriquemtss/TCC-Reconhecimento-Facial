<?php

include('DAO/Conexao.php');


class Contas
{
    var $usuario;
    var $senha;

    function __construct($usuario, $senha)
    {
        $this->usuario = $usuario;
        $this->senha = $senha;
    }



    function logar(){
        
        $pdo = conectar();

        // $sql_code =  "select * from contas where usuario = '$usuario' LIMIT 1";
        $result = $pdo->query("select * from contas where usuario = '$this->usuario' LIMIT 1");
        // $sql_query = $mysqli->query($sql_code) or die("Falha na excução do código SQL: ". $mysqli->error);

        // $quantidade = $sql_query->num_rows;
        $conta = $result->fetch(PDO::FETCH_ASSOC);
        if($conta['usuario'] == $this->usuario){
            if (password_verify($this->senha, $conta['senha']))  {

                if (!isset($_SESSION)) {
                    session_start();
                }
    
               
                $_SESSION['id'] = $conta['id'];
                $_SESSION['nome'] = $conta['nome'];
                
                // session_set_cookie_params(0);
                // header("Location: ../View/splash.php");
                if ($conta['nivelConta'] == 1) {
                    header("Location: ../view/cadastro.php");
                }
                if ($conta['nivelConta'] == 2) {
                    header("Location: ../view/faceid.php");
                }
                if ($conta['nivelConta'] == 3) {
                    header("Location: ../view/cadastro.php");
                }
                

         } else {
            $_SESSION['msgLogin'] = "Falha ao logar.<Br/>  Usuario ou senha incorretos!";
            header("Location: ../index.php");
        }
    }
    else {
        $_SESSION['msgLogin'] = "Falha ao logar.<Br/>  Usuario ou senha incorretos!";
        header("Location: ../index.php");
    }

    }
}