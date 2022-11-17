<?php
    include('../model/Registros.php');


    class RegistroController {
        function pegarTodosRegistros(){
            $registro = new Registro();
            return $registro->pegarTodosRegistros();
        
        }  
    }
