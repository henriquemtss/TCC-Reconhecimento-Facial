<?php

include('DAO/ContasDAO.php');

class Contas
{
    var $ContasDAO;
    var $usuario;
    var $senha;

    function __construct($usuario, $senha)
    {
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->ContasDAO = new ContasDAO();
    }



    function logar(){
         $this->ContasDAO->logar($this->usuario, $this->senha);
                
    }
}