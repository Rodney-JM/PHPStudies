<?php 

function saudacao(){// define o tipo de retorno
    $hora = date('H');

    if($hora>=6 && $hora<13){
        return 'Bom dia';
    }elseif($hora>=13 && $hora<18){
        return 'Boa tarde';
    }elseif($hora>=18 && $hora<0){
        return 'Boa noite';
    }elseif($hora>=0 && $hora<6){
        return 'Boa madrugada';
    }
}

function resumirTexto(string $texto, int $limite, string $continue='...'){
    $texto__limpo = trim(strip_tags($texto));

    if(mb_strlen($texto__limpo)<= $limite){
        return $texto__limpo;
    }

    $resumirTexto = mb_substr($texto__limpo, 0, mb_strpos(mb_substr($texto__limpo, 0, $limite), ''));

    return $resumirTexto . $continue;
}