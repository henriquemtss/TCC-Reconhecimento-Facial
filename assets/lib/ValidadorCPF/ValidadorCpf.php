<?php
function ValidadorCPF($numeroCPF){

    $cpf = str_split(preg_replace("/[^0-9]/", "", $numeroCPF));
    $v1 = 0; 
    $v2 = 0;
    $soma = 0;
    $d1=intval($cpf[9]); 
    $d2=intval($cpf[10]);

    //Verificando o Primeiro Digito
    $x = 10;
    for ($i=0; $i < 9; $i++) { 
        $v1 = intval($cpf[$i]) * $x;
        $x--;
        $soma += $v1;
    }
    $soma %= 11;
    if ($soma >= 2) {
        $v1 = 11 - $soma;
    } else {
        $v1 = 0;
    }

    //Verificando o Segundo Digito
    $x = 11;
    $soma = 0;
    for ($i=0; $i < 10; $i++) { 
        $v2= intval($cpf[$i]) * $x;
        $x--;
        $soma += $v2;
    }
    $soma %= 11;
    if ($soma >= 2) {
        $v2 = 11 - $soma;
    } else {
        $v2 = 0;
    }
    //Resultado
    if (($v1 == $d1) && ($v2 == $d2)){
        return true;
    } else {
        return false;
    }
}
?>

    

    


