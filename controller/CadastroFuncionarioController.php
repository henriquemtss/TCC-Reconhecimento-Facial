<?php
     include_once('../model/CadastroFuncionario.php');
     include_once('../assets/lib/ValidadorCPF/ValidadorCpf.php');
 
     if (!isset($_SESSION)) {
         session_start();
     }
 
     $cpfReviewed = str_replace(".","",$_GET['cpfFuncionario']);
     $cpfReviewed = str_replace("-","",$cpfReviewed);
 
     
 
     $cadastro = new CadastroFuncionario($_GET['nomeFuncionario'], $cpfReviewed, $_GET['emailFuncionario'], $_GET['telefoneFuncionario'], $_GET['funcaoFuncionario']);
 
 
 
     if ($cadastro->verificarCampos()) {
 
         if ($cadastro->verificarEmailECPF()) {
              $cadastro->Cadastrar();
         }
     
 
     }
?>
