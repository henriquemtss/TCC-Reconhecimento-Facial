<?php
include ('conexao.php');

class RegistroDAO{
    

    function pegarTodosRegistros(){
        $pdo = conectar();

        $resul = $pdo->query("select cadastroaluno.nome, cadastroaluno.rm, cadastroaluno.curso, cadastroaluno.periodo, registro.entradaSaida from CadastroAluno inner join registro on cadastroaluno.rm = registro.rm order by registro.entradaSaida Desc limit 500 ;");

        return ($resul);
    }

    function registrar($registro){
        $replaced = str_replace(" ","+",$registro);
        $pdo = conectar();
        $sql = "INSERT INTO registro (rm, entradaSaida)	VALUES (:replaced, now())";
        $res = $pdo->prepare($sql);
        $res->bindvalue(':replaced', $replaced);
        $res->execute();
    }

    function verificarRegistrosAnteriores($rm){
        $pdo = conectar();
        $sql = "Select * from registro where entradaSaida between (DATE_SUB(NOW(), interval 5 MINUTE)) AND (now()) AND rm = $rm;";
        $res = $pdo->prepare($sql);
        $res->execute();
        $resul = $res->fetch(PDO::FETCH_ASSOC);
        return $resul;
    }
}
