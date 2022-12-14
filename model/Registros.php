<?php
include_once('DAO/RegistroDAO.php');

class Registro {
    
    function pegarTodosRegistros(){
        $registroDAO = new RegistroDAO();
        $res = $registroDAO->pegarTodosRegistros();
        return $res;
    }
    
    function registrar($registro){
        $registroDAO = new RegistroDAO();
        $registroDAO->registrar($registro);
    }

    function verificarRegistrosAnteriores($rm){
        $registroDAO = new RegistroDAO();
        if (empty($registroDAO->verificarRegistrosAnteriores($rm))) {
            return true;
        }else{
            return false;
        }
    }

}
