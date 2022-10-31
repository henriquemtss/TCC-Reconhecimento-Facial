<?php
    include_once('../model/Cadastro.php');

    if (!isset($_SESSION)) {
        session_start();
    }



    

    $cadastro = new Cadastro($_GET['nome'], $_GET['rm'], $_GET['email'], $_GET['curso'], $_GET['periodo']);



    if ($cadastro->verificarCampos()) {
       
        $cadastro->Cadastrar();
    }





        

        


?>
