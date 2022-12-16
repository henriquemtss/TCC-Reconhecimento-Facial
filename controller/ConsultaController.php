<?php
include('../Model/DAO/ConsultaDAO.php');
if (!isset($_SESSION)) {
    session_start();
}

    Class ConsultaController  {

        function pesquisarAlunoPorRM($rm){
            $ConsultaDAO = new ConsultaDAO();
            $aluno = $ConsultaDAO->consultarAlunoPorRM($rm);
            
                return json_encode($aluno);
            }
            
        }

    

        $consultaController = new consultaController();
        echo $consultaController->pesquisarAlunoPorRM($_POST['rm']);
  

?>