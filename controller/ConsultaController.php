<?php
include('../Model/DAO/ConsultaDAO.php');
if (!isset($_SESSION)) {
    session_start();
}

    Class ConsultaController  {

        function pesquisarAlunoPorRM($rm){
            $ConsultaDAO = new ConsultaDAO();
            $aluno = $ConsultaDAO->consultarAlunoPorRM($rm);
            // 
            if (is_array($aluno)) {
                foreach ($aluno as $coluna) {
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
                
                return json_encode($aluno);
            }else{
                return "";
            }
            
        }

    }
    

        $consultaController = new consultaController();
        echo $consultaController->pesquisarAlunoPorRM($_POST['rm']);
  

?>