<?php
    include_once('../model/CadastroFuncionario.php');

    if (!isset($_SESSION)) {
        session_start();
    }



    

    $cadastro = new CadastroFuncionario($_GET['nomeFuncionario'], $_GET['cpfFuncionario'], $_GET['emailFuncionario'], $_GET['telefoneFuncionario'], $_GET['funcaoFuncionario']);



    if ($cadastro->verificarCampos()) {

        if ($cadastro->verificarRMeEmail()) {
            
        }

    }
    
       
    $cadastro->Cadastrar();





        

        


?>
