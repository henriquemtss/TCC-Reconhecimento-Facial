<?php
    include_once('../model/CadastroAluno.php');

    if (!isset($_SESSION)) {
        session_start();
    }



    

    $cadastro = new CadastroAluno($_GET['nomeAluno'], $_GET['rmAluno'], $_GET['emailAluno'], $_GET['cursoAluno'], $_GET['periodoAluno']);



    if ($cadastro->verificarCampos()) {

        if ($cadastro->verificarRMeEmail()) {
            $cadastro->Cadastrar();
                
        }

    }
    
       
    





        

        


?>
