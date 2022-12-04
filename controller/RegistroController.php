<?php
    include('../model/Registros.php');


    class RegistroController {
        function pegarTodosRegistros(){
            $registro = new Registro();
            return $registro->pegarTodosRegistros();
        
        }  
        function lista(){
            $lista = $this->pegarTodosRegistros();
            $a = $lista ->fetchAll(PDO::FETCH_NUM);
            foreach ($a as $coluna => $valor) {
                if ($valor[2] == 'quim') {
                    $a[$coluna][2] = "Química";
                }
                if ($valor[2] == 'nut') {
                    $a[$coluna][2] = "Nutrição";
                }
                if ($valor[2] == 'ds') {
                    $a[$coluna][2] = "Desenvolvimento de Sistemas";
                }
                if ($valor[2] == 'adm') {
                    $a[$coluna][2] = "Administração";
                }
                if ($valor[2] == 'em-quim') {
                    $a[$coluna][2] = 'EM Integrado a Química';
                }
                if ($valor[2] == 'em-nut') {
                    $a[$coluna][2] = "EM Integrado a Nutrição";
                }
                if ($valor[2] == 'em-adm') {
                    $a[$coluna][2] = "EM Integrado a Administração";
                }
            }

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
