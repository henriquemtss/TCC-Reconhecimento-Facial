<?php
    include_once('../model/CadastroFuncionario.php');
    include_once('../assets/lib/ValidadorCPF/ValidadorCpf.php');

    if (!isset($_SESSION)) {
        session_start();
    }



    

    $cadastro = new CadastroFuncionario($_GET['nomeFuncionario'], $_GET['cpfFuncionario'], $_GET['emailFuncionario'], $_GET['telefoneFuncionario'], $_GET['funcaoFuncionario']);



    if ($cadastro->verificarCampos()) {

        if ($cadastro->verificarEmailECPF()) {
             $cadastro->Cadastrar();
        }
    

    }
    
       





        

        


?>
