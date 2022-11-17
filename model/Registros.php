<?php
include_once('DAO/RegistroDAO.php');

class Registro {
    
    function pegarTodosRegistros(){
        $registroDAO = new RegistroDAO();
        $res = $registroDAO->pegarTodosRegistros();
        return $res;
    }

}
