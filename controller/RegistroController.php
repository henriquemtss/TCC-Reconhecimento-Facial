<?php
    include('../model/Registros.php');


    class RegistroController {
        function pegarTodosRegistros(){
            $registro = new Registro();
            return $registro->pegarTodosRegistros();
        
        }  
        function lista(){
            $lista = $this->pegarTodosRegistros();
            $a = $lista ->fetchAll();

            foreach($a as $itens){
                echo 
                '<li class="registro">
                    <div class="nome">'. $itens[0] .'</div>
                    <div class="rm">'. $itens[1] .'</div>
                    <div class="periodo">'. $itens[2] .'</div>
                    <div class="curso">'. $itens[3] .'</div>
                    <div class="entradaSaida">'. $itens[4] .'/Saída</div>
                </li>';
            }
        }
    }
