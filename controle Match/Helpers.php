<?php 

function usandoOMatch($horas):string{
    $horas= date('H');
    $saudacao = match($horas){
        '1', '2', '3' => 'boa madrugada',
        '23' => 'Vai dormir'
    };

    $saudacao = match(true){
        $horas >= 0 and $horas<=5 => 'boa madrugada',
        default => 'Olá colega'
    };

    return $saudacao;
}