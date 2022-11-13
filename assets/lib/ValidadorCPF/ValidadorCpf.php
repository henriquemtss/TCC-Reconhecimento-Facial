<?php

function ValidadorCPF($numeroCPF){

        $cpf = preg_replace("/[^0-9]/", "", $numeroCPF);
    $cpf2 = str_split($cpf);
    $array[] = [11,10,9,8,7,6,5,4,3,2];
    $temp = [];
    $soma = 0;
    $v1 = 0;
    $v2 = 0;
    $d1=0;
    $d2=0;

    //1 - pega os numeros e coloca no array
    for ($i=0; $i < 11; $i++) { 
        array_push($temp, intval($cpf2[$i]));
    }
    echo "<br>";
    //faz a matriz
    array_push($array, $temp);
    $temp = [];
    $v1 = $array[1][9] ;
    $v2 = $array[1][10];

    // 2 - multiplicação da matriz
    for ($i=0; $i < 9; $i++) { 
        array_push($temp, $array[0][$i+1] * $array[1][$i]);
    }
    //
    array_push($array, $temp);
    $temp = [];

    // 3 - 
    for ($i=0; $i < 9; $i++) { 
        $soma += intval($array[2][$i]);
    }
    $soma %= 11;
    
    //
    if (($soma) > 2) {
        $d1 = 11 - $soma;
    }else {
        $d1 = 0;
    }

    ////////////
    $soma = 0;
    
    $array[1][9] = $v1;

    for ($i=0; $i < 10; $i++) { 
        array_push($temp, $array[0][$i] * $array[1][$i]);
    }
    //
    array_push($array, $temp);
    $temp = [];

    for ($i=0; $i < 10; $i++) { 
        $soma += $array[3][$i];
    }
    $soma %= 11;

    if ($soma > 2) {
        $d2 = 11 - $soma;
    }else {
        $d2 = 0;
    }

    ///////////////

    if (($v1 == $d1) && ($v2 == $d2)){
        return true;
    } else {
        return false;
    }




    }

    

    


