<?php
include ('conexao.php');

class RegistroDAO{
    

    function pegarTodosRegistros(){
        $pdo = conectar();

        $resul = $pdo->query("select cadastroaluno.nome, cadastroaluno.rm, cadastroaluno.curso, cadastroaluno.periodo, registro.entradaSaida from CadastroAluno inner join registro on cadastroaluno.rm = registro.rm order by registro.entradaSaida Desc;");

        return ($resul->fetchall(PDO::FETCH_ASSOC));
    }
}
