<?php
include ('conexao.php');

class CadastroAlunoDAO{

    function Cadastrar($rm, $nome, $email, $curso, $periodo){
        $pdo = conectar();

            try {
                                    
                $sql = "Insert into CadastroAluno (rm, nome, email, curso, periodo) values (:rm, :nome, :email, :curso, :periodo);";
                $res = $pdo->prepare($sql);
                $res->bindValue(':rm',$rm);
                $res->bindValue(':nome', $nome);
                $res->bindValue(':email', $email);
                $res->bindValue(':curso', $curso);
                $res->bindValue(':periodo', $periodo);
                $res->execute();
                $_SESSION['msgCadastro'] = "Cadastro concluido!";
                


            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
    }

    function verificarRMeEmail($rm, $email){

            $pdo = conectar();

            $sql = "select * from CadastroAluno where email = :email or rm = :rm limit 1;";
            $res = $pdo->prepare($sql);
            $res->bindValue(':email', $email);
            $res->bindValue(':rm', $rm);
            $res->execute();

            $cadastroExistente = $res->fetch(PDO::FETCH_ASSOC);

            if (!is_null($cadastroExistente['email'])) {
                $_SESSION['msgEmailAluno'] = "Email ja utilizado!";
                header("Location: ../View/cadastro.php");
                return false;
            }
            if (!is_null($cadastroExistente['rm'])) {
                $_SESSION['msgRMAluno'] = "RM ja utilizado!";
                header("Location: ../View/cadastro.php");  
                return false;
            }

            return true;

    }

}