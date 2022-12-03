<?php
include('../Model/DAO/ConsultaDAO.php');
if (!isset($_SESSION)) {
    session_start();
}

    Class ConsultaController  {

        function pesquisarAlunoPorRM($rm){
            $ConsultaDAO = new ConsultaDAO();
            $aluno = $ConsultaDAO->consultarAlunoPorRM($rm);
            foreach ($aluno as $coluna => $valor) {
                if ($coluna == 'Curso' and $aluno['Curso'] == 'quim') {
                    $aluno['Curso'] = "Química";
                }
                if ($coluna == 'Curso' and $aluno['Curso'] == 'nut') {
                    $aluno['Curso'] = "Nutrição";
                }
                if ($coluna == 'Curso' and $aluno['Curso'] == 'ds') {
                    $aluno['Curso'] = "Desenvolvimento de Sistemas";
                }
                if ($coluna == 'Curso' and $aluno['Curso'] == 'adm') {
                    $aluno['Curso'] = "Administração";
                }
                if ($coluna == "Curso" and $aluno['Curso'] == 'em-quim') {
                    $aluno['Curso'] = 'EM Integrado a Química';
                }
                if ($coluna == 'Curso' and $aluno['Curso'] == 'em-nut') {
                    $aluno['Curso'] = "EM Integrado a Nutrição";
                }
                if ($coluna == 'Curso' and $aluno['Curso'] == 'em-adm') {
                    $aluno['Curso'] = "EM Integrado a Administração";
                }
            }
            return $aluno;
        }

    }

        if (isset($_GET['botaoPesquisa'])) {
            $consultaController = new consultaController();
            if(!empty($consultaController->pesquisarAlunoPorRM($_GET['pesquisa']))){
                $_SESSION['resultado'] = $consultaController->pesquisarAlunoPorRM($_GET['pesquisa']);
            }else{
                $_SESSION['resultado'] = "RM não encontrado";
            }
            header("Location: ../View/Consulta.php");
        }
    


    