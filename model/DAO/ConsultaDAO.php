<?php
include ('conexao.php');

    class ConsultaDAO {
           function consultarAlunoPorRM($rm){
            $pdo = conectar();
            $sql = "Select Nome, Curso, Status from CadastroAluno where rm=:rm limit 1";
            $res = $pdo->prepare($sql);
            $res->bindValue(':rm', $rm);
            $res->execute();
            $resul = $res->fetch(PDO::FETCH_ASSOC);
            return $resul;


           }

    }
    