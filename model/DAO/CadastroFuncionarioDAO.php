<?php
include ('conexao.php');

class CadastroFuncionarioDAO{

    function cadastrar($nome, $cpf, $email, $telefone, $funcao){
        $pdo = conectar();

            try {
                                    
                $sql = "Insert into CadastroFuncionario (nome, cpf, email, telefone, funcao) values (:nome, :cpf, :email, :telefone, :funcao);";
                $res = $pdo->prepare($sql);
                $res->bindValue(':nome',$nome);
                $res->bindValue(':cpf', $cpf);
                $res->bindValue(':email', $email);
                $res->bindValue(':telefone', $telefone);
                $res->bindValue(':funcao', $funcao);
                $res->execute();
                $_SESSION['msgCadastro'] = "Cadastro concluido!";
                header("Location: ../view/cadastro.php");


            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
    }

    function verificarEmailECPF($email, $cpf){
        $pdo = conectar();

            $sql = "select * from CadastroFuncionario where cpf = :cpf or email = :email limit 1;";
            $res = $pdo->prepare($sql);
            $res->bindValue(':email', $email);
            $res->bindValue(':cpf', $cpf);
            $res->execute();

            $cadastroExistente = $res->fetch(PDO::FETCH_ASSOC);


            
            if (!is_null($cadastroExistente['email'])) {
                    $_SESSION['msgEmailFuncionario'] = "Email ja utilizado!";
                    header("Location: ../view/cadastro.php");
                    return false;
                }
                if (!is_null($cadastroExistente['cpf'])) {
                    $_SESSION['msgCPFFuncionario'] = "CPF ja utilizado!";
                    header("Location: ../view/cadastro.php");
                    return false;
                }
            return true;
    }

}